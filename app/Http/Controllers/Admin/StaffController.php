<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StaffFormRequest;
use App\Interfaces\Repositories\StaffRepositoryInterface;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public $page = 'staff';
    private StaffRepositoryInterface $staffRepository;

    public function __construct(StaffRepositoryInterface $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    public function index()
    {
        $page = $this->page;

        return view('admin.staff.index', compact('page'));
    }

    public function getStaffs(Request $request)
    {
        return $this->staffRepository->getAllStaffList($request);
    }

    public function create()
    {
        $page = $this->page;
        $positions = $this->staffRepository->createStaff();
    
        return view('admin.staff.create', compact('page','positions'));
    }

    public function store(StaffFormRequest $request)
    {
        $this->staffRepository->saveStaffData($request);

        return redirect('/admin/staff')->with('flash_message', 'Staff Added!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $page   = $this->page;
        $staff = $this->staffRepository->getStaffData($id);
        $positions = $this->staffRepository->createStaff();
        return view('admin.staff.edit', compact('staff', 'page','positions'));
    }

    public function update(Request $request, $id)
    {
        $this->staffRepository->saveStaffData($request, $id);

        return redirect('/admin/staff')->with('flash_message', 'Staff Updated!');
    }

    public function destroy($id)
    {
        $this->staffRepository->deleteStaff($id);

        return redirect('/admin/staff')->with('warning', 'Staff Deleted!');
    }

    public function statusChange(Request $request)
    {
        $member = $this->staffRepository->staffStatusChange($request);

        return response()->json(["success" => true]);
    }
}
