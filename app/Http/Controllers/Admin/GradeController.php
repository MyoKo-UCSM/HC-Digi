<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\GradeRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\GradeFormRequest;

class GradeController extends Controller
{
    public $page = 'grade';
    private GradeRepositoryInterface $gradeRepository;

    public function __construct(GradeRepositoryInterface $gradeRepository)
    {
        //$this->middleware('role:admin');
        $this->gradeRepository = $gradeRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = $this->page;
        return view('admin.grade.index', compact('page'));
    }

    public function getGrade(Request $request)
    {
        return $this->gradeRepository->getAllGradeList($request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $page = $this->page;
        return view('admin.grade.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GradeFormRequest $request){
        $this->gradeRepository->saveGradeData($request);
        return redirect('admin/grade')->with('flash_message', 'Grade added!');
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
        $grade = $this->gradeRepository->getGradeData($id);

        return view('admin.grade.edit', compact('grade', 'page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GradeFormRequest $request, string $id)
    {
        $this->gradeRepository->saveGradeData($request, $id);

        return redirect('admin/grade')->with('flash_message', 'Grade updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->gradeRepository->deleteGrade($id);

        return redirect('admin/grade')->with('flash_message', 'Grade deleted!');
    }

    public function statusChange(Request $request)
    {
        $grade = $this->gradeRepository->gradeStatusChange($request);

        return response()->json(["success" => true]);
    }
}

