<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\PositionRepositoryInterface;
use App\Http\Requests\Admin\PositionFormRequest;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Department;


class PositionController extends Controller
{
    public $page = 'position';
    private PositionRepositoryInterface $positionRepository;

    public function __construct(PositionRepositoryInterface $positionRepository)
    {
        $this->positionRepository = $positionRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page  = $this->page;
        return view('admin.position.index', compact('page'));
    }

    public function getPosition(Request $request)
    {
        return $this->positionRepository->getAllPositionList($request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = $this->page;
        // $departments = $this->positionRepository->createPosition();
        $departments = Department::orderBy('sort_order')->pluck('department_name', 'id');
        $grades = Grade::orderBy('sort_order')->pluck('grade_name', 'id');
    
        return view('admin.position.create', compact('page','departments','grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PositionFormRequest $request)
    {
        $this->positionRepository->savePositionData($request);

        return redirect('admin/position')->with('flash_message', 'Position added!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page   = $this->page;
        $position = $this->positionRepository->getPositionData($id);
        //$departments = $this->positionRepository->createPosition();
        $departments = Department::orderBy('sort_order')->pluck('department_name', 'id');
        $grades = Grade::orderBy('sort_order')->pluck('grade_name', 'id');
        return view('admin.position.edit', compact('position', 'page','departments','grades'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(PositionFormRequest $request, $id)
    {
        $this->positionRepository->savePositionData($request, $id);

        return redirect('admin/position')->with('flash_message', 'Position updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->positionRepository->deletePosition($id);

        return redirect('admin/position')->with('warning', 'Position deleted!');
    }

    public function statusChange(Request $request)
    {
        $position = $this->positionRepository->positionStatusChange($request);

        return response()->json(["success" => true]);
    }

    /**
     * get sub categories by category
     */
    public function getPositionByDepartment(Request $request)
    {
        $departments = $this->positionRepository->getPositionByDepartmentId($request->id);

        return response()->json(['success' => true, 'data' => $departments]);
    }
}
