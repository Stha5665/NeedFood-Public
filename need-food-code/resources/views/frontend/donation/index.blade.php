
@extends('frontend.layout')
@section('title', $pagename='Donations Page')
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
    <div class="container-xxl bg-white py-5 donation-card">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-content text-center">
                        <h2>Donations For Needy People</h2>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore ipsum error ipsam sequi, dolor natus pariatur temporibus enim officiis porro quas excepturi hic libero sunt modi doloribus saepe reiciendis mollitia!</p>
                    </div>
                </div>
            </div>
            <div class="row pt-5">
                @foreach($donationsLists as $key => $donationList)

                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="card">

                        <img src="{{asset($donationList->images[0]->image_path ?? 'uploads/place.svg')}}" class="img-fluid">
                        <div class="pt-3 donation-small-card">
                            <h4>{{$donationList->donationItem->name ?? ''}}</h4>
                            <p>Uploaded: {{$donationList->created_at->format('Y-m-d')}} | Serves: {{$donationList->donationItem->quantity ?? ''}} {{$donationList->donationItem->unit ?? ''}}</p>
                            <p>Address {{$donationList->address}}</p>
                            </span>
                            <a href="{{route('frontend.donations.show', $donationList->id)}}" class="mt-4 main-btn">View</a>
                        </div>
                    </div>
                </div>
                @endforeach

                {{$donationsLists->links()}}
            </div>
        </div>
    </div>
    @include('frontend.include.footer')
@endsection
