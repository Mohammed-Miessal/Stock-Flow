<?php

namespace App\Services;

use App\Interfaces\RoleInterface;

class RoleService
{
    protected $role;

    public function __construct(RoleInterface $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        $roles = $this->role->index();
        return $roles;
    }

    public function show($id)
    {
        $role =  $this->role->show($id);
        return $role;
    }

    public function store($data)
    {
        $role =  $this->role->store($data);
        return $role;
    }

    public function update($id, $data)
    {
        $role =  $this->role->update($id, $data);
        return $role;
    }

    public function delete($id)
    {
        $role =  $this->role->delete($id);
        return $role;
    }
}
