<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->passes()) {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                if(Auth::guard('admin')->user()->role != 'admin'){
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')->with('error','You are not authorized to access this page.');

                }
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('admin.login')->with('error','Either email or password is incorrect.');
            }
        } else {
            return redirect()->route('admin.login')
                ->withInput()
                ->withErrors($validator);
        }
    }
    public function logout() {    
        Auth::guard('admin')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
