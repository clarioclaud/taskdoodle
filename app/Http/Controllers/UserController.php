<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscription;
use Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    public function Users()
    {
        $users = User::latest()->get();
        return view('user.user_list',compact('users'));
    }

    public function UserEdit($id)
    {
        $user = User::findOrFail($id);
        return view('user.user_edit',compact('user'));
    }

    public function UserUpdate(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('admin.users')->with('error','User Updated Successfully');
    }

    public function UserDelete($id)
    {
        $user = User::findOrFail($id)->delete();
        return redirect()->back()->with('error','User Deleted Successfully');
    }

    public function Subscribe(Request $request)
    {
        $sub = Subscription::insert([
            'user_id' => Auth::user()->id,
            'book_id' => $request->book_id,
            'expired_at' => Carbon::now()->addMonth(),
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('error','Subscribed Successfully');
    }
}
