<?php

namespace App\Http\Controllers\Frontend\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
//    For showing landing page
    public function index(){
        return view('frontend.homepage.index');
    }
}
