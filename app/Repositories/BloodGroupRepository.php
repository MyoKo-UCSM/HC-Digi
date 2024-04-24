<?php

namespace App\Repositories;

use App\Interfaces\Repositories\BloodGroupRepositoryInterface;
use App\Models\BloodGroup;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Log;

class BloodGroupRepository implements BloodGroupRepositoryInterface
{
    public function getAllBloodGroupList($request)
    {
        $blood_groups = $this->bloodGroupData($request);

        $datatables = DataTables::of($blood_groups)
            ->addIndexColumn()
            ->addColumn('no', function ($blood_groups) {
                return '';
            })
            ->editColumn('status', function ($blood_groups) {
                $status_change = '';
                $status_change .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route = "'" . route('admin.blood-group.status.change') . "'";
                $id = (string) $blood_groups->id;
                if ($blood_groups->status) {
                    $status_change .= '<input data-id="' . $id . '" onclick="statusChange(' . $id . ',' . $route . ')"
                                class="form-check-input" type="checkbox" style="width : 3rem;"
                                date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                data-on="1" data-off="0" checked >';
                    $status_change .= '</div>';
                } else {
                    $status_change .= '<input data-id="' . $id . '" onclick="statusChange(' . $id . ',' . $route . ')"
                                class="form-check-input" type="checkbox" style="width : 3rem;"
                                date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                data-on="1" data-off="0"  >';
                    $status_change .= '</div>';
                }

                return $status_change;
            })   
            ->editColumn('updated_at', function ($blood_groups) {
                $user_name    = $blood_groups->updateUser ? $blood_groups->updateUser->name : ($blood_groups->createUser ? $blood_groups->createUser->name : '');
                $updated_user = '';
                $updated_user .= "<span class='fw-bolder'>" . $user_name . "</span></br>";
                $updated_user .= "<span>" . $blood_groups->updated_at . "</span>";
                return $updated_user;
            })
                   
            ->addColumn('action', function ($blood_groups) {
                $btn = '';

                $btn .= ' <a href="' . route('blood-group.edit', $blood_groups) . '" title="Edit Department"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';

                $btn .= '<form action="' . route('blood-group.destroy', $blood_groups->id) . '" method="POST" style="display:inline" class="deleteForm">
                                                ' . csrf_field() . '' . method_field("DELETE") . '
                                                    <button type="submit" class="btn btn-icon btn btn-secondary w-30px h-30px show_confirm_delete"
                                                    ><i class="bi bi-trash"></i></a>
                                                </form>
                                            </div>';

                return "<div class='action-column hidden'>" . $btn . "</div>";

            })
            ->rawColumns(['status','updated_at','action']);

        return $datatables->make(true);
    }

    public function bloodGroupData($request)
    {
        $search = $request->search;
        $data    = BloodGroup::orderBy('sort_order')->with(['createUser', 'updateUser'])->select('*');

        if ($search) {
            $data->where('blood_group_name', 'LIKE', "%$search%")->orWhere('description', 'LIKE', "%$search%");
        }

        return $data->get();
    }
    public function saveBloodGroupData($request, $id = null)
    {
        $requestData = $request->all();        
        if ($id) {
            $requestData['updated_by'] = auth()->user()->id;
            $blood_group = BloodGroup::findOrFail($id);
            $blood_group->update($requestData);
        } else {
            $requestData['created_date'] = now();
            $requestData['created_by']   = auth()->user()->id;
            $blood_group = new BloodGroup($requestData);
            $blood_group->id = Str::uuid();

            if ($request->has('sort_order')  && $request->sort_order !== null) {
                $sortOrder = $request->input('sort_order');
            } else {
                $maxSortOrder = BloodGroup::max('sort_order');
                $sortOrder = $maxSortOrder ? $maxSortOrder + 1 : 1;
            }
            $blood_group->sort_order = $sortOrder;
            $blood_group->save();
        }

        return $blood_group;
    }
    public function getBloodGroupData($id)
    {
        return BloodGroup::findOrFail($id);
    }

    public function deleteBloodGroup($id)
    {
        return BloodGroup::destroy($id);
    }
    
    public function bloodGroupStatusChange($request)
    {
        $blood_group = BloodGroup::findOrFail($request->dataId);
        $blood_group->update(['status' => !$blood_group->status]);

        return $blood_group;
    }
}
