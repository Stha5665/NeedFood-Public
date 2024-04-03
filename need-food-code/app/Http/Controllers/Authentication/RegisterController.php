<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
//   For showing register page

    public function create()
    {
        return view('authentication.register.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterFormRequest $request)
    {
        $validDetailsOnly = $request->validated();

        try{
            $newUser = User::create($validDetailsOnly);
            $newUser->assignRole('user');
        }catch (\Exception $exception){
        // if exception occured return to route
            return redirect()->back()->withErrors( $exception->getMessage());

        }
        //  return to route
        return redirect()->route('homepage.index')->with('message', 'Successfully Registered!! ');}

    }
