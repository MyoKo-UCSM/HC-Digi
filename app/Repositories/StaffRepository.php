<?php

namespace App\Repositories;

use App\Interfaces\Repositories\StaffRepositoryInterface;
use App\Models\Staff;
use App\Models\Position;
use Yajra\Datatables\Datatables;

class StaffRepository implements StaffRepositoryInterface
{
    public function getAllStaffList($request)
    {
        $staff = $this->StaffData($request);

        $datatables = DataTables::of($staff)
            ->addIndexColumn()
            ->addColumn('no', function ($staff) {
                return '';
            })
            ->editColumn('status', function ($staff) {

                $status_change = '';
                $status_change .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route = "'" . route('admin.staff.status.change') . "'";
                if ($staff->status) {
                    $status_change .= '<input data-id="' . $staff->id . '" onclick="statusChange(' . $staff->id . ',' . $route . ')"
                                class="form-check-input" type="checkbox" style="width : 3rem;"
                                date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                data-on="1" data-off="0" checked >';
                    $status_change .= '</div>';
                } else {
                    $status_change .= '<input data-id="' . $staff->id . '" onclick="statusChange(' . $staff->id . ',' . $route . ')"
                                class="form-check-input" type="checkbox" style="width : 3rem;"
                                date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                data-on="1" data-off="0"  >';
                    $status_change .= '</div>';

                }

                return $status_change;
            })
            ->editColumn('updated_at', function ($staff) {
                $user_name    = $staff->updateUser ? $staff->updateUser->name : ($staff->createUser ? $staff->createUser->name : '');
                $updated_user = '';
                $updated_user .= "<span class='fw-bolder'>" . $user_name . "</span></br>";
                $updated_user .= "<span>" . $staff->updated_at . "</span>";
                return $updated_user;
            })
            ->addColumn('action', function ($staff) {
                $btn = '';

                $btn .= ' <a href="' . route('staff.edit', $staff->id) . '" title="Edit staff"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';
                $btn .= ' <a href="' . route('staff.show', $row) . '" title="Show Purchases"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-eye-slash" aria-hidden="true"></i></button></a>';
                $btn .= '<form action="' . route('staff.destroy', $staff->id) . '" method="POST" style="display:inline" class="deleteForm">
                                                ' . csrf_field() . '' . method_field("DELETE") . '
                                                    <button type="submit" class="btn btn-icon btn btn-secondary w-30px h-30px show_confirm_delete"
                                                    ><i class="bi bi-trash"></i></a>
                                                </form>
                                            </div>';

                return "<div class='action-column hidden'>" . $btn . "</div>";

            })
            ->rawColumns(['image', 'status', 'updated_at', 'action']);

        return $datatables->make(true);

    }

    public function staffData($request)
    {
        $search = $request->search;
        $status = $request->status == null ? 'all' : $request->status;

        $data = Staff::with(['createUser', 'updateUser','position'])->select('*');

        if ($search) {
            $data->where('name', 'LIKE', "%$search%")
                ->orWhere('contact_number', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%");
        }

        if (isset($status) && $status != 'all') {
            $data->where('status', $status);
        }

        return $data->get();

    }

    public function createStaff()
    {
        $positions = Position::select('id', 'position_title')->get();
        $positions = $positions->pluck('position_title', 'id');

        return $positions;
    }
    
    public function saveStaffData($request, $id = null)
    {
        $requestData = $request->all();

        if ($id) {
            $requestData['updated_by'] = auth()->user()->id;
            $staff                    = Staff::findOrFail($id);
            $staff->update($requestData);
        } else {
            $requestData['created_date'] = now();
            $requestData['created_by']   = auth()->user()->id;
            $staff                      = Staff::create($requestData);
        }

        return $staff;
    }

    

    public function getStaffData($id)
    {
        return Staff::findOrFail($id);
    }

    public function deleteStaff($id)
    {
        return Staff::destroy($id);
    }

    public function staffStatusChange($request)
    {
        $staff = Staff::findOrFail($request->id);
        $staff->update(['status' => !$staff->status]);

        return $staff;
    }
}
