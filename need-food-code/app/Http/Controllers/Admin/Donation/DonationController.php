<?php

namespace App\Http\Controllers\Admin\Donation;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Donation\DonationFormRequest;
use App\Mail\NotifyUserMail;
use App\Models\Category;
use App\Models\Donation;
use App\Models\DonationImage;
use App\Models\Item;
use App\Models\Notification;
use App\Models\RecieverDetail;
use App\Models\User;
use App\Models\Request as DonationRequest;
use App\Notifications\NotifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

//  This for controlling donation by admin
class DonationController extends Controller
{
    // store the details of the logged in user
    private $loggedInUser;
//  this is the controller
// __construct()
    public function __construct()
    {
        // this checks whether the user is logged in or not
        //  check  middleware
        $this->middleware(function ($request, $next) {
            //  this gets the current logged in user id
            $this->loggedInUser = Auth::user()->id ?? '';

//  if logged in return request
            return $next($request);
        });
    }
//  for sending mail
    private function sendMailNotificationToUser($notificationDetail)
    {
        //  this functions find the user of that id and the 
        //  message for the user is created and stored
        //  after that it is send to mail testing environment 
        //  mailtrap.io
        $userDetail = User::findOrFail($notificationDetail['user_id']);
//  get thetitle and set message
// 
        $notifications['title'] = "Hey {$userDetail->first_name}, Your donation has been {$notificationDetail['title']}";
        //  set description
        $notifications['description'] = "With respect, " .$notificationDetail['description'];
        //  set staus of donation
        $notifications['status'] = $notificationDetail['title'];
//  if the donation is verified
        if($notifications['status'] == 'verified'){
            //  check the delivery type and 
            $notifications['delivery_type'] = $notificationDetail['delivery_type'];
            //  delivery date of item
            //   
            $notifications['delivery_date'] =  $notificationDetail['donated_date_time'];
        }
//  Create and stores the message given to user
        Notification::create([
            'title' => $notifications['title'],
            'description' => $notifications['description'],
            'sent_user_id' => Auth::user()->id,
            'recieved_user_id' => $notificationDetail['user_id'],
        ]);
//  this code is used to send mail to the user

//        Mail::to($userDetail->email)->send(new NotifyUserMail($notifications));
    }

  
//  This is the function used for searching the item
//  or donation
    private function searchByGetData(string $is_archived){
//  if user do not have made search reques
//  this query will be loaded
        if(request()->input('search_by') == ''){
            //  this will store all the donation from this query
            $data['donationLists'] = Donation::with( 'user', 'donationItem', 'images')
                ->where('type', '=','donation')
                ->where('is_archived', $is_archived)->get();
//  if successfull execution
        }else{
//  else condition
//  for listing donation according to search functionality
            $data['donationLists'] = Donation::whereHas('donationItem', function ($query){
                //  return the query or the donation having item name
                $query->where('name', 'LIKE',  '%'.request()->input('search_by').'%');
            })
            //  return the other models
                ->with( 'user', 'donationItem', 'images')
                //  which are archived or not
                ->where('is_archived', $is_archived)
                //  for getting the address of donation
                ->orWhere('address','LIKE',  '%'.request()->input('search_by').'%')
                ->where('type', '=','donation')
                ->get();

        }
//  return the list of donation
        return $data;
    }
//  this index function is used to display the list of donation
    public function index()
    {
//  this calls the search function to fetch the data
        $data = $this->searchByGetData('NO');
//  returning view for donation
        return view('admin.donation.index', $data);
    }
//  create function
    public function create(){
        //  get the category id and name
        $data['categories'] = Category::get(['id', 'name']);
        //  return the category htm;l
        return view('admin.donation.create', $data);
    }

//    
//  This store /" function performs the storage of donation
    public function store(DonationFormRequest $validDetailsOnly){
        //  this try condition will be execute initially
        try {
            //  the new donation will be created with the respective 
        //  fields obtained by the validation of donation
            $newDonation = Donation::create([
                'address' => $validDetailsOnly['address'],
                'description' => $validDetailsOnly['description'],
                'remarks' => $validDetailsOnly['remarks'],
                'status' => 'verified',
                'type' => 'donation',
                'delivery_type' => $validDetailsOnly['delivery_type'],
                'donated_date_time' => $validDetailsOnly['donated_date_time'],
                'user_id' => $this->loggedInUser,
                'category_id' => $validDetailsOnly['category_id'],
                'expiry_date' => $validDetailsOnly['expiry_date'] ?? NULL,
            ]);
            // 
            //  This stores the /" item of the donation
//  store the item obtained from the validation
//  this create function will create and return the object of newly 
//  created item
            $storeItem = Item::create([
                'name' => $validDetailsOnly['name'],
                'description' => $validDetailsOnly['description'],
                'quantity' => $validDetailsOnly['quantity'],
                'unit' => $validDetailsOnly['unit'],
                'type' => 'donated',
                'status' => 'open',
                'donation_id' => $newDonation->id,
                'expiry_date' => $validDetailsOnly['expiry_date'] ?? NULL,

            ]);
            //  initially the item donation is open and when the
            //  receiver will accept the donation the donation will be closed.

            //  This condition checks whether there is  images or not
            if ($validDetailsOnly->hasFile('image')) {
                //  if there is the images
                //  this path will be used
                $uploadPath = 'uploads/donations/';
//  this counter will count or give new id to each image
                $counterVar = 1;
//  each image form the request are checked
//  Check the image available
                foreach ($validDetailsOnly->file('image') as $singleImageFile) {
                    //  it will get the image extension
                    //  check for the time 
                    $imageExtension = $singleImageFile->getClientOriginalExtension();
                    //  new image name by time will be created
                    $imageName = time() . $counterVar++ . '.' . $imageExtension;
                    //  this move function will move the image to path.
                    $singleImageFile->move($uploadPath, $imageName);
//  upload the image to path
                    $finalImagePathName = $uploadPath . $imageName;
//  get the image path and store in the images table
//  of every donation
                    $newDonation->images()->create([
                        'image_path' => $finalImagePathName,
                        'donation_id' => $newDonation->id,
                    ]);
                    //  ends
                }
            }
        }catch (\Exception $exception){
            // if exception occured return to route
            return redirect()->route('donations.index')->withErrors( $exception->getMessage());

        }
        //  return to route or donation page
        return redirect()->route('donations.index')->with('message', 'New Donation successfully created!! ');
    }

