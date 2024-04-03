<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index()
    {
        return view('authentication.login.index');
    }

    public function validateUser(Request $request){
        $details = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // should regenerate session if authentication is successful

        if(Auth::attempt($details)){
            $request->session()->regenerate();
            if(Auth::user()->role != 'admin'){
                return redirect()->route('homepage.index')->with('message', 'Login Successful !!');

            }else{
                return redirect()->route('dashboard.index')->with('message', 'Login Successful !!');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    public function signout(){

        Auth::logout();

        return redirect('/');
    }

}
