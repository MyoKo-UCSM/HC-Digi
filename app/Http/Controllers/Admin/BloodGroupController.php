<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\BloodGroupRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\BloodGroup;
use App\Http\Requests\Admin\BloodGroupFormRequest;

class BloodGroupController extends Controller
{
    public $page = 'blood-group';
    private BloodGroupRepositoryInterface $bloodGroupRepository;

    public function __construct(BloodGroupRepositoryInterface $bloodGroupRepository)
    {
        //$this->middleware('role:admin');
        $this->bloodGroupRepository = $bloodGroupRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = $this->page;
        return view('admin.blood-group.index', compact('page'));
    }

    public function getBloodGroup(Request $request)
    {
        return $this->bloodGroupRepository->getAllBloodGroupList($request);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $page = $this->page;
        return view('admin.blood-group.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BloodGroupFormRequest $request){
        $this->bloodGroupRepository->saveBloodGroupData($request);
        return redirect('admin/blood-group')->with('flash_message', 'Blood Group added!');
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
        $blood_group = $this->bloodGroupRepository->getBloodGroupData((string) $id);

        return view('admin.blood-group.edit', compact('blood_group', 'page'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(BloodGroupFormRequest $request, string $id)
    {
        $this->bloodGroupRepository->saveBloodGroupData($request, $id);

        return redirect('admin/blood-group')->with('flash_message', 'Blood Group updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->bloodGroupRepository->deleteBloodGroup($id);

        return redirect('admin/blood-group')->with('flash_message', 'Blood Group deleted!');
    }

    public function statusChange(Request $request)
    {
        $sub_department = $this->bloodGroupRepository->bloodGroupStatusChange($request);

        return response()->json(["success" => true]);
    }
}

