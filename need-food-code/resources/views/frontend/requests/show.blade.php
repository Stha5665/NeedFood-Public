@extends('frontend.layout')
@section('title', 'Request page')
@section('content')
    <div class="container-xxl bg-dark py-5 page-header mb-5">
        <div class="container pb-4 my-5 pt-5">
            <h1 class="display-3 text-white mb-3">Request List</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Request</li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Detail</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Requests Start -->
    <div class="container-xxl py-5">
        <div class="container">

            <div class="row mb-2">

                <div class="card">
                    <div class="card-header">
                        <h2>Request Detail</h2>
                    </div>
                    <div class="card-body">
                        <label><h4><span style="color: rgb(41, 189, 36); font-weight: 600;">Requested By: {{$userName}}</span></h4></label>
                        <h4>Address: {{$address}}</h4>
                        <p>{!! $description !!}</p>

                        <div class="col-md-12 col-sm-12 mb-3">
                            <div class="form-group">
                                <label><h5>Item required</h5></label>
                                <input type="text" class="form-control" placeholder="Item name*" value="{{$itemName. ' - '.$itemQuantity.' '.$itemUnit}}" readonly>
                            </div>
                        </div>
                       </p>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="card">
                    <div class="card-header">
                        <h3>Make Donation</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('frontend.make-donation.store')}}" method="POST">
                            <div class="row clearfix">
                                @csrf
                                <div class="col-md-12 col-sm-12 mb-3 mt-2">
                                    <div class="form-group">
                                        <input type="hidden" name="request_id" value="{{$requestID}}" required >

                                    </div>
                                </div>



                                <div class="col-md-12 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label><h5>Address <span class="required-details">*</span> </h5></label>
                                        <input type="text" class="form-control" placeholder="Enter Your Address*" name="address" value="{{old('address')}}" required />

                                        @error('address')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-6 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label><h5>Quantity In {{$itemUnit}}<span class="required-details">*</span> </h5></label>
                                        <input type="number" class="form-control" placeholder="Enter Quantity*" name="quantity" value="{{old('quantity')}}" min="1" max="{{$itemQuantity}}" required >

                                        @error('quantity')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div>
                                        <label><h5>Select Delivery Type<span class="required-details">*</span> </h5></label>
                                        <select name="delivery_type" class="form-control" required>
                                            <option value="">--Select Delivery--</option>
                                            <option value="collection" {{old('delivery_type') == 'collection' ? 'selected':''}}> {{'Collection'}}</option>
                                            <option value="delivery" {{old('delivery_type') == 'delivery' ? 'selected':''}}> {{'Self Delivery'}}</option>

                                        </select>

                                        @error('delivery_type')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-10 col-sm-10 mb-3">
                                    <div class="form-group">
                                        <label><h5>Delievery DateTime: <span class="required-details">*</span> </h5></label>
                                        <input type="datetime-local" class="form-control" name="donated_date_time" value="{{old('donated_date_time')}}" />

                                        @error('donated_date_time')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-10 col-sm-10 mb-3">
                                    <div class="form-group">
                                        <label><h5>Expiry Date: <span class="required-details">*</span> </h5></label>
                                        <input type="date" class="form-control" name="expiry_date" value="{{old('expiry_date')}}" />

                                        @error('expiry_date')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                </div>

                                <div class="col-md-12 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label><h5>Description<span class="required-details">*</span> </h5></label>
                                        <textarea class="form-control" name="description" rows="5" required>{{old('description')}}</textarea>

                                        @error('description')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>


                            @auth()
                                <div class="col-lg-12 col-md-12 col-sm-12 ">
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-primary">Add</button>
                                    </div>
                                </div>
                            @endauth

                        </form>
                    </div>
                </div>

            </div>


        </div>
    </div>

    <!-- Requests End -->
    @include('frontend.include.footer')


@endsection
