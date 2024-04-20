<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Services\PermissionService;

class PermissionController extends Controller
{

    protected $permission;

    public function __construct(PermissionService $permission)
    {
        $this->permission = $permission;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = $this->permission->index();
        return view('chapters.Permission.read', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('chapters.Permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRequest $request)
    {
        $data = $request->validated();
        $this->permission->store($data);
        return redirect()->route('permission.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        $this->permission->show($permission->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        $permission = $this->permission->show($permission->id);
        return view('chapters.Permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $data = $request->validated();
        $this->permission->update($permission->id, $data);
        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $this->permission->delete($permission->id);
        return redirect()->route('permission.index');
    }
}
