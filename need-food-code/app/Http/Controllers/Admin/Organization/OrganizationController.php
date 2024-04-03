<?php

namespace App\Http\Controllers\Admin\Organization;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Request\DonationRequestFormRequest;
use App\Models\Category;
use App\Models\Collaboration;
use App\Models\Donation;
use App\Models\Item;
use App\Models\Request as DonationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


//  the contoller class for the organizations
class OrganizationController extends Controller
{

    // this function is used
    private function totalDonation($user_id){
        //  this will count the total donations
        //  if the donation for the user is available
       $totalDonation = Donation::where('user_id', $user_id)->count();
       return $totalDonation;
    }
//  get the collaborationdetail
//  of the user id
    private function getCollaboratorDetail(string $user_id){
        //  this will find user by id
        $userDetail = User::findOrFail($user_id)->only(['id','email', 'phone_number']);
        //  the full name is returned of the user
        $userDetail['full_name'] = User::find($user_id)->getUserFullName();

        return $userDetail;
    }
    //  for returning organization page
    public function index(){
// this is the
//  for geting role fo the user
       $usersDetails = Role::with('users')
            ->where('name', 'organization')
            ->get();
            //  fetching user having role as organization

            //  if users are available
       if($usersDetails[0]->users ?? NULL){
        // create this array list to display in the frontend
           foreach ($usersDetails[0]->users as $key => $userDetail) {
            //  for each is used to store
               $data['usersDetail'][$key]['id'] = $userDetail->id;
            //    for name
               $data['usersDetail'][$key]['name'] = $userDetail->first_name . ' ' . $userDetail->middle_name ?? '' . ' ' . $userDetail->last_name;
            //    for email
               $data['usersDetail'][$key]['email'] = $userDetail->email;
            //    foe phone
               $data['usersDetail'][$key]['phone_number'] = $userDetail->phone_number;
            //    users 
               $data['usersDetail'][$key]['created_at'] = $userDetail->created_at;
            //    for showing the total donation
               $data['usersDetail'][$key]['total_donations'] = $this->totalDonation($userDetail->id);
            //    status
               $data['usersDetail'][$key]['status'] = $userDetail->status;
           }
       }else{
        //  if not found empty array will be return
           $data['usersDetail'] = [];
       }
//  for sharing this page
        return view('admin.organization.index', $data);
    }
//  this will help to add collaboratuin
// make collaboration
    public function makeCollaboration(string $organizationID){
//  this will fetch the category
        $fetchedData['categories'] = Category::get(['id', 'name']);
        //  getorganization details
        $fetchedData['organizationID'] = $organizationID;
        // return the add collaboration page
        return view('admin.organization.make_collaboration_create', $fetchedData);

    }

    //  this function is called
    public function storeCollaboration(DonationRequestFormRequest $requestDetail){

            // this variable gets valid data only from request
            $validDetailsOnly = $requestDetail->validated();
//        try statement for storing details
            try{
                //  for storing the donation request or collaboration
                $storeRequest = DonationRequest::create([
                    //  this will create the donation request having the respective field in table
                    'address' => $validDetailsOnly['address'],
                    'description' => $validDetailsOnly['description'],
                    'remarks' => $validDetailsOnly['remarks'],
                    'type' => 'collaboration',
                    'status' => 'under-approval',
                    'user_id' => auth()->user()->id,
                    'category_id' => $validDetailsOnly['category_id'],
                ]);
//  after creating request 
//  the item will be created 
//  by use of previously created requests
                Item::create([
                    'name' => $validDetailsOnly['name'],
                    'description' => $validDetailsOnly['description'],
                    'quantity' => $validDetailsOnly['quantity'],
                    'unit' => $validDetailsOnly['unit'],
                    'remaining_quantity' => $validDetailsOnly['quantity'],
                    'type' => 'requested',
                    'status' => 'under-approval',
                    'request_id' => $storeRequest->id,
                    'is_expiry_date_needed' => $validDetailsOnly['is_expiry_date_needed'],
                ]);

                //  the all details for validation are validated and the
                //  new collaboration is added
                //  the collaborations are in under approval at initial phase
                Collaboration::create([
                    'user_id' => auth()->user()->id,
                    'request_id' => $storeRequest->id,
                    'collaborator_id' => $validDetailsOnly['collaborator_id'],
                    'start_date' => $validDetailsOnly['start_date'],
                    'end_date' => $validDetailsOnly['end_date'],
                    'status' => 'under-approval',

                ]);
// return
            }catch (\Exception $exception){
                // if exception occured return to route
                return redirect()->route('organizations.index')->withErrors( $exception->getMessage());

            }
            //  return to route
            return redirect()->route('organizations.index')->with('message', 'Collaboration created with under-approval process!! ');
    }

//  this will list all the collaboration detailsl
    public function collaborationIndex(){
        //  the collaboration details are found
        $collaborationsDetails = Collaboration::with('request', 'user')->get();
//  create array to pass in the frontend
        $data['collaborationLists'] = [];
//  get all the collaborations details
        foreach ($collaborationsDetails as $key => $collaborationsDetail){
//   this will create the array having this key
//  to see in the frontedn/"
            $collaboratorDetail = $this->getCollaboratorDetail($collaborationsDetail->collaborator_id);
            $data['collaborationLists'][$key] = [
                'request_id' => $collaborationsDetail->request->id,
                'full_name' => $collaborationsDetail->user->first_name.' '.$collaborationsDetail->user->middle_name ?? ''.' '.$collaborationsDetail->user->last_name,
                'email' => $collaborationsDetail->user->email,
                'phone_number' => $collaborationsDetail->user->phone_number,
                'address' => $collaborationsDetail->request->address,
                'item' => $collaborationsDetail->request->items['name']. ' '.$collaborationsDetail->request->items['quantity'].$collaborationsDetail->request->items['unit'],
                'description' => $collaborationsDetail->request->description,
                'expiry_date' => $collaborationsDetail->request->items['is_expiry_date_needed'] ?? 'not applicable',
                'start_date' => $collaborationsDetail->start_date,
                'end_date' => $collaborationsDetail->end_date,
                'status' => $collaborationsDetail->status,
                'collaborator_id' => $collaborationsDetail->collaborator_id,
                'collaborator_name' => $collaboratorDetail['full_name'],
                'collaborator_email' => $collaboratorDetail['email'],
                'collaborator_phone_number' => $collaboratorDetail['phone_number'],
                'logged_user_id' => auth()->user()->id,
            ];
        }
// return this page to show collaborations
        return view('admin.organization.collaborations_index', $data);
    }
//  this will be used to accept or reject collaboration
//  thiis function
    public function acceptCollaboration(string $requestID, $status){
        //  the collaboration requests are fetched
        $requestDetail = DonationRequest::with('collaboration', 'items')->findOrFail($requestID);

        try{
//  if the status is accepted
            if($status == 'accepted'){
                //  then the item will be open
                $itemStatus = 'open';
            }else if($status == 'rejected'){
                // if rejected then the item will be closed.
                $itemStatus = 'closed';
            }
//  to update the request detail
            $requestDetail->update([
                //  update
                'status' => $status
            ]);

            //  update collaboration
            $requestDetail->collaboration->update([
                'status' => $status
            ]);
//  update item
            $requestDetail->items->update([
                'status' => $itemStatus
            ]);

// "
        }catch (\Exception $exception){
            // if exception occured return to route
            return redirect()->route('collaborations.index')->withErrors( $exception->getMessage());

        }
        //  return to route
        return redirect()->route('collaborations.index')->with('message', 'Collaboration Request '.$status);



    }
}
// ends here