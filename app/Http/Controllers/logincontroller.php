<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logincontroller extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function proses(Request $request){

     $data= $request->validate([
        'email'=>'required|email',
        'password'=>'required'
        ]
    );

        if(Auth::attempt($data)){
        return redirect('index')->with('suksesl','berhasil login');
    }
        return back()->withErrors(['login'=>'Email/Password salah'])->withInput();
}

    public function logout(Request $request){

        auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function register(){
        return view('auth.register');
    }

    public function prosesRegis(Request $request){
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ];

        $request->validate([
            'name'=>'required',
            'email'=>'unique:users,email|required|email',
            'password'=>'required'
        ],[
            'email'=>'Email sudah terdaftar'
        ]);

        $data=User::create($data);
        return redirect('login')->with('sukses','Registrasi berhasil...')->withInput();
    }
}
