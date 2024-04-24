<?php

namespace App\Repositories;

use App\Interfaces\Repositories\RoleRepositoryInterface;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Datatables;

class RoleRepository implements RoleRepositoryInterface
{
    public function getAllRoleList($request)
    {
        $roles = $this->rolesData($request);

        $datatables = DataTables::of($roles)
            ->addIndexColumn()
            ->addColumn('no', function ($roles) {
                return '';
            })

            ->addColumn('action', function ($roles) {
                $btn = '';

                $btn .= ' <a href="' . route('role.edit', $roles) . '" title="Edit Role"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';

                $btn .= '<form action="' . route('role.destroy', $roles->id) . '" method="POST" style="display:inline" class="deleteForm">
                                                ' . csrf_field() . '' . method_field("DELETE") . '
                                                    <button type="submit" class="btn btn-icon btn btn-secondary w-30px h-30px show_confirm_delete"
                                                    ><i class="bi bi-trash"></i></a>
                                                </form>
                                            </div>';

                return "<div class='action-column hidden'>" . $btn . "</div>";

            })
            ->rawColumns(['action']);

        return $datatables->make(true);
    }

    public function rolesData($request)
    {
        $search = $request->search;

        $data = Role::select('id', 'name');

        if ($search) {
            $data->where('name', 'LIKE', "%$search%");
        }

        return $data->get();
    }

    public function createRole()
    {
        $permissions = Permission::select('id', 'parent_id', 'name', 'title')->get();

        return $permissions;
    }

    public function saveRoleData($request, $id = null)
    {
        if ($id) {
            $role = Role::findOrFail($id);
            $role->update($request->all());
            $role->permissions()->detach();
        } else {
            $role = Role::create($request->all());
            $role->permissions()->detach();
        }

        if ($request->has('permissions')) {
            foreach ($request->permissions as $permission_name) {
                $permission = Permission::whereName($permission_name)->first();
                $role->givePermissionTo($permission);
            }
        }

        return $role;

    }

    public function getRoleData($id)
    {
        $role        = Role::findOrFail($id);
        $permissions = Permission::select('id', 'parent_id', 'title', 'name')->get();

        $data = [
            'role'        => $role,
            'permissions' => $permissions,
        ];

        return $data;

    }

    public function deleteRole($id)
    {
        return Role::destroy($id);
    }
}
