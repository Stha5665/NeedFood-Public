@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page', 'Dashboard')
@section('content')
    <div class="row">


        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">Requests  <span>| Total</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-basket"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$totalRequests}}</h6>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">


                <div class="card-body">
                    <h5 class="card-title">Donation <span>| This Year</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-heart"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$totalDonations}}</h6>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xxl-4 col-xl-12">

            <div class="card info-card ">


                <div class="card-body">
                    <h5 class="card-title">Users</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <h6>Hello <span class="text-success">{{Auth::user()->first_name}}</span></h6>
                            <span class="text-danger small pt-1 fw-bold">Total User | {{$totalUsers}}</span>

                        </div>
                    </div>

                </div>
            </div>

        </div><!-- End Customers Card -->
    </div>

@endsection
