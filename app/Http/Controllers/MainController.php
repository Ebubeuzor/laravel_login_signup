<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{

    function register()
    {
        return view('auth.register');
    }
    

    function login()
    {
        return view('auth.login');
    }
    

    function save(Request $request)
    {
        $request->validate([
            
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:5|max:12',
            'confirm_pwd' => 'required',
            'profileUpload' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $file = $request->file('profileUpload');
        $imageName = $file->getClientOriginalName();
        $file->move('userProfile',$imageName);

        $admin = new Admin();
        $admin->firstName = $request->firstName;
        $admin->lastName = $request->lastName;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        
        if (!empty($request->profileUpload)) {
            $admin->profilePic = 'userProfile/' . $imageName;
        } else {
            $admin->profilePic = 'userProfile/luser.png';
        }

        $save = $admin->save();

        if ($save) {
            // back()->with('Success','User Sucessfully added');
            return redirect("auth/login");
        } else {
            return back()->with('Fail',"Something went wrong try again later");
        }
        
    }

    function check(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $userInfo = Admin::whereEmail($request->email)->first();

        if (!$userInfo) {
            return back()->with('Fail',"User Not Found");
        } else {

            if(Hash::check($request->password,$userInfo->password)){
                $request->session()->put('LoggedUser',$userInfo->id);
                return redirect('admin/dashboard');
            }else{
                return back()->with('Fail',"Invalid Password");
            }
        }
        
    }

    function dashboard()
    {
        $data = ["LoggedUserInfo" => Admin::whereId(session('LoggedUser'))->first()];
        return view('admin.dashboard',$data);
    }

    function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }
}

