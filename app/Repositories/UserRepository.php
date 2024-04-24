<?php

namespace App\Repositories;

use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Datatables;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUserList($request)
    {
        $users = $this->usersData($request);

        $datatables = DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('no', function ($users) {
                return '';
            })
            ->editColumn('role', function ($users) {
                $role = $users->role_name;
                return $role;

            })
            ->addColumn('action', function ($users) {
                $btn = '';

                $btn .= ' <a href="' . route('user.edit', $users) . '" title="Edit users"><button class="btn btn-icon btn btn-secondary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>';

                $btn .= '<form action="' . route('user.destroy', $users->id) . '" method="POST" style="display:inline" class="deleteForm">
                                        ' . csrf_field() . '' . method_field("DELETE") . '
                                            <button type="submit" class="btn btn-icon btn btn-secondary w-30px h-30px show_confirm_delete"
                                            ><i class="bi bi-trash"></i></a>
                                        </form>
                                    </div>';

                return "<div class='action-column hidden'>" . $btn . "</div>";

            })
            ->rawColumns(['role', 'action']);

        return $datatables->make(true);
    }

    public function usersData($request)
    {
        $search = $request->search;

        $data = User::leftJoin('model_has_roles', function ($join) {
            return $join->on('model_has_roles.model_id', '=', 'users.id');
        })
            ->leftJoin('roles', function ($join) {
                return $join->on('model_has_roles.role_id', '=', 'roles.id');
            })
            ->select('users.*', 'roles.name as role_name');

        if ($search) {
            $data->where('users.name', 'LIKE', "%$search%");
            $data->orWhere('users.email', 'LIKE', "%$search%");
        }

        return $data->get();
    }

    public function saveUserData($request, $id = null)
    {
        $data = $request->except('password');

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        }

        if ($id) {
            $user = User::findOrFail($id);
            $user->update($data);

            $user->roles()->detach();
            foreach ($request->roles as $role) {
                $user->assignRole($role);
            }
        } else {
            $user = User::create($data);

            foreach ($request->roles as $role) {
                $user->assignRole($role);
            }
        }

        return $user;
    }

    public function createUser()
    {
        $roles = Role::select('id', 'name')->get();
        $roles = $roles->pluck('name', 'name');

        return $roles;
    }

    public function getUserData($id)
    {
        $roles = Role::select('id', 'name')->get();
        $roles = $roles->pluck('name', 'name');

        $user       = User::with('roles')->select('id', 'name', 'email')->findOrFail($id);
        $user_roles = [];

        foreach ($user->roles as $role) {
            $user_roles[] = $role->name;
        }

        $data = [
            'user'       => $user,
            'roles'      => $roles,
            'user_roles' => $user_roles,
        ];

        return $data;
    }

    public function deleteUser($id)
    {
        return User::destroy($id);
    }
}
