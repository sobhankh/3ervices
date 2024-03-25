<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Auth;
use App\Models\Inner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use MongoDB\Driver\Session;

class AuthController extends Controller
{
    public function index($password){

        if (session('login')){
            \session()->forget('login');
        }

        $inner = Inner::find(1);
            
        if (Hash::check($password,$inner['password'])){
            return view('admin.pages.auth.login');
        }else{
            return redirect()->back(); 
        }

    }

    public function login(Request $request){
        
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $login = Auth::where('username',$request['username'])->first();

        if (!empty($login['username'])){

            if (Hash::check($request['password'],$login['password'])){
                \session(['login'=> true]);
                return redirect()->route('admin');
            }else{
                return redirect()->back()->with('status',"اطلاعات اشتباه است");
            }
        }

    }
}
