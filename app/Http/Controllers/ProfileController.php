<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    //Index
    public function index()
    {
        $profile = User::find(Auth::user()->id);

        return view('admin/profile.index', compact('profile'));
    }

    //Profile Update
    public function profileUpdate(Request $request)
    {
        $id = Auth::user()->id;

        $rules = array(
            'name' => 'required',
            'email' => 'required|email|unique:users,email, ' . $id,
            'username' => 'required|unique:users,username, ' . $id,
        );
        $messages = array(
            'name.required' => 'Email is required',
            'email.required' => 'Email is required',
            'email.unique' => 'This email already registered.',
            'email.email' => 'Please enter valid email',
            'username.required' => 'Username is required',
            'username.unique' => 'This username already registered.',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {

            $update['name'] = $request->name;
            $update['username'] = $request->username;
            $update['email'] = $request->email;
            $update['updated_at'] = date('Y-m-d H:i:s');

            DB::table('users')
                ->where('id', $id)
                ->update($update);

            return back()->with('success', 'Details Updated Succesfully');
        }
    }

    //Password Update
    public function passwordUpdate(Request $request)
    {
        $id = Auth::user()->id;

        $rules = array(
            'old_password'     => 'required',
            'new_password'     => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        );
        $messages = array(
            'old_password.required' => 'Old password is required',
            'new_password.required' => 'New password is required',
            'new_password.min' => 'Password is Too short',
            'confirm_password.same' => 'passwords are not same',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {

            $oldpassword     = $request->old_password;
            $newpassword     = $request->new_password;
            $confirmpassword = $request->confirm_password;
            $admin = User::find(Auth::user()->id);

            if (!Hash::check($oldpassword, $admin->password)) {
                return back()->with('error', 'The specified password does not match the database password');
            } else {
                if ($newpassword == $confirmpassword) {
                    $admin = User::find($id);
                    $admin->password =  Hash::make($newpassword);
                    $admin->save();
                    return back()->with('success', 'Password Updated Successfully');
                } else {
                    return back()->with('error', 'New password does not match with confirm password');
                }
            }
        }
    }
}
