<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->mRole = new Role;
        $this->mPermission = new Permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.role.index');
    }

    public function list(Request $request)
    {
        $query = $request->input('search', null);
        $roles = $this->mRole
            ->withCount('permissions')
            ->where('name', 'like', "%$query%")
            ->get();

        return view('admin.role._list', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = $this->mRole->firstOrCreate($request->role);

        return response()->json([
            'status_name' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role = $role->update($request->role);
        return response()->json([
            'status_name' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if ($role->name != 'super admin') {
            $role->delete();
        }

        return redirect()->back()->with('success', 'Rol eliminado correctamente');
    }

    public function editRolePermissions(Role $role)
    {
        $rolePermissionsIds = $role->permissions->pluck('id')->toArray();
        $permissions = $this->mPermission->get();
        return view('admin.role.permission.edit', compact('role', 'rolePermissionsIds', 'permissions'));
    }

    public function updateRolePermissions(Request $request, Role $role)
    {
        $role->syncPermissions($request->role['permissions_id'] ?? []);
        return response()->json([
            'status_name' => 'success'
        ]);
    }
}
