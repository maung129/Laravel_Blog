<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){
        $cleanData = request()->validate([
            'name'=>['required'],
            'username'=>['required',Rule::unique('users','username')],
            'email'=>['required',Rule::unique('users','email')],
            'password'=>['required']
        ]);
        $cleanData['role_id'] = 2;
        $user = User::create($cleanData);
        auth()->login($user);
        return redirect('/')->with('success','Successfully Register your Account ,'.auth()->user()->username);
    }

    public function login(){
        return view('login.login');
    }

    public function post_login(){
        $data = request()->validate([
            'email'=>['required',Rule::exists('users','email')],
            'password'=>['required']
        ]);

        if(auth()->attempt($data)){
        return redirect('/')->with('success','Successfully Login your Account'.auth()->user()->name);

        }
        else{
            return back()->withErrors(['email'=>'Something went wrong']);
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('/')->with('success','Logout Successfully');
    }
}
