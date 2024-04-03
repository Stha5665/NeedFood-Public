@extends('frontend.layout')
@section('title', 'Homepage')
@section('content')
    <div class="container-xxl bg-dark py-5 page-header mb-5">
        <div class="container pb-4 my-5 pt-5">
            <h1 class="display-3 text-white mb-3">Request List</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Request List</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Requests Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">List of Request</h1>

            <div class="container bg-white py-5 mb-5">

                <div class="row text-center">
                    <h3 class="mb-3">Filter Either By: </h3>
                    <form action="{{route('frontend.requests.index')}}" method="GET">

                        <div class="d-flex">
                            <select name="category_id" class="form-control mx-2">

                                <option value="">--Select Category--</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>

                            <input type="text" class="form-control mx-2" placeholder="Search by item name or address" name="search_by" value="">

                            <button type="submit" class="main-btn request-list-btn mx-2">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            @forelse($donationRequests as $request)
            <div class="request-item p-4 mb-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                        <div class="text-start ps-4">
                            <h5 class="mb-3">{{$request->items['name']}}</h5>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$request->address}}</span>
                            <span class="text-truncate me-3"><i class="far fa-scale text-primary me-2"></i>Quantity: {{$request->items['quantity'].' '.$request->items['unit']}}</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                        <div class="d-flex mb-3">
                            <a href="{{route('frontend.requests.show', $request->id)}}" class="main-btn request-list-btn">View
                            </a>
                        </div>
                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Requested Date : {{$request->created_at}}</small>
                    </div>
                </div>
            </div>
            @empty
                    <h4>No Request Found</h4>
            @endforelse


                {{$donationRequests->links()}}


        </div>
    </div>

    <!-- Requests End -->
    @include('frontend.include.footer')
@endsection
