<?php

namespace App\Repositories;

use App\Interfaces\Repositories\PositionRepositoryInterface;
use App\Models\Position;
use App\Models\Department;
use App\Models\Grade;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Log;

class PositionRepository implements PositionRepositoryInterface
{
    public function getAllPositionList($request)
    {
        $positions = $this->positionData($request);

        $datatables = DataTables::of($positions)
            ->addIndexColumn()
            ->addColumn('no', function ($positions) {
                return '';
            })
            // ->addColumn('department_id', function ($row) {
            //     return $row->department->department_name;
            // })
            ->addColumn('grade_id', function ($row) {
                return $row->grade->grade_name;
            })
            ->editColumn('status', function ($positions) {
                $status_change = '';
                $status_change .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route = "'" . route('admin.position.status.change') . "'";
                $id = (string) $positions->id;
                if ($positions->status) {
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
            ->editColumn('updated_at', function ($positions) {
                $user_name    = $positions->updateUser ? $positions->updateUser->name : ($positions->createUser ? $positions->createUser->name : '');
                $updated_user = '';
                $updated_user .= "<span class='fw-bolder'>" . $user_name . "</span></br>";
                $updated_user .= "<span>" . $positions->updated_at . "</span>";
                return $updated_user;
            })
            ->addColumn('action', function ($positions) {
                $btn = '';
                $btn .= ' <a href="' . route('position.edit', $positions->id) . '" title="Edit Category"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';
                $btn .= '<form action="' . route('position.destroy', $positions->id) . '" method="POST" style="display:inline" class="deleteForm">
                                                ' . csrf_field() . '' . method_field("DELETE") . '
                                                    <button type="submit" class="btn btn-icon btn btn-secondary w-30px h-30px show_confirm_delete"
                                                    ><i class="bi bi-trash"></i></a>
                                                </form>
                                            </div>';

                return "<div class='action-column hidden'>" . $btn . "</div>";

            })
            ->rawColumns(['status', 'updated_at', 'action']);

        return $datatables->make(true);

    }

    public function positionData($request)
    {
        $search = $request->search;
        // $status = $request->status == null ? 'all' : $request->status;
        //$data = Position::with(['createUser', 'updateUser'])->select('id', 'sub_category_name','category_id', 'description', 'status', 'created_by', 'updated_by', 'updated_at');
        
        $data = Position::OrderBy('sort_order')->with(['createUser', 'updateUser'])->select('*');

        if ($search) {
            $data->where('position_title', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%");
        }
        // if (isset($status) && $status != 'all') {
        //     $data->where('status', $status);
        // }
        return $data->get();

    }

    public function createPosition()
    {
        $departments = Department::select('id', 'department_name')->get();
        $departments = $departments->pluck('department_name', 'id');

        return $departments;
    }

    public function savePositionData($request, $id = null)
    {
        $requestData = $request->all();

        if ($id) {
            $requestData['updated_by'] = auth()->user()->id;
            $position      = Position::findOrFail($id);
            $position->update($requestData);
        } else {
            $requestData['created_date'] = now();
            $requestData['created_by']   = auth()->user()->id;

            $position = new Position($requestData);
            $position->id = Str::uuid();

            if ($request->has('sort_order')  && $request->sort_order !== null) {
                $sortOrder = $request->input('sort_order');
            } else {
                $maxSortOrder = Position::max('sort_order');
                $sortOrder = $maxSortOrder ? $maxSortOrder + 1 : 1;
            }
            $position->sort_order = $sortOrder;
            $position->save();
        }

        return $position;
    }    

    public function getPositionData($id)
    {
        return Position::findOrFail($id);
    }

    public function deletePosition($id)
    {
        return Position::destroy($id);
    }

    public function positionStatusChange($request)
    {
        $position = Position::findOrFail($request->id);
        $position->update(['status' => !$position->status]);

        return $position;
    }

    public function getPositionByDepartmentId($departmentId) {
        return Position::where('department_id', '=', $departmentId)->select('position_title', 'id')->get();
    }
}
