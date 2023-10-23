<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use App\users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\If_;
use App\Mail\WelcomeEmail;

class ManageUserController extends Controller
{


    public function dashboard()
    {
        return view('dashboard');
    }
    public function viewAddUser()
    {
        $roles = Roles::all();
        return view('users.add_user', ['roles' => $roles]);
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email'),
            ],
            'password' => 'required|string|min:8',
            'userRole' => 'required',
        ]);

        if ($request->user()->where('email', $request->input('email'))->exists()) {
            return redirect()->route('users.add_user')->with('error', 'Email already exists. Please use a different email address.');
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('userRole');
        $user->save();


        $to = $request->input('email');
        $subject  = "ESI Card";
        $body = "Your login credentials are here:: " .$request->input('password') . "";
        $data = ['email_body' => $body];
        $mail = $subject;
        $emailClosure = function ($message) use ($mail, $to) {
            $message->to($to);
            $message->subject($mail);
        };
        $sent = Mail::send('emails.WelcomeEmail', $data, $emailClosure);
        if ($sent) {
            return redirect()->route('users.manage_user')->with('success', 'User added successfully and Email Sent SuccesFully  !!');
        }

        
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

        if ($user->delete()) {
            return redirect()->route('users.manage_user')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('users.manage_user')->with('error', 'Failed to delete user');
        }
    }



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
            'password' => 'nullable|string|min:8',
            // 'userRole' => 'required',

        ]);


        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.manage_user')->with('error', 'User not found');
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        // $user->userRole = $request->input('userRole');
        $user->save();

        $request->session()->flash('success', 'User Updated Successfully');
        return redirect('/users/manage_user');
    }
}
