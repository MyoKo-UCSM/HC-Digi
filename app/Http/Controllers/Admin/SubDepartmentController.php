<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\SubDepartmentRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Requests\Admin\SubDepartmentFormRequest;

class SubDepartmentController extends Controller
{
    public $page = 'sub-department';
    private SubDepartmentRepositoryInterface $subDepartmentRepository;

    public function __construct(SubDepartmentRepositoryInterface $subDepartmentRepository)
    {
        //$this->middleware('role:admin');
        $this->subDepartmentRepository = $subDepartmentRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = $this->page;
        return view('admin.sub-department.index', compact('page'));
    }

    public function getSubDepartment(Request $request)
    {
        return $this->subDepartmentRepository->getAllSubDepartmentList($request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $page = $this->page;
        $departments = Department::orderBy('created_at')->pluck('department_name', 'id');
        return view('admin.sub-department.create', compact('page','departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubDepartmentFormRequest $request){
        $this->subDepartmentRepository->saveSubDepartmentData($request);
        return redirect('admin/sub-department')->with('flash_message', 'Sub Department added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page       = $this->page;
        $departments = Department::orderBy('created_at')->pluck('department_name', 'id');
        $sub_department = $this->subDepartmentRepository->getSubDepartmentData((string) $id);

        return view('admin.sub-department.edit', compact('sub_department', 'page','departments'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(SubDepartmentFormRequest $request, string $id)
    {
        $this->subDepartmentRepository->saveSubDepartmentData($request, $id);

        return redirect('admin/sub-department')->with('flash_message', 'Sub Department updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->subDepartmentRepository->deleteSubDepartment($id);

        return redirect('admin/sub-department')->with('flash_message', 'Sub Department deleted!');
    }

    public function statusChange(Request $request)
    {
        $sub_department = $this->subDepartmentRepository->subDepartmentStatusChange($request);

        return response()->json(["success" => true]);
    }
}

