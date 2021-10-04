<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->mUser = new User;
        $this->mRole = new Role;
        $this->mPerson = new Person;
    }

    public function index()
    {
        return view('admin.user.index');
    }

    public function list(Request $request)
    {
        $query = $request->input('search', null);
        $users = $this->mUser
            ->where('email', 'like', "%$query%")
            ->get();

        return view('admin.user._list', compact('users'));
    }

    public function create()
    {
        $roles = Role::get();
        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $mPerson = $this->mPerson->create($request->person);
        $mUser = $this->mUser->create($request->user);
        $mUser->syncRoles($request->roles);
        $mUser->person()->associate($mPerson)->save();

        return response()->json([
            'status_name' => 'success',
            'process_createdUser' => $request->person['name']
        ]);
    }

    public function edit(User $user, Request $request)
    {
        $user_roles_id = $user->roles->pluck('id')->toArray();
        $roles = Role::get();
        return view('admin.user.edit', compact('user', 'user_roles_id', 'roles'));
    }

    public function update(User $user, request $request)
    {
        $user->person->update(array_filter($request->person));
        $user->update(array_filter($request->user));
        $user->syncRoles($request->roles);

        return redirect()->back()->with('success', 'Se ha actualizado el usuario correctamente.');
    }

    public function delete(User $user, request $request)
    {
        if (!($user->hasRole('super admin'))) {
            $user->delete();
        }

        return redirect()->back()->with('success', 'Usuario eliminado correctamente');
    }
}
