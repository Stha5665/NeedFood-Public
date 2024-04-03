<?php

namespace App\Http\Controllers\Frontend\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Request as DonationRequest;
use PhpParser\Builder;

class YourRequestController extends Controller
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

        $data['yourRequests'] = DonationRequest::with('items')->where('user_id', \auth()->user()->id)->paginate();

        return view('frontend.requests.your_requests', $data);

    }

    public function show(string $request_id){
        $requestDetails = DonationRequest::findOrFail($request_id);
        $data = [
            'itemName' => $requestDetails->items->name,
            'itemQuantity' => $requestDetails->items->remaining_quantity,
            'itemUnit' => $requestDetails->items->unit,
            'address' => $requestDetails->address,
            'requestedDate' => $requestDetails->created_at,
            'description' => $requestDetails->description,
            'yourRemarks' => $requestDetails->remarks,
            'status' => $requestDetails->status
        ];
        return view('frontend.requests.your_requests_show', $data);
    }
}
