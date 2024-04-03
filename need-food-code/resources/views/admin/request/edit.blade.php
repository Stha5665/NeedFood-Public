@extends('layouts.admin')
@section('title', 'Edit-Request')
@section('page', $pagename='Edit Request')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="page-title">{{$pagename}}</h3>

        </div>
        <div class="card-body">
            <form action="{{route('requests.update', $request->id)}}" method="POST">
                <div class="row clearfix">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12 col-sm-12 mb-3">
                        <div class="form-group">
                            <label><h5>Item required<span class="required-details">*</span></h5></label>
                            <input type="text" class="form-control" placeholder="Item name*" name="name" value="{{$request->items->name}}" required>

                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-3">
                        <div class="form-group">
                            <label><h5>Quantity<span class="required-details">*</span> </h5></label>
                            <input type="number" class="form-control" placeholder="Quantity*" name="quantity" value="{{$request->items->quantity}}" required >

                            @error('quantity')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-3">
                        <div class="form-group">
                            <label><h5>Unit Name<span class="required-details">*</span></h5></label>
                            <input type="text" class="form-control" placeholder="Like kg, litre*" name="unit" value="{{$request->items->unit}}" required >

                            @error('quantity')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 mb-3">
                        <div class="form-group">
                            <label><h5>Address <span class="required-details">*</span> </h5></label>
                            <input type="text" class="form-control" placeholder="Address*" name="address" value="{{$request->address}}" required />

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
                                    <option value="{{$category->id}}" {{$request->category_id == $category->id ? 'selected':''}}> {{$category->name}}</option>

                                @endforeach
                            </select>

                            @error('category_id')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 mb-3">
                        <div class="form-group">
                            <label><h5>Expiry Date Required <span class="required-details">?</span> </h5></label>
                            <h5>Yes <input type="radio" name="is_expiry_date_needed" value="yes" {{$request->items->is_expiry_date_needed == 'yes' ? 'checked':''}} />
                                No <input type="radio" name="is_expiry_date_needed" value="no" {{$request->items->is_expiry_date_needed == 'no' ? 'checked':''}} />
                            </h5>
                            @error('is_expiry_date_needed')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12 col-sm-12 mb-3">
                        <div class="form-group">
                            <label><h5>Description<span class="required-details">*</span> </h5></label>
                            <textarea class="form-control" name="description" rows="5" required>{{$request->description}}</textarea>

                            @error('description')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 mb-3">
                        <div class="form-group">
                            <label><h5>Remarks<span class="required-details">*</span> </h5></label>
                            <textarea class="form-control" name="remarks" rows="5" required>{{$request->remarks}}</textarea>

                            @error('remarks')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <div>
                            <label><h5>Status<span class="required-details">*</span> </h5></label>
                            <select name="status" class="form-control" required>
                                    <option value="open" {{$request->status == 'open' ? 'selected':''}}> {{'Open'}}</option>
                                    <option value="close" {{$request->status == 'close' ? 'selected':''}}> {{'Close'}}</option>

                            </select>

                            @error('status')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="form-group">
                            <button class="btn btn-sm btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection








