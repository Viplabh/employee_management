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
            'role' => 'required|max:255',
        ]);

        $role = new Roles();
        $role->role = $validatedData['role'];
        $role->save();

        return redirect()->route('role.manage_role')->with('success', 'Role created successfully');
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

    $role->delete();

    return redirect()->route('role.manage_role')->with('success', 'Role deleted successfully');
}


}
