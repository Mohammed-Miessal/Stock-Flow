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
        return $this->permission->index();
    }

    public function show($id)
    {
        return $this->permission->show($id);
    }

    public function store($data)
    {
        return $this->permission->store($data);
    }

    public function update($id, $data)
    {
        return $this->permission->update($id, $data);
    }

    public function delete($id)
    {
        return $this->permission->delete($id);
    }
}