    // this function will return the edit form for the donation
    //  return
    public function edit(string $donationID)
    {
//  The donation with images are return
       $data['donationDetail'] = Donation::with('donationItem', 'images')->findOrFail($donationID);
    //     get all category
       $data['categories'] = Category::get(['id', 'name']);
    //     return the view
       return view('admin.donation.edit', $data);

    }

//  This is the "update function used for updating the donation
    public function update(DonationFormRequest $validDetailsOnly, string $donationID)
    {
        //  try statement
        try {
            //  this block will simply finds the donation that you want to update and updated the respective fields
            //  with the new item updated
            $donationDetail = Donation::with('donationItem')->findOrFail($donationID);
            //  update() is used to update the donation
            $donationDetail->update([
                'address' => $validDetailsOnly['address'],
                'description' => $validDetailsOnly['description'],
                'remarks' => $validDetailsOnly['remarks'],
                'status' => $validDetailsOnly['status'],
                'delivery_type' => $validDetailsOnly['delivery_type'],
                'donated_date_time' => $validDetailsOnly['donated_date_time'],
                'category_id' => $validDetailsOnly['category_id'] ,
                'expiry_date' => $validDetailsOnly['expiry_date'] ?? NULL,

            ]);
//  update the item of the donation 
//  it will update the input given from user
            $donationDetail->donationItem->update([
                'name' => $validDetailsOnly['name'],
                'description' => $validDetailsOnly['description'],
                'quantity' => $validDetailsOnly['quantity'],
                'unit' => $validDetailsOnly['unit'],
                'status' => $validDetailsOnly['status'] == 'close' ? 'close': 'open',
                'expiry_date' => $validDetailsOnly['expiry_date'] ?? NULL,

            ]);
//  it will checks for the image
            if ($validDetailsOnly->hasFile('image')) {
                //  if the previous image is found in the respective path 
                //  it will be deleted
                $uploadPath = 'uploads/donations/';

                $counterVar = 1;
//  this will delete previous image
                $this->destroyImages($donationDetail->id);
//  This block of code for storing the image in location
//  it will get the time of storing and 
//  update the new image
                foreach ($validDetailsOnly->file('image') as $singleImageFile) {
                    //  gets extension of image
                    $imageExtension = $singleImageFile->getClientOriginalExtension();
                    //  time for the storing
                    $imageName = time() . $counterVar++ . '.' . $imageExtension;
                    //  it will move to the storage location
                    $singleImageFile->move($uploadPath, $imageName);
//  create new path
                    $finalImagePathName = $uploadPath . $imageName;
//  store the new image
                    $donationDetail->images()->create([
                        'image_path' => $finalImagePathName,
                        'donation_id' => $donationDetail->id,
                    ]);
                }
            }
        }catch (\Exception $exception){
            // if exception occured return to route
            return redirect()->route('donations.index')->withErrors( $exception->getMessage());

        }
        //  return to route
        return redirect()->route('donations.index')->with('message', 'Donation successfully updated!! ');
    }

