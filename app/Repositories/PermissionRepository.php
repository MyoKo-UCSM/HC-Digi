<?php

namespace App\Repositories;

use App\Interfaces\Repositories\PermissionRepositoryInterface;
use Spatie\Permission\Models\Permission;
use Yajra\Datatables\Datatables;

class PermissionRepository implements PermissionRepositoryInterface
{
    public function getAllPermissionList($request)
    {
        $permissions = $this->permissionsData($request);

        $datatables = DataTables::of($permissions)
            ->addIndexColumn()
            ->addColumn('no', function ($permissions) {
                return '';
            })
            ->addColumn('action', function ($permissions) {
                $btn = '';

                $btn .= ' <a href="' . route('permission.edit', $permissions) . '" title="Edit Permission"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';

                $btn .= '<form action="' . route('permission.destroy', $permissions->id) . '" method="POST" style="display:inline" class="deleteForm">
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

    public function permissionsData($request)
    {
        $search = $request->search;
        $data   = Permission::select('id', 'title', 'name');

        if ($search) {
            $data->where('title', 'LIKE', "%$search%")->orWhere('name', 'LIKE', "%$search%");
        }

        return $data->get();
    }

    public function savePermissionData($request, $id = null)
    {
        if ($id) {
            $permission = Permission::findOrFail($id);
            $permission->update($request->all());
        } else {
            $permission = Permission::create($request->all());
        }

        return $permission;
    }

    public function getPermissionData($id)
    {
        return Permission::findOrFail($id);
    }

    public function deletePermission($id)
    {
        return Permission::destroy($id);
    }
}
