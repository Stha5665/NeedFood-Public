<?php

namespace App\Http\Controllers\Frontend\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Request\MakeDonationFormRequest;
use App\Http\Requests\Frontend\Request\DonationRequestFormRequest;
use App\Models\Request as DonationRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    private $loggedInUser;

        public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->loggedInUser = Auth::user()->id ?? '';


            return $next($request);
        });
    }


    public function index(){
        $data['categories'] = Category::get(['id', 'name']);

        if((request()->input('category_id') == '') && (request()->input('search_by') == '')){

//            To show request of other user
            $data['donationRequests'] = DonationRequest::with('items')
                ->where('user_id', '!=', $this->loggedInUser )
                ->where('status' , '=', 'open')
                ->where('is_archived', 'NO')
                ->orderBy('created_at', 'desc')->paginate(6);
        }else{

            if(request()->input('category_id') != ''){
                $data['donationRequests'] = DonationRequest::where('category_id', request()->input('category_id'))
                                ->where('user_id', '!=', $this->loggedInUser )
                                ->where('status' , '=', 'open')
                                ->where('is_archived', 'NO')
                                ->with('items')
                                ->orderBy('created_at', 'desc')->paginate(6);

            }
            if(request()->input('search_by')){
                $data['donationRequests'] = DonationRequest::where('user_id', '!=', $this->loggedInUser )
                    ->where('status' , '=', 'open')
                    ->whereHas('items' , function ($query){
                        $query->where('name', 'LIKE',  '%'.request()->input('search_by').'%');
                    })
                    ->orWhere('address','LIKE',  '%'.request()->input('search_by').'%')




                    ->with('items')
                    ->orderBy('created_at', 'desc')->paginate(6);
            }


        }
            $data['loggedInUser'] = $this->loggedInUser;

        return view('frontend.requests.index', $data);
    }


    public function create()
    {
        $fetchedData['categories'] = Category::get(['id', 'name']);
        return view('frontend.requests.create', $fetchedData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DonationRequestFormRequest $request)
    {
        // this variable gets valid data only from request
        $validDetailsOnly = $request->validated();

//        try statement for storing details
        try{
            $storeRequest = DonationRequest::create([
                'address' => $validDetailsOnly['address'],
                'description' => $validDetailsOnly['description'],
                'remarks' => $validDetailsOnly['remarks'],
                'status' => 'open',
                'type' => 'requested',
                'user_id' => $this->loggedInUser,
                'category_id' => $validDetailsOnly['category_id'],

            ]);

            $storeItem = Item::create([
                'name' => $validDetailsOnly['name'],
                'description' => $validDetailsOnly['description'],
                'quantity' => $validDetailsOnly['quantity'],
                'remaining_quantity' => $validDetailsOnly['quantity'],
                'unit' => $validDetailsOnly['unit'],
                'type' => 'requested',
                'status' => 'open',
                'request_id' => $storeRequest->id,
                'is_expiry_date_needed' => $validDetailsOnly['is_expiry_date_needed'],
            ]);

        }catch (\Exception $exception){
            // if exception occured return to route
            return redirect()->route('frontend.requests.index')->withErrors( $exception->getMessage());

        }
        //  return to route
        return redirect()->route('frontend.requests.index')->with('message', 'New Request successfully created!! ');
    }
//    This page shows the details of the request and donation form
    public function show(string $id){
        $requestDetails = DonationRequest::findOrFail($id);
        $data = [
            'itemName' => $requestDetails->items->name,
            'itemQuantity' => $requestDetails->items->remaining_quantity ?? $requestDetails->items->quantity,
            'itemUnit' => $requestDetails->items->unit,
            'address' => $requestDetails->address,
            'requestID' => $requestDetails->id,
            'userName' => $requestDetails->user->first_name.' '.$requestDetails->user->middle_name.' '.$requestDetails->user->last_name,
            'description' => $requestDetails->description,
        ];
//        if($this->loggedInUser != $requestDetails->user_id ){
//            $data['showAddButton'] = 'yes';
//        }
//        else{
//            $data['showAddButton'] = 'no';
//        }


        return view('frontend.requests.show', $data);
    }

    public function storeDonation(MakeDonationFormRequest $makeDonation){
        {
            // get valid data only
            $validData = $makeDonation->validated();

            try{
                $requestData = DonationRequest::with('donations')->findOrFail($validData['request_id']);

                $requestData->donations()->create([
                    'address' => $validData['address'],
                    'description' => $validData['description'],
                    'quantity' => $validData['quantity'],
                    'donated_date_time' => $validData['donated_date_time'],
                    'type' => 'donation_to_request',
                    'delivery_type' => $validData['delivery_type'],
                    'status' => 'unverified',
                    'expiry_date' => $validData['expiry_date'],

                    'user_id' => $this->loggedInUser,
                    'request_id' => $validData['request_id'],
                ]);

            }catch (\Exception $exception){
                // if excepation occured return to route
                return redirect()->route('frontend.requests.index')->withErrors( $exception->getMessage());
            }

            //  return to route
            return redirect()->route('frontend.requests.index')->with('message', 'Successfully added your donation');

        }

    }

}
