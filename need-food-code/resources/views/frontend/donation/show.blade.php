@extends('frontend.layout')
@section('title', $pagename='Donation Detail')
@section('content')
    <div class="container-xxl py-4 page-header bg-dark mb-5">
        <div class="container pb-4 my-5 pt-5">
            <h1 class="display-4 text-white mb-3">{{$pagename}}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">{{$pagename}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-xxl py-3">
        <div class="container">

            <div class="row align-items-center">
                <div class="col-lg-7 col-md-12 mb-lg-0 mb-5">
                    <div class="card border-0">
                        <img src="{{asset($donationDetail->images[0]->image_path ?? 'uploads/place.svg')}}" class="img-fluid" alt="Donated Item Image">
                    </div>
                </div>
                <div class="col-lg-5 secondary-text col-md-12 accept-field">
                    <h2>Donation Available For {{$donationDetail->donationItem->name}}.</h2>
                    <hr>
                    <div class="row mt-3 mb-3">
                        <div class="col-6">
                            <h5>Quantity: {{$donationDetail->donationItem->quantity.' '.$donationDetail->donationItem->unit}}</h5>
                        </div>
                        <div class="col-6"><h5>Address: {{$donationDetail->address}}</h5></div>
                        <div class="col-6"><h5>Status: <span class="{{$donationDetail->status}}-status">{{$donationDetail->status}}</span></h5></div>
                    </div>

                    <p>{{$donationDetail->description}} </p>
                    @can('frontend.accept-donation.store')
                    <button class="main-btn mt-4 initial-accept-btn" value="{{$donationDetail->id}}">Accept</button>
                    @endcan
                </div>

                <div class="col-lg-12 col-md-12 mt-2">
{{--                    <h2>Other images</h2>--}}
                    @if(count($donationDetail->images) > 1)
                        @foreach($donationDetail->images as $key => $image)

                            @if($key > 0)
                            <a href="{{url(asset($image->image_path))}}">
                                <img src="{{asset($image->image_path) }}" style="width:100px; height:100px;" class="me-4 border" alt="Donation Img">
                            </a>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>



@endsection

@section('script')
    <script>
        $('.initial-accept-btn').click(function (){
            let donationID = $(this).val();
           let acceptForm =  '<form action="{{route('frontend.accept-donation.store')}}" method="POST">'+
                                '<div class="row clearfix">'+

                                   '@csrf'+'<label><h5>Enter your address<span class="required-details">*</span> </h5></label>'+
                                    '<div class="col-md-12 mb-3">'+
                                        '<input type="hidden" name="donation_id" value="'+donationID+'">'+
                                        '<input type="text" id="donation-field" name="address" class="form-control" value="">'+
                                        '@error('category_id')'+
                                           '<small class="text-danger">{{$message}}</small>'+
                                        '@enderror'+
                                    '</div>'+
                                    '<div class="col-lg-12 col-md-12 col-sm-12 ">'+

                                        '<div class="form-group">'+
                                            '<button class="main-btn mt-4">Accept</button>'+
                                        '</div>'+

                                    '</div>'+
                                '</div>'+
                            '</form>';

            $(this).remove();

            $('.accept-field').append(acceptForm);



        });
    </script>

@endsection
