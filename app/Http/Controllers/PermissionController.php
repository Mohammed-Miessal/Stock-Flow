<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Services\RoleService;
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
        dd($permissions);
        return view('permissions', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
