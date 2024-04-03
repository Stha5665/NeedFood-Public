<?php

namespace App\Http\Controllers\Admin\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Request\DonationRequestFormRequest;
use App\Models\Category;
use App\Models\Donation;
use App\Models\Item;
use App\Models\Request as DonationRequest;
use Couchbase\QueryException;
use Illuminate\Http\Request;

//  This is request controller
class RequestController extends Controller
{
//  this is the code for handling donation request

//  here are different functions
    private function getTotalDonationsOfItem($request_id){
        //  this get the donation filter by this query
        //  this will count the verified donation.
        $totalDonation = Donation::where('request_id', $request_id)
            ->where('status', '=', 'verified')
            ->sum('quantity');
//  return the total donations
        return $totalDonation;
    }
//  for searching 
    private function searchByGetData(string $is_archived){
//  this is the function used for searching
        if(request()->input('search_by') == ''){
            //  if no search made
            //  fetch all the request details
            //  which are not archived
            $fetchedData['donationRequests'] = DonationRequest::where('type', 'requested')

                ->where('is_archived', $is_archived)
                ->with('items', 'user')
                ->paginate(8);
                //  paginate will help in pagination
        }else{
            //  for getting the request
            //  matching with the search input
            //  if the request matches with item name or the address 
            //  it will return that request.
            $fetchedData['donationRequests'] = DonationRequest::whereHas('items' , function ($query){
                $query->where('name', 'LIKE',  '%'.request()->input('search_by').'%');
            })
                ->where('type', 'requested')
                ->where('is_archived', $is_archived)
                ->orWhere('address','LIKE',  '%'.request()->input('search_by').'%')
                ->with('items', 'user')
                ->paginate(8);

                //  return the requests that are not archived.
        }

        //  return
        return $fetchedData;
    }
    //  for viewing all request by admin
    public function index()
    {
        //  fetch the input data
        //  use custom function
        $fetchedData = $this->searchByGetData('NO');


        return view('admin.request.index', $fetchedData);
    }

//    this function" returns the
//  add form 
    public function create()
    {
        //  get all categories id and name
        $fetchedData['categories'] = Category::get(['id', 'name']);
        //  return the created request
        return view('admin.request.create', $fetchedData);
        //  in this page
    }

    // store function is used to 
    //  store the request
    public function store(DonationRequestFormRequest $request)
    {

        // this variable gets valid data only from request
        $validDetailsOnly = $request->validated();

//        try statement for storing details
        try{
            //  it will store the data to the corresponding fields in the table
            // 
            $storeRequest = DonationRequest::create([
                'address' => $validDetailsOnly['address'],
                'description' => $validDetailsOnly['description'],
                'remarks' => $validDetailsOnly['remarks'],
                'status' => 'open',
                'type' => 'requested',
                'user_id' => auth()->user()->id,
                'category_id' => $validDetailsOnly['category_id'],
            ]);
            //  for storing the item details of that request
            //  stores in item table

            $storeItem = Item::create([
                'name' => $validDetailsOnly['name'],
                'description' => $validDetailsOnly['description'],
                'quantity' => $validDetailsOnly['quantity'],
                'unit' => $validDetailsOnly['unit'],
                'remaining_quantity' => $validDetailsOnly['quantity'],
                'type' => 'requested',
                'status' => 'open',
                'request_id' => $storeRequest->id,
                'is_expiry_date_needed' => $validDetailsOnly['is_expiry_date_needed'],
            ]);

//  catch exception
        }catch (\Exception $exception){
            // if exception occured return to route
            return redirect()->route('requests.index')->withErrors( $exception->getMessage());

        }
        //  return to route
        return redirect()->route('requests.index')->with('message', 'New Request successfully created!! ');
    }

    //  this edit will return the edit page for requests
    public function edit(string $requestID)
    {
        // find the request object from db
        try{
            // try statement
            //  get all item related to request 
            $fetchData['request'] = DonationRequest::with('items')->findOrFail($requestID);
            //  get category details
            $fetchData['categories'] = Category::get(['id', 'name']);

        }catch (\Exception $exception){
            // return exception
            return redirect()->route('requests.index')->withErrors( $exception->getMessage());
        }
        // return page with the requests
        return view("admin.request.edit", $fetchData);
    }

//   update function will update 
//  the request detail
    public function update(DonationRequestFormRequest $editRequest, string $requestID)
    {
        // this variable gets valid data only from request
        $validDetailsOnly = $editRequest->validated();

// 
//        try statement for storing details
        try{
//  this will edit the request value
//  the corresponding field value are get from the validated request.
            $donationRequest = DonationRequest::with('items')->findOrFail($requestID);
            $storeRequest = $donationRequest->update([
                'address' => $validDetailsOnly['address'],
                'description' => $validDetailsOnly['description'],
                'remarks' => $validDetailsOnly['remarks'],
                'status' => $validDetailsOnly['status'],
                'category_id' => $validDetailsOnly['category_id'],

            ]);

            //  the items are updated after the successul update of request
            //  store item
            // "
            $storeItem = $donationRequest->items()->update([
                'name' => $validDetailsOnly['name'],
                'description' => $validDetailsOnly['description'],
                'quantity' => $validDetailsOnly['quantity'],
                'remaining_quantity' => $validDetailsOnly['quantity'] - $this->getTotalDonationsOfItem($donationRequest->id),
                'unit' => $validDetailsOnly['unit'],
                'type' => 'requested',
                'status' => $validDetailsOnly['status'],
                'is_expiry_date_needed' => $validDetailsOnly['is_expiry_date_needed'],
            ]);

            // "
        }catch (\Exception $exception){
            // if exception occured return to route
            return redirect()->route('requests.index')->withErrors( $exception->getMessage());

        }
        //  return to route
        return redirect()->route('requests.index')->with('message', 'Request successfully updated!! ');

    }

//    this destroy function
//  it is used to delete the data
    public function destroy(string $requestID)
    {
        try{
            // find category object and delete it
//  get request of that id
            $donationRequest = DonationRequest::with('items', 'donations')->findOrFail($requestID);
//  and if the donation requests has donation then
//  find that donation and delete that donation
            if(count($donationRequest->donations)>0){

                foreach ($donationRequest->donations as $donation){
                    $donation->delete();
                }

            }
//  
//  this will delete the item details of the donation
            $donationRequest->items()->delete();
            //  then delete the request detail
            $donationRequest->delete();
            // defining route
            return redirect()->route('requests.index')->with('message', 'Requests successfully Deleted!! ');

        }catch (\Exception $exception){
            // throw or catch exception
            return redirect()->route('requests.index')->withErrors( $exception->getMessage());
        }
    }

