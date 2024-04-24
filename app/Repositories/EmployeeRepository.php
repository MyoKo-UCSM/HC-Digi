<?php

namespace App\Repositories;

use App\Interfaces\Repositories\EmployeeRepositoryInterface;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use App\Models\Grade;
use App\Models\EmployeeSubDepartment;
use App\Models\BloodGroup;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Log;
use DB;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function getAllEmployeeList($request)
    {
        $employees = $this->employeeData($request);

        $datatables = DataTables::of($employees)
            ->addIndexColumn()
            ->addColumn('no', function ($employees) {
                return '';
            })
            ->addColumn('position_id', function ($row) {
                return $row->position->position_title;
            })
            ->addColumn('department_id', function ($row) {
                return $row->department->department_name;
            })
            ->addColumn('grade_id', function ($row) {
                return $row->grade->grade_name;
            })
            ->addColumn('sub_department_names', function ($row) {
                return $row->subDepartments->pluck('sub_department_name')->implode(', ');
            })
            ->editColumn('status', function ($employees) {
                $status_change = '';
                $status_change .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route = "'" . route('admin.employee.status.change') . "'";
                $id = (string) $employees->id;
                if ($employees->status) {
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
            ->editColumn('updated_at', function ($employees) {
                $user_name    = $employees->updateUser ? $employees->updateUser->name : ($employees->createUser ? $employees->createUser->name : '');
                $updated_user = '';
                $updated_user .= "<span class='fw-bolder'>" . $user_name . "</span></br>";
                $updated_user .= "<span>" . $employees->updated_at . "</span>";
                return $updated_user;
            })
            ->addColumn('action', function ($employees) {
                $btn = '';
                $btn .= ' <a href="' . route('employee.edit', $employees->id) . '" title="Edit Employee"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';
                $btn .= ' <a href="' . route('employee.show', $employees->id) . '" title="Show Employee"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-eye-slash" aria-hidden="true"></i></button></a>';
                $btn .= '<form action="' . route('employee.destroy', $employees->id) . '" method="POST" style="display:inline" class="deleteForm" title="Delete Employee">
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

    public function employeeData($request)
    {
        //Log::info($request->all());
        $search = $request->search;
        $department = $request->department == null ? 'all' : $request->department;
        $grade = $request->grade == null ? 'all' : $request->grade;
        $position = $request->position == null ? 'all' : $request->position;
        $team = $request->team == null ? 'all' : $request->team;
        // $status = $request->status == null ? 'all' : $request->status;
        //$data = Employee:with(['createUser', 'updateUser'])->select('id', 'sub_category_name','category_id', 'description', 'status', 'created_by', 'updated_by', 'updated_at');
        $data = Employee::OrderBy('sort_order')->with(['createUser', 'updateUser'])->select('*');

        if ($search) {
            $data->where('name', 'LIKE', "%$search%")
                ->orWhere('employee_code', 'LIKE', "%$search%")
                ->orWhere('contact_number', 'LIKE', "%$search%");
        }
        // if (isset($department) && $department != 'all') {
        //     $data->where('department_id', $department);
        // }

        if (isset($status) && $status != 'all') {
            $data->where('status', $status);
        }
        if (isset($position) && $position != 'all') {
            
            $data->where('position_id', $position);
        }
        if (isset($department) && $department != 'all') {
            $data->where('department_id', $department);
        }
        if (isset($grade) && $grade != 'all') {
            $data->where('grade_id', $grade);
        }
        
        // if (isset($team) && $team != 'all') {
        //     Log::info($team);
        //     $data->where('sub_department_id', $team);
        // }
        if (isset($team) && $team != 'all') {
            $data->whereHas('subDepartments', function ($query) use ($team) {
                $query->where('sub_department_id', $team);
            });
        }
        return $data->get();

    }

    public function createEmployee()
    {
        $departments = Department::select('id', 'department_name')->get();
        $departments = $departments->pluck('department_name', 'id');

        return $departments;
    }
    
    public function saveEmployeeData($request, $id = null)
    {
        DB::beginTransaction();
        try {
            $requestData = $request->all();

            
            if ($id) {
                $requestData['updated_by'] = auth()->user()->id;
                $employee  = Employee::findOrFail($id);
                $employee->update($requestData);
                // Update sub-departments
                $employeeId = $employee->id;
                if ($request->has('sub_department_id')) {
                    $subDepartmentIds = $request->input('sub_department_id');

                    if (!is_array($subDepartmentIds)) {
                        $subDepartmentIds = [$subDepartmentIds];
                    }
                    // Delete existing sub-departments
                    $employee->subDepartments()->delete();

                    // Add updated sub-departments
                    foreach ($subDepartmentIds as $subDepartmentId) {
                        Log::info("Employee ID: $employeeId, Sub-Department ID: $subDepartmentId");
                        // if (!empty($subDepartmentId)) {
                        //     $employee->subDepartments()->create([
                        //         'sub_department_id' => $subDepartmentId
                        //     ]);
                        // }
                        $employeeSub = new EmployeeSubDepartment();
                        $employeeSub->id = Str::uuid()->toString();
                        $employeeSub->employee_id = $employeeId;
                        $employeeSub->sub_department_id = $subDepartmentId;
                        $employeeSub->save();
                    }
                }
            } else {
                $requestData['created_date'] = now();
                $requestData['created_by']   = auth()->user()->id;
                $employeeId = Str::uuid()->toString();
                $employee = new Employee($requestData);
                // $employee->id = Str::uuid();
                $employee->id = $employeeId;
                //$employee->id = Uuid::uuid4()->toString();

                if ($request->has('sort_order')  && $request->sort_order !== null) {
                    $sortOrder = $request->input('sort_order');
                } else {
                    $maxSortOrder = Employee::max('sort_order');
                    $sortOrder = $maxSortOrder ? $maxSortOrder + 1 : 1;
                }

                // if (isset($request->nrc_file)) {
                // if ($request->hasFile('nrc_file')) {
                //     $nrcFile = $request->file('nrc_file');
                //     $folderPath = 'uploads/nrc_files';
                //     $fileName = $nrcFile->getClientOriginalName();
                //     $nrcFile->move($folderPath, $fileName);
                //     $fullFilePath = $folderPath . '/' . $fileName;
                //     $requestData['nrc_file'] = $fullFilePath;
                // }else{
                //     $requestData['nrc_file'] = null;
                // }

                if ($request->hasFile('nrc_copy')) {
                    $nrcFile = $request->file('nrc_copy');
                    $folderPath = 'uploads/nrc_copys';
                    $fileName = $nrcFile->getClientOriginalName();
                    $counter = 1;
                    $originalFileName = $fileName;
                    while (file_exists(public_path($folderPath . '/' . $fileName))) {
                        $fileName = pathinfo($originalFileName, PATHINFO_FILENAME) . '_' . $counter++ . '.' . $nrcFile->getClientOriginalExtension();
                    }
                    $nrcFile->move(public_path($folderPath), $fileName);
                    $fullFilePath = $folderPath . '/' . $fileName;
                    $employee->nrc_copy = $fullFilePath;
                } else {
                    $requestData['nrc_copy'] = null;
                }

                if ($request->hasFile('labor_copy')) {
                    $nrcFile = $request->file('labor_copy');
                    $folderPath = 'uploads/labor_copys';
                    $fileName = $nrcFile->getClientOriginalName();
                    $counter = 1;
                    $originalFileName = $fileName;
                    while (file_exists(public_path($folderPath . '/' . $fileName))) {
                        $fileName = pathinfo($originalFileName, PATHINFO_FILENAME) . '_' . $counter++ . '.' . $nrcFile->getClientOriginalExtension();
                    }
                    $nrcFile->move(public_path($folderPath), $fileName);
                    $fullFilePath = $folderPath . '/' . $fileName;
                    $employee->labor_copy = $fullFilePath;
                } else {
                    $requestData['labor_copy'] = null;
                }

                if ($request->hasFile('family_registration_copy')) {
                    $nrcFile = $request->file('family_registration_copy');
                    $folderPath = 'uploads/family_registration_copys';
                    $fileName = $nrcFile->getClientOriginalName();
                    $counter = 1;
                    $originalFileName = $fileName;
                    while (file_exists(public_path($folderPath . '/' . $fileName))) {
                        $fileName = pathinfo($originalFileName, PATHINFO_FILENAME) . '_' . $counter++ . '.' . $nrcFile->getClientOriginalExtension();
                    }
                    $nrcFile->move(public_path($folderPath), $fileName);
                    $fullFilePath = $folderPath . '/' . $fileName;
                    $employee->family_registration_copy = $fullFilePath;
                } else {
                    $requestData['family_registration_copy'] = null;
                }

                if ($request->hasFile('driving_license_copy')) {
                    $nrcFile = $request->file('driving_license_copy');
                    $folderPath = 'uploads/driving_license_copys';
                    $fileName = $nrcFile->getClientOriginalName();
                    $counter = 1;
                    $originalFileName = $fileName;
                    while (file_exists(public_path($folderPath . '/' . $fileName))) {
                        $fileName = pathinfo($originalFileName, PATHINFO_FILENAME) . '_' . $counter++ . '.' . $nrcFile->getClientOriginalExtension();
                    }
                    $nrcFile->move(public_path($folderPath), $fileName);
                    $fullFilePath = $folderPath . '/' . $fileName;
                    $employee->driving_license_copy = $fullFilePath;
                } else {
                    $requestData['driving_license_copy'] = null;
                }

                if ($request->hasFile('employee_photo')) {
                    $nrcFile = $request->file('employee_photo');
                    $folderPath = 'uploads/employee_photos';
                    $fileName = $nrcFile->getClientOriginalName();
                    $counter = 1;
                    $originalFileName = $fileName;
                    while (file_exists(public_path($folderPath . '/' . $fileName))) {
                        $fileName = pathinfo($originalFileName, PATHINFO_FILENAME) . '_' . $counter++ . '.' . $nrcFile->getClientOriginalExtension();
                    }
                    $nrcFile->move(public_path($folderPath), $fileName);
                    $fullFilePath = $folderPath . '/' . $fileName;
                    $employee->employee_photo = $fullFilePath;
                } else {
                    $requestData['employee_photo'] = null;
                }
                $employee->sort_order = $sortOrder;
                $employee->employee_id = $employeeId;                
                $employee->save();
                //$employeeId = "222A62DC-EFA6-4C4A-81B6-29DA74ECD36D";
                $employeeId = $employee->id;
                // Log::info($employeeId);               
                if ($request->has('sub_department_id')) {                   
                    $subDepartmentIds = $request->input('sub_department_id');                    
                    //$subDepartmentIds = array_wrap($request->input('sub_department_id'));
                    if (!is_array($subDepartmentIds)) {
                        $subDepartmentIds = [$subDepartmentIds];
                    }               
                    foreach ($subDepartmentIds as $subDepartmentId) {
                         // Check if the record already exists
                        $existingRecord = EmployeeSubDepartment::where('employee_id', $employeeId)
                                        ->where('sub_department_id', $subDepartmentId)
                                        ->exists();
                        //Log::info("Employee ID: $employeeId, Sub-Department ID: $subDepartmentId, Existing Record: " . ($existingRecord ? 'Exists' : 'Not Exists'));
                        if (!$existingRecord) {
                            // EmployeeSubDepartment::create([
                            //     'employee_id' => $employeeId,
                            //     'sub_department_id' => $subDepartmentId,
                            // ]);
                        }
                        $employeeSub = new EmployeeSubDepartment();
                        $employeeSub->id = Str::uuid()->toString();
                        $employeeSub->employee_id = $employeeId;
                        $employeeSub->sub_department_id = $subDepartmentId;
                        $employeeSub->save();
                    }
                }
                
            }
            DB::commit();
            // return ['success' => true, 'message' => "Employee has successfully saved."];
            return $employee;
        } catch (\Exception $e) {
            DB::rollback();
            \Log::error($e->getMessage());
            //return null; 
            return ['success' => false, 'message' => "Failed to save employee and sub-departments. Please try again later."];
        }
    }

    public function getEmployeeData($id)
    {
        return Employee::findOrFail($id);
    }

    public function deleteEmployee($id)
    {
        return Employee::destroy($id);
    }

    public function employeeStatusChange($request)
    {
        $employee = Employee::findOrFail($request->id);
        $employee->update(['status' => !$employee->status]);

        return $employee;
    }

    public function getEmployeeByDepartmentId($departmentId) {
        return Employee::where('department_id', '=', $departmentId)->select('name', 'id')->get();
    }
}
