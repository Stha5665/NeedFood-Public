<?php

namespace App\Http\Controllers\Frontend\Donation;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Donation;
use App\Models\Item;
use App\Models\RecieverDetail;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\Donation\DonationFormRequest;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
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
//        $data['donationsLists'] = Donation::with('images', 'donationItem')->paginate(6);
        $data['donationsLists'] = Donation::with('images', 'donationItem')
            ->where('type', 'donation')
            ->where('status', 'verified')
            ->where('is_archived', 'NO')
            ->where('user_id', '!=', $this->loggedInUser)
            ->paginate(8);
        return view('frontend.donation.index', $data);
    }

    public function create(){
        $data['categories'] = Category::get();
        return view('frontend.donation.create', $data);
    }

    public function store(DonationFormRequest $validDetailsOnly){
        try {
            $newDonation = Donation::create([
                'address' => $validDetailsOnly['address'],
                'description' => $validDetailsOnly['description'],
                'remarks' => $validDetailsOnly['remarks'],
                'status' => 'unverified',
                'type' => 'donation',
                'delivery_type' => $validDetailsOnly['delivery_type'],
                'donated_date_time' => $validDetailsOnly['donated_date_time'],
                'user_id' => $this->loggedInUser,
                'category_id' => $validDetailsOnly['category_id'],
                'expiry_date' => $validDetailsOnly['expiry_date'] ?? null,

            ]);

            $storeItem = Item::create([
                'name' => $validDetailsOnly['name'],
                'description' => $validDetailsOnly['description'],
                'quantity' => $validDetailsOnly['quantity'],
                'unit' => $validDetailsOnly['unit'],
                'type' => 'donated',
                'status' => 'open',
                'donation_id' => $newDonation->id,
                'expiry_date' => $validDetailsOnly['expiry_date'] ?? null,

            ]);

            if ($validDetailsOnly->hasFile('image')) {
                $uploadPath = 'uploads/donations/';

                $counterVar = 1;

                foreach ($validDetailsOnly->file('image') as $singleImageFile) {
                    $imageExtension = $singleImageFile->getClientOriginalExtension();
                    $imageName = time() . $counterVar++ . '.' . $imageExtension;
                    $singleImageFile->move($uploadPath, $imageName);

                    $finalImagePathName = $uploadPath . $imageName;

                    $newDonation->images()->create([
                        'image_path' => $finalImagePathName,
                        'donation_id' => $newDonation->id,
                    ]);
                }
            }
        }catch (\Exception $exception){
                // if exception occured return to route
            return redirect()->route('frontend.donations.index')->withErrors( $exception->getMessage());

        }
            //  return to route
        return redirect()->route('frontend.donations.index')->with('message', 'New Donation successfully created!! ');
    }

    public function show(string $donationID){
        $data['donationDetail'] = Donation::with('images', 'donationItem')->findOrFail($donationID);

        return view('frontend.donation.show', $data);
    }

    public function acceptDonation(Request $requestInput){
        try {

            $validDetail = $requestInput->validate([
                'address' => 'required',
                'donation_id' => 'required',
            ]);

            $donationDetails = Donation::findOrFail($validDetail['donation_id']);

            $donationDetails->update([
                'status' => 'close',
            ]);

            $donationDetails->recieverDetail()->create([
                'address' => $validDetail['address'],
                'donation_id' => $donationDetails->id,
                'receiver_id' => $this->loggedInUser,
            ]);

        }catch (\Exception $exception){
            // if exception occured return to route
        return redirect()->route('frontend.donations.index')->withErrors( $exception->getMessage());

        }
        //  return to route
        return redirect()->route('frontend.donations.index')->with('message', 'You have successfully accepted a donation!! ');
    }

}