    public function unverifiedDonationIndex()
    {
//  this will list 
//        returns the page for donation that are unapproved.
        $unverifiedDonations = Donation::with('request', 'user', 'items')
            ->where('status', 'unverified')
            ->where('type', 'donation_to_request')->get();
//      dd($unverifiedDonations);
        $data['donationLists'] = [];

        //  the new array of required details are created
        //  to display in the frontend.
        foreach ($unverifiedDonations as $key => $unverifiedDonation) {
//  create donation lists
            $data['donationLists'][$key] = [
                'id' => $unverifiedDonation->id,
                'donor_name' => $unverifiedDonation->user['first_name'],
                'address' => $unverifiedDonation->address,
                'item' => $unverifiedDonation->items->items['name']. ' '.$unverifiedDonation->items->items['quantity'].$unverifiedDonation->items->items['unit'],
                'quantity' => $unverifiedDonation->quantity,
                'remaining_quantity' => $unverifiedDonation->items->items['remaining_quantity'],
                'expiry_date' => $unverifiedDonation->expiry_date ?? 'not applicable',
                'delivery_type' => $unverifiedDonation->delivery_type == 'delivery' ? 'Self-Delivery':'Collection',
                'delivery_date' => $unverifiedDonation->donated_date_time,
                'description' => $unverifiedDonation->description,
            ];
        }
//  return the view of approve donation
        return view('admin.request.approve_donation_index', $data);

    }
//  this will verify or reject donation
//  made to that request"
    public function editVerificationStatus(Request $inputDetails)
    {
        //  validate the response from the form
        $validDetails = $inputDetails->validate([
            'status' => 'required|string',
            'remarks' => 'required|string',
            'donation_id' => 'required'
        ]);
//  try blocl
        try {
            // find the donation
            // "
            $donationDetail = Donation::findOrFail($validDetails['donation_id']);
//  update
            $donationDetail->update([
                'remarks' => $validDetails['remarks'],
                'status' => $validDetails['status'],
            ]);

//            updating remaining quantity column in item table after successfull verification

            if ($donationDetail->status == 'verified') {
                // if the donation is verified
                $itemDetail = Item::where('request_id', '=', $donationDetail->request_id)->first(['id', 'quantity', 'remaining_quantity', 'status']);

//                getting the total donation of the particular request
//                adding the data to remaining quantity field

//  the remaining quantity is updated
                $remaining_quantity = $itemDetail->quantity - $this->getTotalDonationsOfItem($donationDetail->request_id);
//  if there is no remaining quantity
//  the status will be closed
                if ($remaining_quantity <= 0) {
                    $itemDetail->status = 'closed';
//                    dd($itemDetail)
                    DonationRequest::findOrFail($donationDetail->request_id)->update(['status' => 'closed']);
                }

//  this will update the status and remaining quantity of item
                $itemDetail->update([
                    'remaining_quantity' => $remaining_quantity,
                    'status' => $itemDetail->status]);
            }
//  redirce
            return redirect()->route('unverified-donations.index')->with('message', 'Donation ' . $validDetails['status']);

        } catch (\Exception $exception) {
            return redirect()->route('requests.index')->withErrors($exception->getMessage());
        }
    }
//        For viewing donors of the request
    public function donorIndex(string $requestID){
//  this will view the donors for the request

        $data['donorsDetailsLists'] = Donation::with('user')->where('request_id', $requestID)->get();
        //  return the view
        return view('admin.request.donors_index', $data);
    }

    //  this will provide archived requests
    public function archiveRequestIndex(){
        //  if archived 
        $data = $this->searchByGetData('YES');
        //  return
        return view('admin.request.archive_request_index', $data);

    }

    //  archive request
    public function archiveRequest(string $requestID){
//  fetch all archiived requests
        DonationRequest::FindOrFail($requestID)->update([
            'is_archived' => 'YES'
        ]);
//  return route
// 
        return redirect()->route('requests.index')->with('message', 'Successfully Archived the request');
    }
    // 
//  get the unarchive page
//  and unarchive the archive requests
    public function unArchiveRequest(string $requestID){
        //  find requests
        DonationRequest::FindOrFail($requestID)->update([
            'is_archived' => 'NO'
        ]);
//  return to this route
        return redirect()->route('requests-archive.index')->with('message', 'Successfully UnArchived the request');
    }
}
