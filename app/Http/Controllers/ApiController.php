<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Subscription;
use App\Models\Book;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function Register(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validate->errors(),
            ],203);
        }

        $create = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->pasword),
            'created_at' => Carbon::now()
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User Registered Successfully',
        ],200);
    }

    public function Login(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validate->errors(),
            ],203);
        }

        $user = $request->all();

        if (Auth::attempt(['email' => $user['email'],'password' => $user['password']])) {
            return response()->json([
                'status' => 'success',
                'message' => 'Login Successfully',
                'token' => Auth::user()->createToken('user')->plainTextToken,
				'details' => Auth::user(),
            ],200);
        }else {
            return response()->json([
                'status' => 'error',
                'message' => 'Login Failed...Incorrect Email and password',
            ],201);
        }
    }


    public function Logout()
    {
        if (Auth::check()) {
            Auth::user()->tokens()->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Logout Successfully',
            ],200);
        }
    }

    public function Url($data)
    {
        foreach ($data as $det) {
            $det->image = asset($det->image);
        }

        return $data;
    }

    public function Books()
    {
        $books = Book::where('status',1)->latest()->get();
        if (count($books) > 0) {
            return response()->json([
                'status' => 'success',
                'Books' => $this->Url($books),
            ],200);
        } else {
            return response()->json([
                'status' => 'error',
                'Books' => 'No Books Found',
            ],201);
        }      
        
    }

    public function SubscribeBook(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'book_id' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validate->errors(),
            ],203);
        }

        $book = Subscription::create([
            'user_id' => Auth::id(),
            'book_id' => $request->book_id,
            'expired_at' => Carbon::now()->addMonth()->format('Y-m-d'),
            'created_at' => Carbon::now(),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Subscription done',
        ],200);
        
    }
	
	public function SubscribeList()
    {
		$list = Subscription::where('user_id',Auth::id())->latest()->get();
		if(count($list) > 0){
			return response()->json([
				'status' => 'success',
				'list' => $list,
			],200);
		}else{
			return response()->json([
				'status' => 'error',
				'message' => 'No subscription found',
			],201);
		}
	}
}
