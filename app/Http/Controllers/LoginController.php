<?php

namespace App\Http\Controllers;

use App\Models\LoginHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //Login
    public function login()
    {
        if (Auth::check()) {
            return redirect()->intended('admin/dashboard');
        } else {
            return view('admin/auth/login');
        }
    }

    //Login Post
    public function loginPost(Request $request)
    {

        $rules = array(
            'email' => 'required|email',
            'password' => 'required',
        );
        $messages = array(
            'email.required' => 'Email is required',
            'email.email' => 'Please enter valid email',
            'password.required' => 'Password is required',
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {

                $userid = auth()->user()->id;

                $logindata = [];
                $logindata['uuid'] = Str::uuid();
                $logindata['user_id'] = $userid;
                $logindata['ip_address'] = request()->ip();
                $logindata['login_time'] = \Carbon\Carbon::now();
                $inserted_login_data = LoginHistory::create($logindata);


                $user_data = [];
                $user_data['last_login'] = \Carbon\Carbon::now();
                $user_data['updated_at'] = date('Y-m-d H:i:s');

                DB::table('users')
                    ->where('id', $userid)
                    ->update($user_data);


                return redirect()->intended('admin/dashboard')
                    ->withSuccess('Signed in');
            } else {

                return back()->withInput()->withErrors("You have entered an invalid username or password");
            }
        }
    }

    //Logout
    public function logout()
    {

        $userid = auth()->user()->id;
        $ip = request()->ip();

        $loginId =  LoginHistory::where('user_id', $userid)->orderBy('id', 'DESC')->first();

        if (isset($loginId)) {
            $login_data = [];
            $login_data['logout_time'] = \Carbon\Carbon::now();
            $login_data['updated_at'] = date('Y-m-d H:i:s');

            DB::table('login_history')
                ->where('uuid', $loginId->uuid)
                ->update($login_data);
        }

        $user_data = [];
        $user_data['last_logout'] = \Carbon\Carbon::now();
        $user_data['updated_at'] = date('Y-m-d H:i:s');

        DB::table('users')
            ->where('id', $userid)
            ->update($user_data);

        Session::flush();
        Auth::logout();

        return Redirect('/');
    }

    // //Dashboard
    public function dashboard()
    {
        if (Auth::check()) {


            return view('admin/dashboard');
        }

        return redirect("admin")->withSuccess('are not allowed to access');
    }
}
