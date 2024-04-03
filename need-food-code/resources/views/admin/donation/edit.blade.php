@extends('layouts.admin')
@section('title', 'Edit-Donation')
@section('page', $pagename='Edit Donation')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="page-title">{{$pagename}}</h3>

        </div>
        <div class="card-body">
            <form action="{{route('donations.update', $donationDetail->id)}}" method="POST" enctype="multipart/form-data">
                <div class="row clearfix">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12 col-sm-12 mb-3">
                        <div class="form-group">
                            <label><h5>Item Name<span class="required-details">*</span></h5></label>
                            <input type="text" class="form-control" placeholder="Item name*" name="name" value="{{$donationDetail->donationItem->name}}" required>

                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-3">
                        <div class="form-group">
                            <label><h5>Quantity<span class="required-details">*</span> </h5></label>
                            <input type="number" class="form-control" placeholder="Quantity*" name="quantity" value="{{$donationDetail->donationItem->quantity}}" required >

                            @error('quantity')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-3">
                        <div class="form-group">
                            <label><h5>Unit Name<span class="required-details">*</span></h5></label>
                            <input type="text" class="form-control" placeholder="Like kg, litre*" name="unit" value="{{$donationDetail->donationItem->unit}}" required >

                            @error('quantity')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 mb-3">
                        <div class="form-group">
                            <label><h5>Address <span class="required-details">*</span> </h5></label>
                            <input type="text" class="form-control" placeholder="Address*" name="address" value="{{$donationDetail->address}}" required />

                            @error('address')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div>
                            <label><h5>Select Category<span class="required-details">*</span> </h5></label>
                            <select name="category_id" class="form-control" required>
                                <option value="">--Select Category--</option>

                                @foreach($categories as $key => $category)
                                    <option value="{{$category->id}}" {{$donationDetail->category_id == $category->id ? 'selected':''}}> {{$category->name}}</option>

                                @endforeach
                            </select>

                            @error('category_id')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 mb-3 ">
                        <div class="form-group expiry-field">
                            <label><h5>Expiry Date Required <span class="required-details">?</span> </h5></label>
                            <h5>Yes <input type="radio" name="is_expiry_date_needed" value="yes" {{$donationDetail->donationItem->expiry_date != NULL ? 'checked':''}} />
                                No <input type="radio" name="is_expiry_date_needed" value="no" {{$donationDetail->donationItem->expiry_date == NULL ? 'checked':''}} />
                            </h5>
                            @error('is_expiry_date_needed')
                            <small class="text-danger">{{$message}}</small>
                            @enderror

                            @if($donationDetail->donationItem->expiry_date)
                                <div class="form-group expiry-date">
                                    <label><h5>Expiry Date: <span class="required-details">*</span> </h5></label>
                                    <input type="date" class="form-control" name="expiry_date" value="{{$donationDetail->donationItem->expiry_date}}" />
                                    @error('expiry_date')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="col-md-6 mb-3">
                        <div>
                            <label><h5>Select Delivery Type<span class="required-details">*</span> </h5></label>
                            <select name="delivery_type" class="form-control" required>
                                <option value="">--Select Delivery--</option>
                                <option value="collection" {{$donationDetail->delivery_type == 'collection' ? 'selected':''}}> {{'Collection'}}</option>
                                <option value="delivery" {{$donationDetail->delivery_type == 'delivery' ? 'selected':''}}> {{'Self Delivery'}}</option>

                            </select>

                            @error('delivery_type')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-10 col-sm-10 mb-3">
                        <div class="form-group">
                            <label><h5>Delievery DateTime: <span class="required-details">*</span> </h5></label>
                            <input type="datetime-local" class="form-control" name="donated_date_time" value="{{$donationDetail->donated_date_time}}" />

                            @error('donated_date_time')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 mb-3">
                        <div class="form-group">
                            <label><h5>Upload Food Image</h5></label>
                            <input type="file" name="image[]" class="form-control" multiple/>
                            @error('image.*')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 mt-2">
                            @foreach($donationDetail->images as $key => $image)
                                    <a href="{{url(asset($image->image_path))}}">
                                        <img src="{{asset($image->image_path) }}" style="width:100px; height:100px;" class="me-4 mb-3 border" alt="Donation Img">
                                    </a>
                            @endforeach
                    </div>

                    <div class="col-md-6 col-sm-12 mb-3">
                        <div class="form-group">
                            <label><h5>Status<span class="required-details">*</span> </h5></label>
                            <select class="form-control" name="status">
                                <option value="unverified" {{$donationDetail->status == 'unverified' ? 'selected':''}}>Unverified</option>
                                <option value="verified" {{$donationDetail->status == 'verified' ? 'selected':''}}>Verified</option>
                                <option value="close" {{$donationDetail->status == 'close' ? 'selected':''}}>Close</option>
                            </select>
                            @error('status')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12 col-sm-12 mb-3">
                        <div class="form-group">
                            <label><h5>Description<span class="required-details">*</span> </h5></label>
                            <textarea class="form-control" name="description" rows="5" required>{{$donationDetail->description}}</textarea>

                            @error('description')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 mb-3">
                        <div class="form-group">
                            <label><h5>Remarks<span class="required-details">*</span> </h5></label>
                            <textarea class="form-control" name="remarks" rows="5" required>{{$donationDetail->remarks}}</textarea>

                            @error('remarks')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 ">

                        <div class="form-group">
                            <button class="btn btn-sm btn-primary">Edit</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(function(){
            let expiryDate = '<div class="form-group expiry-date">'+
                '<label><h5>Expiry Date: <span class="required-details">*</span> </h5></label>'+
                '<input type="date" class="form-control" name="expiry_date" value="{{old('expiry_date')}}" />'+
                '@error('expiry_date')'+
                '<small class="text-danger">{{$message}}</small>'+
                '@enderror'+
                '</div>';

            $('input[name=is_expiry_date_needed]').change(function(){
                let radioValue = $(this).val();

                if(radioValue == 'yes'){
                    $('.expiry-field').append(expiryDate);
                }else{
                    $('.expiry-field').find('.expiry-date').remove();
                }
            });
        });
    </script>

@endsection








