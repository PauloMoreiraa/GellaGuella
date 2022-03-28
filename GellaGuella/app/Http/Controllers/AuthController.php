<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Classes\Util;
use App\Branch;
use App\Admin;

class AuthController extends Controller{
    
    // Adm - Auth

    function loginView(){ 
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('adm.login'); 
    }

    function dashboard(){
        if(Auth::check()){
            return view('adm.dashboard', [
                'branches' => Branch::all()
            ]);
        }
        return redirect()->route('login');
    }

    function modelView($id){
        if(Auth::check()){
            return view('adm.model', [
                'branch' => Branch::findOrFail($id)
            ]);
        }
        return redirect()->route('login');
    }

    function addView(){
        if(Auth::check()){
            return view('adm.add');
        }
        return redirect()->route('login');
    }

    function login(Request $request){
        try {
            $credentials = [
                'username' => $request->get('username'),
                'password' => $request->get('password')
            ];

            if(Auth::attempt($credentials)){
                return redirect()->route('dashboard');
            }

            (new Util())->flashError('Credenciais inválidas');
            return redirect()->back()->with("message", "roi");;

        } catch(\Throwable $th) {
            (new Util())->flashError('Algo deu errado :/');
            return redirect()->back();
        }
    }

    function logout(){
        Auth::logout();
        return redirect()->route('login');       
    }
}
