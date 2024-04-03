@extends('frontend.layout')
@section('title', 'Show Request page')
@section('content')

    <!-- Requests Start -->
    <div class="container-xxl py-5">
        <div class="container">

            <div class="row mb-2">

                <div class="card">
                    <div class="card-header">
                        <h2>Request Details</h2>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 col-sm-12 mb-3">
                            <div class="form-group">
                                <label><h5>Item required</h5></label>
                                <input type="text" class="form-control" placeholder="Item name*" value="{{$itemName. ' - '.$itemQuantity.' '.$itemUnit}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label><h5>Requested Date:</h5></label>
                                <input type="text" class="form-control" value="{{$requestedDate}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <h5>Status:</h5><label class="{{$status}}-status" style="width: 100px; height: 30px;">{{$status}}</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="card">
                    <div class="card-header">
                        <h4>Request Details</h4>
                    </div>
                        <div class="card-body">
                                <div class="row clearfix">

                                    <div class="col-md-12 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label><h5>Address <span class="required-details">*</span> </h5></label>
                                            <input type="text" class="form-control" name="address" value="{{$address}}" readonly />

                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label><h5>Remarks <span class="required-details">*</span> </h5></label>
                                            <input type="text" class="form-control" name="address" value="{{$yourRemarks}}" readonly />

                                        </div>
                                    </div>



                                    <div class="col-md-12 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label><h5>Description<span class="required-details">*</span> </h5></label>
                                            <textarea class="form-control" name="description" rows="5" readonly>{{$description}}</textarea>

                                        </div>
                                    </div>
                                </div>

                        </div>

                </div>

            </div>


        </div>
    </div>

    <!-- Requests End -->
    @include('frontend.include.footer')


@endsection
