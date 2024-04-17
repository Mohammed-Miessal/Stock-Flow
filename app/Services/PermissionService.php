<?php

namespace App\Services;

use App\Interfaces\PermissionInterface;

class PermissionService
{
    protected $permission;

    public function __construct(PermissionInterface $permission)
    {
        $this->permission = $permission;
    }

    public function index()
    {
        $permissions = $this->permission->index();
        return  $permissions ;
    }

    public function show($id)
    {
        $permission =  $this->permission->show($id);
        return  $permission ;
    }

    public function store($data)
    {
        $permission = $this->permission->store($data);
        return  $permission ;
    }

    public function update($id, $data)
    {
        $permission =  $this->permission->update($id, $data);
        return  $permission ;
    }

    public function delete($id)
    {
        $permission =  $this->permission->delete($id);
        return  $permission ;
    }
}
