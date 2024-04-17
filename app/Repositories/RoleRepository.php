<?php

namespace App\Repositories;

use App\Models\Role;
use App\Interfaces\RoleInterface;


class RoleRepository implements RoleInterface
{
    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        $roles = $this->role::all();
        return $roles;
    }

    public function show($id)
    {
        $role = $this->role::find($id);
        return $role;
    }

    public function store($data)
    {
        $role = $this->role::create($data);
        return $role;
    }

    public function update($id, $data)
    {
        $role = $this->role::find($id);
        $role->update($data);
        return $role;
    }

    public function delete($id)
    {
        $role = $this->role::find($id);
        $role->delete();
        return $role;
    }
}
