<?php

namespace App\Repositories;

use App\Interfaces\Repositories\SubDepartmentRepositoryInterface;
use App\Models\Department;
use App\Models\SubDepartment;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Log;

class SubDepartmentRepository implements SubDepartmentRepositoryInterface
{
    public function getAllSubDepartmentList($request)
    {
        $sub_depts = $this->subDepartmentData($request);

        $datatables = DataTables::of($sub_depts)
            ->addIndexColumn()
            ->addColumn('no', function ($sub_depts) {
                return '';
            })
            ->addColumn('department_id', function ($row) {
                return $row->department->department_name;
            })
            ->editColumn('status', function ($sub_depts) {
                $status_change = '';
                $status_change .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route = "'" . route('admin.sub-department.status.change') . "'";
                $id = (string) $sub_depts->id;
                if ($sub_depts->status) {
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
            ->addColumn('action', function ($sub_depts) {
                $btn = '';

                $btn .= ' <a href="' . route('sub-department.edit', $sub_depts) . '" title="Edit Department"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';

                $btn .= '<form action="' . route('sub-department.destroy', $sub_depts->id) . '" method="POST" style="display:inline" class="deleteForm">
                                                ' . csrf_field() . '' . method_field("DELETE") . '
                                                    <button type="submit" class="btn btn-icon btn btn-secondary w-30px h-30px show_confirm_delete"
                                                    ><i class="bi bi-trash"></i></a>
                                                </form>
                                            </div>';

                return "<div class='action-column hidden'>" . $btn . "</div>";

            })
            ->rawColumns(['status','action']);

        return $datatables->make(true);
    }

    public function subDepartmentData($request)
    {
        $search = $request->search;
        $data   = SubDepartment::orderBy('sort_order')->select('id', 'sub_department_name','department_id','description','status','sort_order');

        if ($search) {
            $data->where('sub_department_name', 'LIKE', "%$search%")->orWhere('description', 'LIKE', "%$search%");
        }

        return $data->get();
    }

    public function saveSubDepartmentData($request, $id = null)
    {
        if ($id) {
            $sub_dept = SubDepartment::findOrFail($id);
            $sub_dept->updated_by = auth()->user()->id;
            $sub_dept->update($request->all());
        } else {
            $sub_dept = new SubDepartment($request->all());
            $sub_dept->id = Str::uuid();

            $sub_dept->created_date = now();
            $sub_dept->created_by  = auth()->user()->id;

            if ($request->has('sort_order')  && $request->sort_order !== null) {
                $sortOrder = $request->input('sort_order');
            } else {
                $maxSortOrder = SubDepartment::max('sort_order');
                $sortOrder = $maxSortOrder ? $maxSortOrder + 1 : 1;
            }
            $sub_dept->sort_order = $sortOrder;
            $sub_dept->save();
        }

        return $sub_dept;
    }

    public function getSubDepartmentData($id)
    {
        return SubDepartment::findOrFail($id);
    }

    public function deleteSubDepartment($id)
    {
        return SubDepartment::destroy($id);
    }
    
    public function subDepartmentStatusChange($request)
    {
        $sub_department = SubDepartment::findOrFail($request->dataId);
        $sub_department->update(['status' => !$sub_department->status]);

        return $sub_department;
    }
}
