<?php 

namespace App\Repositories;

use App\Models\Permission;
use App\Interfaces\PermissionInterface;


class PermissionRepository implements PermissionInterface
{
    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function index()
    {
        $permissions = $this->permission::all();
        return $permissions;
    }

    public function show($id)
    {
        $permission = $this->permission::find($id);
        return $permission;
    }

    public function store($data)
    {
        $permission = $this->permission::create($data);
        return $permission;
    }

    public function update($id, $data)
    {
        $permission = $this->permission::find($id);
        $permission->update($data);
        return $permission;
    }

    public function delete($id)
    {
        $permission = $this->permission::find($id);
        $permission->delete();
        return $permission;
    }
}
