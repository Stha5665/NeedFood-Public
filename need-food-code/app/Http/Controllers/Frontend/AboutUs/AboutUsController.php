<?php

namespace App\Http\Controllers\Frontend\AboutUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
   public function index(){
       return view('frontend.aboutus.index');
   }
}
