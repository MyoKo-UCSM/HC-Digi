<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\EmployeeRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Models\SubDepartment;
use App\Models\Grade;
use App\Models\Position;
use App\Models\BloodGroup;
use App\Models\Nrc;
use App\Http\Requests\Admin\EmployeeFormRequest;
use Log;

class EmployeeController extends Controller
{
    public $page = 'employee';
    private EmployeeRepositoryInterface $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page  = $this->page;        
        $departments = Department::orderBy('sort_order')->pluck('department_name', 'id');
        $grades = Grade::orderBy('sort_order')->pluck('grade_name', 'id');
        $positions = Position::orderBy('sort_order')->pluck('position_title', 'id');
        $teams = SubDepartment::orderBy('sort_order')->pluck('sub_department_name', 'id');
        // $employees = Employee::with(['updateUser', 'department', 'position', 'grade', 'bloodGroup', 'subDepartments'])
        //             ->where(function ($query) use ($status, $keyword, $start_date, $end_date, $request) {
        //                 if ($keyword != null) {
        //                     $query->where('code', 'LIKE', "%$keyword%")
        //                         ->orWhereHas('product', function ($q) use ($request, $product_ids) {
        //                             $q->where('name', 'like', '%' . request('search') . '%');
        //                         });
        //                 }
        //             })
        //             ->latest()
        //             ->paginate($perPage);
        //$employees = Employee::with(['updateUser', 'department', 'position', 'grade', 'bloodGroup', 'subDepartments'])->latest();        
        
        return view('admin.employee.index', compact('page','departments','grades','positions','teams'));
    }

    public function getEmployee(Request $request)
    {
        return $this->employeeRepository->getAllEmployeeList($request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = $this->page;
        // $departments = $this->employeeRepository->createPosition();
        $departments = Department::orderBy('sort_order')->pluck('department_name', 'id');
        $grades = Grade::orderBy('sort_order')->pluck('grade_name', 'id');
        $positions = Position::orderBy('sort_order')->pluck('position_title', 'id');
        $blood_groups = BloodGroup::orderBy('sort_order')->pluck('blood_group_name', 'id');
        $sub_departments = SubDepartment::orderBy('sort_order')->pluck('sub_department_name', 'id');
        $nrcData = Nrc::orderBy('nrc_code')->pluck('name_mm', 'id');
        // $nrcData = Nrc::orderBy('nrc_code')->distinct()->get(['name_mm', 'name_mm']);

        return view('admin.employee.create', compact('page','departments','grades','positions','blood_groups','sub_departments','nrcData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeFormRequest $request)
    {
        $this->employeeRepository->saveEmployeeData($request);

        return redirect('admin/employee')->with('flash_message', 'Employee added!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page   = $this->page;
        $employee = $this->employeeRepository->getEmployeeData($id);
        $departments = Department::orderBy('sort_order')->pluck('department_name', 'id');
        $grades = Grade::orderBy('sort_order')->pluck('grade_name', 'id');
        $positions = Position::orderBy('sort_order')->pluck('position_title', 'id');
        $blood_groups = BloodGroup::orderBy('sort_order')->pluck('blood_group_name', 'id');
        $sub_departments = SubDepartment::orderBy('sort_order')->pluck('sub_department_name', 'id');
        
        $subDepartments = $employee->subDepartments()->pluck('sub_departments.sub_department_name','sub_departments.id')->toArray();

        return view('admin.employee.edit', compact('employee', 'page','departments','grades','positions','blood_groups','sub_departments','subDepartments'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeFormRequest $request, $id)
    {
        $this->employeeRepository->saveEmployeeData($request, $id);

        return redirect('admin/employee')->with('flash_message', 'Employee updated!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $page = $this->page;
        $employee = Employee::findOrFail($id);

        return view('admin.employee.show', compact('employee','page'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->employeeRepository->deleteEmployee($id);

        return redirect('admin/employee')->with('warning', 'Employee deleted!');
    }

    public function statusChange(Request $request)
    {
        $employee = $this->employeeRepository->employeeStatusChange($request);

        return response()->json(["success" => true]);
    }

    /**
     * get sub categories by category
     */
    public function getEmployeeByDepartment(Request $request)
    {
        $departments = $this->employeeRepository->getEmployeeByDepartmentId($request->id);

        return response()->json(['success' => true, 'data' => $departments]);
    }

    public function getSubDepartments(Request $request)
    {
        $departmentId = $request->input('department_id');        
        $subDepartments = SubDepartment::where('department_id', $departmentId)->pluck('sub_department_name', 'id');
        // Log::info($subDepartments);
        return response()->json($subDepartments);
    }
    
    public function getNrcName(Request $request, $nrcCodeId)
    {
        
        $nrc = Nrc::findOrFail($nrcCodeId);
               
        return response()->json(['name_en' => $nrc->name_en]);
    }
}
