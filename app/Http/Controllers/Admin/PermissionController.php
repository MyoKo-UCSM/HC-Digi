<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\PermissionRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public $page = 'permission';
    private PermissionRepositoryInterface $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->middleware('role:admin');
        $this->permissionRepository = $permissionRepository;
    }

    public function index(Request $request)
    {
        $page = $this->page;

        return view('admin.permission.index', compact('page'));
    }

    public function getPermissions(Request $request)
    {
        return $this->permissionRepository->getAllPermissionList($request);
    }

    public function create()
    {
        $page = $this->page;

        return view('admin.permission.create', compact('page'));
    }

    public function store(Request $request)
    {
        $this->permissionRepository->savePermissionData($request);

        return redirect('admin/permission')->with('flash_message', 'Permission added!');
    }

    public function show($id)
    {
        $permission = Permission::findOrFail($id);

        return view('admin.permission.show', compact('permission'));
    }

    public function edit($id)
    {
        $page       = $this->page;
        $permission = $this->permissionRepository->getPermissionData($id);

        return view('admin.permission.edit', compact('permission', 'page'));
    }

    public function update(Request $request, $id)
    {
        $this->permissionRepository->savePermissionData($request, $id);

        return redirect('admin/permission')->with('flash_message', 'Permission updated!');
    }

    public function destroy($id)
    {
        $this->permissionRepository->deletePermission($id);

        return redirect('admin/permission')->with('flash_message', 'Permission deleted!');
    }
}
