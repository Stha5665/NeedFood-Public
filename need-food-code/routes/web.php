<?php

use App\Http\Controllers\Authentication\RegisterController;
use App\Http\Controllers\Authentication\LoginController;

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Request\RequestController;
use App\Http\Controllers\Admin\Donation\DonationController;
use App\Http\Controllers\Admin\RolePermission\RolePermissionController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Organization\OrganizationController;

use App\Http\Controllers\Frontend\Homepage\HomepageController;
use App\Http\Controllers\Frontend\AboutUs\AboutUsController;
use App\Http\Controllers\Frontend\Request\RequestController as FrontendRequestController;
use App\Http\Controllers\Frontend\Donation\DonationController as FrontendDonationController;
use App\Http\Controllers\Frontend\Donation\YourDonationController;
use App\Http\Controllers\Frontend\Request\YourRequestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//For authentication
//For register
Route::get('/register', [RegisterController::class, 'create'])->name('registers.create');
Route::post('/register', [RegisterController::class, 'store'])->name('registers.store');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::get('/logout', [LoginController::class, 'signout'])->name('login.logout');
Route::post('/login', [LoginController::class, 'validateUser'])->name('login.validate');

Route::prefix('admin')->middleware(['auth', 'accessPermission'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('categories', CategoryController::class);

    Route::get('/requests/unverified-donations/', [RequestController::class, 'unverifiedDonationIndex'])->name('unverified-donations.index');

    Route::get('/requests/archive/', [RequestController::class, 'archiveRequestIndex'])->name('requests-archive.index');
    Route::get('/requests/archive/{requestID}', [RequestController::class, 'archiveRequest'])->name('requests-archive.archive');
    Route::get('/requests/un-archive/{requestnID}', [RequestController::class, 'unArchiveRequest'])->name('requests-archive.unarchive');



    Route::resource('requests', RequestController::class);
//    This route for the verification of donation in the specific request
    Route::post('/requests/verification', [RequestController::class, 'editVerificationStatus'])->name('edit-status.update');

    Route::get('/requests/donors/{requestID}', [RequestController::class, 'donorIndex'])->name('requests-donors.index');


//    donation controller
    Route::get('/approve-donations/', [DonationController::class, 'unverifiedDonationIndex'])->name('approve-donations.index');
    Route::get('/donations/archive/', [DonationController::class, 'archiveDonationIndex'])->name('donations-archive.index');
    Route::get('/donations/archive/{donationID}', [DonationController::class, 'archiveDonation'])->name('donations-archive.archive');
    Route::get('/donations/un-archive/{donationID}', [DonationController::class, 'unArchiveDonation'])->name('donations-archive.unarchive');

    Route::resource('donations', DonationController::class);
    Route::get('/donations/receiver/{donationID}', [DonationController::class, 'donationReceiverIndex'])->name('donations-receiver.index');



//    Route::get('/donations/create/{donationRequest}', [DonationController::class, 'create'])->name('donations.create');

    Route::post('/approve-donations/verification', [DonationController::class, 'editVerificationStatus'])->name('edit-donation-status.update');



    //notification route for user
//    Route::get('/donations/notify-user', [DonationController::class, 'sendMailNotification'])->name('donations.notify');



    Route::get('/role-permissions/', [RolePermissionController::class, 'index'])->name('role-permissions.index');
    Route::get('/role-permissions/create', [RolePermissionController::class, 'create'])->name('role-permissions.create');
    Route::post('/role-permissions/', [RolePermissionController::class, 'store'])->name('role-permissions.store');
    Route::get('/role-permissions/{roleID}/edit', [RolePermissionController::class, 'edit'])->name('role-permissions.edit');
    Route::put('/role-permissions/{roleID}', [RolePermissionController::class, 'update'])->name('role-permissions.update');
    Route::delete('/role-permissions/{roleID}', [RolePermissionController::class, 'destroy'])->name('role-permissions.destroy');

//Route for managing user
    Route::get('/users/', [UserController::class, 'index'])->name('users.index');

    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/', [UserController::class, 'store'])->name('users.store');

    Route::get('/users/{userID}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{userID}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{userObj}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{userID}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/donations/{userID}', [UserController::class, 'totalDonationsIndex'])->name('users-total-donations.index');
    Route::get('/users/requests/{userID}', [UserController::class, 'totalRequestsIndex'])->name('users-total-requests.index');


//    Organization Page
    Route::get('/organizations/', [OrganizationController::class, 'index'])->name('organizations.index');
    Route::get('/organizations/collaborate/{organizationID}', [OrganizationController::class, 'makeCollaboration'])->name('make-collaboration.create');
    Route::get('/organizations/collaborations', [OrganizationController::class, 'collaborationIndex'])->name('collaborations.index');
    Route::get('/organizations/accept-collaboration/{requestID}/{status}', [OrganizationController::class, 'acceptCollaboration'])->name('accept-collaboration.update');

    Route::post('/organizations/', [OrganizationController::class, 'storeCollaboration'])->name('store-collaboration.store');

});

//Route for frontends

Route::get('/', [HomepageController::class, 'index'])->name('homepage.index');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us.index');

Route::name('frontend.')->group(function (){
    Route::get('/requests', [FrontendRequestController::class, 'index'])->name('requests.index');
    Route::get('/donations', [FrontendDonationController::class, 'index'])->name('donations.index');


    Route::middleware(['auth', 'accessPermission'] )->group(function (){
        Route::get('/requests/create', [FrontendRequestController::class, 'create'])->name('requests.create');
        Route::post('/requests', [FrontendRequestController::class, 'store'])->name('requests.store');
        Route::post('/requests/make-donation', [FrontendRequestController::class, 'storeDonation'])->name('make-donation.store');
        Route::get('/your-requests/', [YourRequestController::class, 'index'])->name('your-requests.index');
        Route::get('/your-requests/show/{request_id}', [YourRequestController::class, 'show'])->name('your-requests.show');


//        Your donation url
        Route::get('/your-donations/', [YourDonationController::class, 'index'])->name('your-donations.index');

//        Donation page
        Route::get('/donations/create', [FrontendDonationController::class, 'create'])->name('donations.create');
        Route::post('/donations', [FrontendDonationController::class, 'store'])->name('donations.store');
        Route::get('/donations/{donationID}', [FrontendDonationController::class, 'show'])->name('donations.show');
        Route::post('/donations/make-donation', [FrontendDonationController::class, 'storeDonation'])->name('make-donations.store');

//        donations page
        Route::post('/accept-donation', [FrontendDonationController::class, 'acceptDonation'])->name('accept-donation.store');

    });

    Route::get('/requests/{id}', [FrontendRequestController::class, 'show'])->name('requests.show');


//    Route for your request page

});

//Route::get('/requests', [FrontendRequestController::class, 'index'])->name('frontend-requests.index');
