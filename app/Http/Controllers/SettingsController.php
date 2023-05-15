<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::where('status', 1)->first();

        return view('admin/settings.index', compact('settings'));
    }

    public function settingsUpdate(Request $request)
    {

        $settings = Settings::where('status', 1)->first();

        $rules = array(
            'default_password' => 'required',
            'email' => 'required|email|unique:settings,email, ' . $settings->id,
            'phone1' => 'required|numeric',
            'phone2' => 'nullable|numeric',
            'mobile' => 'nullable|numeric',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'default_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        );
        $messages = array(
            'default_password.required' => 'Default Password is required',
            'email.required' => 'Email is required',
            'email.unique' => 'This email already registered.',
            'email.email' => 'Please enter valid email',
            'phone1.required' => 'Phone 1 is required',
            'phone1.numeric' => 'Please enter valid phone',
            'phone2.numeric' => 'Please enter valid phone',
            'mobile.numeric' => 'Please enter valid phone',
            'facebook_url.url' => 'Please enter valid URL',
            'twitter_url.url' => 'Please enter valid URL',
            'instagram_url.url' => 'Please enter valid URL',
            'default_image.image' => 'Please enter valid Image',
            'logo.image' => 'Please enter valid Image',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {


            $update = [];
            $update['default_password'] = $request->default_password;
            $update['email'] = $request->email;
            $update['phone1'] = $request->phone1;
            $update['phone2'] = $request->phone2;
            $update['mobile'] = $request->mobile;
            $update['address'] = $request->address;
            $update['copyright_content'] = $request->copyright_content;
            $update['facebook_url'] = $request->facebook_url;
            $update['twitter_url'] = $request->twitter_url;
            $update['instagram_url'] = $request->instagram_url;
            $destinationPath =  public_path('uploads/default/');

            if ($logo = $request->file('logo')) {

                $logoName = Str::uuid() . "." . $logo->getClientOriginalExtension();
                $logo->move($destinationPath, $logoName);
                $update['logo'] = 'uploads/default/' . "$logoName";
            }

            if ($default_image = $request->file('default_image')) {


                $defaultName = Str::uuid() . "." . $default_image->getClientOriginalExtension();
                $default_image->move($destinationPath, $defaultName);
                $update['default_image'] = 'uploads/default/' . "$defaultName";
            }

            if ($fav_icon = $request->file('fav_icon')) {

                $iconName = Str::uuid() . "." . $fav_icon->getClientOriginalExtension();
                $fav_icon->move($destinationPath, $iconName);
                $update['fav_icon'] = 'uploads/default/' . "$iconName";
            }

            $update['updated_at'] = date('Y-m-d H:i:s');

            DB::table('settings')
                ->update($update);

            return back()->with('success', 'Details Updated Succesfully');
        }
    }
}