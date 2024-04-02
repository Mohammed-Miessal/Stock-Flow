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
        return $this->role->index();
    }

    public function show($id)
    {
        return $this->role->show($id);
    }

    public function store($data)
    {
        return $this->role->store($data);
    }

    public function update($id, $data)
    {
        return $this->role->update($id, $data);
    }

    public function delete($id)
    {
        return $this->role->delete($id);
    }
}
