
@extends('frontend.layout')
@section('title', $pagename='About Us')
@section('content')

    <div class="container-xxl bg-dark py-5 page-header">
        <div class="container pb-4 my-5 pt-5">
            <h1 class="display-3 text-white mb-3">{{$pagename}}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">{{$pagename}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-xxl bg-white py-0 donation-card">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center wrap-content">
                        <h2>Connect Donors Through Internet</h2>
                        <p>Make Food for everyone by simple donation that can be possible with single click. Share as much as food to food banks and charities.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-us-story py-2" style=" background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),url({{asset('frontend/img/background/back-ground.png')}}); background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wrap-content">
                        <h3>Let's share the need and connect to each donor and defeat the hunger.</h3>
                        <p>NeedFood aims to eliminate the hunger with every donation that can change life and society toward healthy lifestyle. Our main goal is to provide food for every one and reduce the food waste in our environment.</p>

                        <button class="main-btn mt-3">Read More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.include.footer')

@endsection

