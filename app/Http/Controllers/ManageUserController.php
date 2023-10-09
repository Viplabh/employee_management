<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ManageUserController extends Controller
{
    public function add_user()
    {
        return view('users.add_user');
    }

    public function manage_user()
    {
        $users = User::all();

        return view('users.manage_user', ['users' => $users]);
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('users.edit_user', ['user' => $user]);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.manage_user')->with('error', 'User not found');
        }

        $user->delete();

        return redirect()->route('users.manage_user')->with('success', 'User deleted successfully');}
 
 
        public function updateUser(Request $request, $id)
        {
 
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email')->ignore($id),
                ],
                'password' => 'required|string|min:8',
            ]);

            $user = User::find($id);
        
            if (!$user) {
                return redirect()->route('users.manage_user')->with('error', 'User not found');
            }

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();
        
            return redirect()->route('users.manage_user')->with('success', 'User details updated successfully');
        }
        
           }
        

?>