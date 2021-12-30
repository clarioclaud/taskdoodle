<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Book;
use App\Models\Subscription;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Auth;

class AdminController extends Controller
{
    public function Register()
    {
        return view('admin.admin_register');
    }

    public function RegisterStore(Request $request)
    {
        $result = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('admin.login')->with('error','Admin Created Successfully');
    }

    public function Login()
    {
        return view('admin.admin_login');
    }

    public function LoginStore(Request $request)
    {
        $check = $request->all();
        if (Auth::guard('admin')->attempt(['email' => $check['email'],'password' => $check['password']])) {
            return redirect()->route('admin.index')->with('error','Admin Login Successfully');
        }else {
            return redirect()->back()->with('error','Invalid Credentials');
        }
    }

    public function Dashboard()
    {
        $user = User::all();
        $book = Book::all();
        $sub = Subscription::all();
        return view('admin.index',compact('user','book','sub'));
    }

    public function Logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('error','Admin Logout Successfully');
    }
}
