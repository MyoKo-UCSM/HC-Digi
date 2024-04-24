<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\RoleRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public $page = 'role';
    private RoleRepositoryInterface $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->middleware('role:admin');
        $this->roleRepository = $roleRepository;
    }

    public function index(Request $request)
    {
        $page = $this->page;

        return view('admin.role.index', compact('page'));
    }

    public function getRoles(Request $request)
    {
        return $this->roleRepository->getAllRoleList($request);
    }

    public function create()
    {
        $page        = $this->page;
        $permissions = $this->roleRepository->createRole();

        return view('admin.role.create', compact('permissions', 'page'));
    }

    public function store(Request $request)
    {
        $this->roleRepository->saveRoleData($request);

        return redirect('admin/role')->with('flash_message', 'Role added!');
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);

        return view('admin.role.show', compact('role'));
    }

    public function edit($id)
    {
        $page = $this->page;
        $data = $this->roleRepository->getRoleData($id);

        return view('admin.role.edit', $data, compact('page'));
    }

    public function update(Request $request, $id)
    {
        $this->roleRepository->saveRoleData($request, $id);

        return redirect('admin/role')->with('flash_message', 'Role updated!');
    }

    public function destroy($id)
    {
        $this->roleRepository->deleteRole($id);

        return redirect('admin/role')->with('flash_message', 'Role deleted!');
    }
}
