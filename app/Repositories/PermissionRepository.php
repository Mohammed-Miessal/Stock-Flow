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
        return Permission::all();
    }

    public function show($id)
    {
        return Permission::find($id);
    }

    public function store($data)
    {
        return Permission::create($data);
    }

    public function update($id, $data)
    {
        return Permission::find($id)->update($data);
    }

    public function delete($id)
    {
        return Permission::find($id)->delete();
    }
}