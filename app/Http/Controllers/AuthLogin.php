<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthLogin extends Controller
{
    public function login(){
        return view('login');
    }

    public function logining(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(!auth()->attempt($request->only('email','password'),$request->remember_me)){
            return back()->with('msg', 'invalid login credential');
        }else{
            return redirect('/');
        }
    }
}
