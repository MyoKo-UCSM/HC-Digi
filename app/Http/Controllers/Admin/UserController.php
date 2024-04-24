<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $page = 'user';
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware('role:admin');
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $page = $this->page;

        return view('admin.user.index', compact('page'));
    }

    public function getUsers(Request $request)
    {
        return $this->userRepository->getAllUserList($request);
    }

    public function create()
    {
        $page  = $this->page;
        $roles = $this->userRepository->createUser();

        return view('admin.user.create', compact('roles', 'page'));
    }

    public function store(Request $request)
    {
        $this->userRepository->saveUserData($request);

        return redirect('admin/user')->with('flash_message', 'User added!');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.show', compact('user'));
    }

    public function edit($id)
    {
        $page = $this->page;
        $data = $this->userRepository->getUserData($id);

        return view('admin.user.edit', $data, compact('page'));
    }

    public function update(Request $request, $id)
    {
        $this->userRepository->saveUserData($request, $id);

        return redirect('admin/user')->with('flash_message', 'User updated!');
    }

    public function destroy($id)
    {
        $this->userRepository->deleteUser($id);

        return redirect('admin/user')->with('flash_message', 'User deleted!');
    }
}
