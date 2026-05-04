<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['roles', 'permissions'])->get();
        $roles = Role::all();
        $permissions = \Spatie\Permission\Models\Permission::all();
        return view('admin.users.index', compact('users', 'roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);

        $user->assignRole($request->role);
        
        if ($request->has('permissions')) {
            $user->syncPermissions($request->permissions);
        }

        return back()->with('success', 'تم إضافة المستخدم بنجاح.');
    }

    public function destroy(User $user)
    {
        if ($user->email === 'admin@admin.com') {
            return back()->withErrors(['error' => 'لا يمكن حذف الحساب الأساسي للنظام.']);
        }

        $user->delete();
        return back()->with('success', 'تم حذف المستخدم بنجاح.');
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);

        $user->syncRoles([$request->role]);
        return back()->with('success', 'تم تحديث رتبة المستخدم بنجاح.');
    }

    public function updatePermissions(Request $request, User $user)
    {
        $user->syncPermissions($request->permissions ?? []);
        return back()->with('success', 'تم تحديث صلاحيات المستخدم بنجاح.');
    }
}
