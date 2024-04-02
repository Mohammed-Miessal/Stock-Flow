<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoleService;
use App\Services\UserService;
use App\Services\PermissionService;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Helpers\Helper;

class UserController extends Controller
{

    protected $user;
    protected $role;
    protected $permission;
    public function __construct(UserService $user, RoleService $role, PermissionService $permission)
    {
        $this->user = $user;
        $this->role = $role;
        $this->permission = $permission;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->user->index();
        $users->map(function ($user) {
            $user->permissions_count = user_permissions_counts($user->id);
            return $user;
        });
        return view('chapters.User.read', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->role->index();
        $permissions = $this->permission->index();
        return view('chapters.User.create', compact('roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();


        $user = $this->user->store([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->roles()->sync($data['role_id']);
        $user->permissions()->sync($data['permission_id']);

        return  redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->user->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = $this->role->index();
        $permissions = $this->permission->index();
        $user = $this->user->show($id);
        $role_id = optional($user->roles->first())->id;
        $permission_id = optional($user->permissions->first())->id;
        return view('chapters.User.edit', compact('roles', 'permissions', 'user', 'role_id', 'permission_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $data = $request->validated();
        $infos =  [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ];

        $this->user->update($id, $infos);
        $user =  $this->user->show($id);

        $user->roles()->sync($data['role_id']);
        $user->permissions()->sync($data['permission_id']);

        return  redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->user->delete($id);

        return redirect()->back();
    }
}