    //  destroy function will delete the donation
    // delete doantion
    public function destroy(string $donationID)
    {

        try {
            //  this try block will find the doantiona
            //  and all the child of the donation will be deleted along with this donation
            $donationDetail = Donation::findOrFail($donationID);
//  this will delete the images
            $this->destroyImages($donationDetail->id);
//  this will delete the reciever detail
            $donationDetail->recieverDetail()->delete();
            //  delete the donation item
            $donationDetail->donationItem()->delete();
//  delete the donation detail
            $donationDetail->delete();

        }catch (\Exception $exception){
            // if exception occured return to route
            return redirect()->route('donations.index')->withErrors( $exception->getMessage());

        }
        //  return to route
        return redirect()->route('donations.index')->with('message', 'Donation successfully deleted!! ');

    }
// /" This function will list the approve donation
    public function unverifiedDonationIndex()
    {
// 
//        returns the page for donation that are unapproved.
//  get the donations that are not verified
        $unverifiedDonations = Donation::with( 'user', 'donationItem', 'images')
            ->where('status', 'unverified')
            ->where('type', '=','donation')->get();
//      dd($unverifiedDonations);
        $data['donationLists'] = [];
//  it will make the array for the
        foreach ($unverifiedDonations as $key => $unverifiedDonation) {
//  shoiwing the list of the donation
//  the array will be passed to the frontend to display relative item
            $data['donationLists'][$key] = [
                'id' => $unverifiedDonation->id,
                'donor_name' => $unverifiedDonation->user['first_name'],
                'address' => $unverifiedDonation->address,
                'item' => $unverifiedDonation->donationItem['name']. ' '.$unverifiedDonation->donationItem['quantity'].$unverifiedDonation->donationItem['unit'],
                'expiry_date' => $unverifiedDonation->expiry_date ?? 'not applicable',
                'delivery_type' => $unverifiedDonation->delivery_type == 'delivery' ? 'Self-Delivery':'Collection',
                'delivery_date' => $unverifiedDonation->donated_date_time,
                'description' => $unverifiedDonation->description,
                'images' => $unverifiedDonation->images
            ];


        }
//  return view for the approve donation page
        return view('admin.donation.approve_donation_index', $data);
// 
    }
//  this will update the verification status for the donation
    public function editVerificationStatus(Request $inputDetails){
        //  the donation you want to update will be validated
        $validDetails = $inputDetails->validate([
            'status' => 'required|string',
            'remarks' => 'required|string',
            'donation_id' => 'required'
        ]);
//  after validation
        try {
            //  the donation will be fetched
            $donationDetail = Donation::with('user')->findOrFail($validDetails['donation_id']);
//  update the donation with the status
            $donationDetail->update([
                'status' => $validDetails['status'],

            ]);
//  this will send to mail to the user via custom function
//  send mail
            $this->sendMailNotificationToUser([
                'user_id' => $donationDetail->user_id,
                'title' => $donationDetail->status,
                'description' => $validDetails['remarks'],
                'delivery_type' => $donationDetail->delivery_type,
                'donated_date_time' => $donationDetail->donated_date_time,
            ]);
//  redirect route if success
            return redirect()->route('approve-donations.index')->with('message', 'Donation '.$validDetails['status']);
// 
        }catch (\Exception $exception){
            //  catch block
            //  redirect this route
            return redirect()->route('approve-donations.index')->withErrors( $exception->getMessage());
        }

    }

    //  this is used to destroy all the image having that doantion iid
    private function destroyImages(string $donationID){
        //  this find the donation
       $donationDetail = Donation::findOrFail($donationID);
//  checks for the images
       if ($donationDetail->images){
        //  and the all image existing will be deleted.
           foreach ($donationDetail->images as $imageDetail){
            //  check for file
               if(File::exists($imageDetail->image_path)){
                //  delete file
                   FILe::delete($imageDetail->image_path);
//  delete image from database
                   $imageDetail->delete();
               }

           }

       }
    }
//  " This for the listing the receiver of the donation
//  all the receiver will be fetced
    public function donationReceiverIndex(string $donationID){
//  the receiver for the specific donation will be fetched
        $receiverDetail = Donation::with('recieverDetail')->findOrFail($donationID);
//  find the user by the receiver id
        $recieverUser = User::findOrFail($receiverDetail->recieverDetail->receiver_id);
//  the data to show about receiver are prepared
// 
        $data['receiverDetails'] = [
            'full_name' => $recieverUser->getUserFullName(),
            'email' => $recieverUser->email,
            'phone' => $recieverUser->phone_number,
            'address' => $receiverDetail->recieverDetail->address,
            'recieved_at' => $receiverDetail->recieverDetail->created_at,
        ];
//  return receiver details
        return view('admin.donation.reciever_index', $data);
    }

    public function archiveDonationIndex(){
        //  this function will list all the data which have been archived
        $data = $this->searchByGetData('YES');
        //  return the data
        return view('admin.donation.archive_donation_index', $data);
    }


//  this function is used to archive the donation
    public function archiveDonation(string $donationID){
//  find all the donation 
//  which are archived
        Donation::FindOrFail($donationID)->update([
            'is_archived' => 'YES'
        ]);
//  return route to donation
        return redirect()->route('donations.index')->with('message', 'Successfully Archived the donation');
    }
    //  this function is used to unarchive the donation
    public function unArchiveDonation(string $donationID){
        //  this will find all the doantion and will set to not archived status
        Donation::FindOrFail($donationID)->update([
            'is_archived' => 'NO'
        ]);
//  return the route
        return redirect()->route('donations-archive.index')->with('message', 'Successfully UnArchived the donation');
    }
}
//  code for controller ends here