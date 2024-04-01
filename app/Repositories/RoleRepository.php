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
        return Role::all();
    }

    public function show($id)
    {
        return Role::find($id);
    }

    public function store($data)
    {
        return Role::create($data);
    }

    public function update($id, $data)
    {
        return Role::find($id)->update($data);
    }

    public function delete($id)
    {
        return Role::find($id)->delete();
    }
}
