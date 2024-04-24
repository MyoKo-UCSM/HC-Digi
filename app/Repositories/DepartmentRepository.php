<?php

namespace App\Repositories;

use App\Interfaces\Repositories\DepartmentRepositoryInterface;
use App\Models\Department;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Log;

class DepartmentRepository implements DepartmentRepositoryInterface
{
    public function getAllDepartmentList($request)
    {
        $depts = $this->DepartmentData($request);

        $datatables = DataTables::of($depts)
            ->addIndexColumn()
            ->addColumn('no', function ($depts) {
                return '';
            })
            ->editColumn('status', function ($depts) {
                $status_change = '';
                $status_change .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route = "'" . route('admin.departments.status.change') . "'";
                $id = (string) $depts->id;
                if ($depts->status) {
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
            ->addColumn('action', function ($depts) {
                $btn = '';

                $btn .= ' <a href="' . route('department.edit', $depts) . '" title="Edit Department"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';

                $btn .= '<form action="' . route('department.destroy', $depts->id) . '" method="POST" style="display:inline" class="deleteForm">
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

    public function departmentData($request)
    {
        $search = $request->search;
        $data   = Department::orderBy('sort_order')->select('id', 'sort_order', 'department_name','department_code','description','status');

        if ($search) {
            $data->where('department_name', 'LIKE', "%$search%")->orWhere('description', 'LIKE', "%$search%");
        }

        return $data->get();
    }

    public function saveDepartmentData($request, $id = null)
    {
        if ($id) {
            $dept = Department::findOrFail($id);
            $dept->updated_by = auth()->user()->id;
            $dept->update($request->all());
        } else {
            $dept = new Department($request->all());
            $dept->id = Str::uuid();

            $dept->created_date = now();
            $dept->created_by  = auth()->user()->id;

            if ($request->has('sort_order')  && $request->sort_order !== null) {
                $sortOrder = $request->input('sort_order');
            } else {
                $maxSortOrder = Department::max('sort_order');
                $sortOrder = $maxSortOrder ? $maxSortOrder + 1 : 1;
            }
            $dept->sort_order = $sortOrder;

            $dept->save();
        }

        return $dept;
    }

    public function getDepartmentData($id)
    {
        return Department::findOrFail($id);
    }

    public function deleteDepartment($id)
    {
        return Department::destroy($id);
    }
    
    public function departmentStatusChange($request)
    {
        $department = Department::findOrFail($request->dataId);
        $department->update(['status' => !$department->status]);

        return $department;
    }
}
