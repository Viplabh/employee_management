<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class ManageRoleController extends Controller
{
    public function add_role()
    {
        return view('role.add_role');
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'role' => 'required|max:255|unique:roles',
        ]);

        $existingRole = Roles::where('role', $validatedData['role'])->first();

        if ($existingRole) {
            return redirect()->route('role.manage_role')->withErrors(['role' => 'Role already exists']);
        }

        $role = new Roles();
        $role->role = $validatedData['role'];
        $role->save();

        return redirect()->route('role.manage_role')->with('success', 'Role created successfully!!!');
    }

    public function manage_role()
    {
        $roles = Roles::all();
        return view('role.manage_role', ['roles' => $roles]);
    }

    public function destroy($roleID)
    {
        $role = Roles::find($roleID);

        if (!$role) {
            return redirect()->route('role.manage_role')->with('error', 'Role not found');
        }

        if ($role->delete()) {
            session()->flash('success', 'Role Deleted Successfully!!!');
            return redirect('/role/manage_role');
        } else {
            return redirect()->route('/role/manage_role')->with('error', 'Failed to delete role');
        }
    }


    public function edit($roleID)
    {
        $role = Roles::find($roleID);

        if (!$role) {
            return redirect()->route('role.manage_role')->with('error', 'Role not found');
        }

        return view('role.edit_role', ['role' => $role]);
    }

    public function update(Request $request, $roleID)
    {
        $validatedData = $request->validate([
            'role' => 'required|max:255',
        ]);

        $role = Roles::find($roleID);

        if (!$role) {
            return redirect()->route('role.manage_role')->with('error', 'Role not found');
        }

        $role->role = $validatedData['role'];
        $role->save();

        $request->session()->flash('success', 'Role Updated Successfully');
        return redirect('/role/manage_role');
    }
}
