<?php

namespace App\Http\Controllers\Frontend\Donation;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YourDonationController extends Controller
{
    private $loggedInUser;
    public function __construct()
    {
//        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->loggedInUser = Auth::user()->id ?? '';


            return $next($request);
        });
    }

//    function to show all the request made by that user

    public function index(){

        $data['yourDonations'] = Donation::with('donationItem')->where('user_id', $this->loggedInUser)->paginate(6);



        return view('frontend.donation.your_donation_index', $data);

    }

}
