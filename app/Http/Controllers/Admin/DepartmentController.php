<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\DepartmentRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\DepartmentFormRequest;

class DepartmentController extends Controller
{
    public $page = 'department';
    private DepartmentRepositoryInterface $departmentRepository;

    public function __construct(DepartmentRepositoryInterface $departmentRepository)
    {
        //$this->middleware('role:admin');
        $this->departmentRepository = $departmentRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = $this->page;
        return view('admin.department.index', compact('page'));
    }

    public function getDepartment(Request $request)
    {
        return $this->departmentRepository->getAllDepartmentList($request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $page = $this->page;
       
        return view('admin.department.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentFormRequest $request){
        $this->departmentRepository->saveDepartmentData($request);
        return redirect('admin/department')->with('flash_message', 'Department added!');
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
        $department = $this->departmentRepository->getDepartmentData((string) $id);

        return view('admin.department.edit', compact('department', 'page'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentFormRequest $request, string $id)
    {
        $this->departmentRepository->saveDepartmentData($request, $id);

        return redirect('admin/department')->with('flash_message', 'Department updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->departmentRepository->deleteDepartment($id);

        return redirect('admin/department')->with('flash_message', 'Department deleted!');
    }

    public function statusChange(Request $request)
    {
        $department = $this->departmentRepository->departmentStatusChange($request);

        return response()->json(["success" => true]);
    }
}

