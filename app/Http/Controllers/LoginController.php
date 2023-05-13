<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;

class LoginController extends Controller
{
    public function getLogin() {
        return view('admin.login');
    }
    
    public function postLogin(Request $request) {        
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        $admin = Admin::where('adminUsername', $credentials['username'])->first();
    
        if($admin) {
            if($admin->adminPass == $credentials['password']) {
                $request->session()->put('user_name', $admin->adminFullName);
                return redirect('admin/index');
            }
            else {
                return back()->with('fail', 'Password is not match!');
            }
        }
        else {
            return back()->with('fail', 'Admin username is not existed.');
        }
    }    
}
