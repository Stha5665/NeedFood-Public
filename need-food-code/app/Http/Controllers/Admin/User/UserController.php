<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\User;
use App\Models\Request as DonationRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\User\AddNewUserFormRequest;

class UserController extends Controller
{
    public function index(){
        $data['usersDetails'] = User::get();

        return view('admin.user.index', $data);
    }
    public function create(){
        $data['rolesNames'] = Role::get();
        return view('admin.user.create', $data);
    }

    public function store(AddNewUserFormRequest $requestDetails){
        $validDetailsOnly = $requestDetails->except('_token', 'role');

        try{
            $newUser = User::create($validDetailsOnly);

            $newUser->assignRole($requestDetails->only('role'));

        }catch (\Exception $exception){
            // if exception occured return to route
            return redirect()->route('users.create')->withErrors( $exception->getMessage());

        }

        //  return to route
        return redirect()->route('users.index')->with('message', 'Successfully Registered!! ');
    }

    public function show(string $userID){
        $data['userDetail'] = User::findOrFail($userID);

        return view('admin.user.show', $data);
    }
    public function edit(string $userID){
        $data['userDetail'] = User::findOrFail($userID);
        $data['rolesNames'] = Role::get();
        return view('admin.user.edit', $data);

    }

    public function update(User $userObj, AddNewUserFormRequest $requestDetail){
        if($requestDetail['password'] === null){
            $validDetailsOnly = $requestDetail->except('_token', '_method', 'role', 'password', 'password_confirmation');
        }else{
            $validDetailsOnly = $requestDetail->except('_token', '_method', 'role', 'password_confirmation');
        }
        try{
            $userObj->update($validDetailsOnly);

//            Deleting previous role of the user
            DB::table('model_has_roles')->where('model_id',$userObj->id)->delete();

            $userObj->assignRole($requestDetail['role']);

        }catch (\Exception $exception){
            // if exception occured return to route
            return redirect()->route('users.index')->withErrors( $exception->getMessage());

        }

        //  return to route
        return redirect()->route('users.index')->with('message', 'Successfully Updated!! ');

    }
//Deleting the user
    public function destroy(string $userID)
    {
        $userDetail = User::findOrFail($userID);
        $userDetail->delete();

        return redirect()->route('users.index')->with('message', 'User Successfully Deleted!!');

    }

    public function totalDonationsIndex(string $user_id){
        $userDetail['donationLists'] = Donation::where('user_id', $user_id)->with( 'user', 'donationItem', 'images')->get();
        return view('admin.donation.index', $userDetail);
    }

    public function totalRequestsIndex(string $user_id){
        $userDetail['donationRequests'] = DonationRequest::where('user_id', $user_id)->with('items', 'user')->paginate(8);
        return view('admin.request.index', $userDetail);
    }
}
