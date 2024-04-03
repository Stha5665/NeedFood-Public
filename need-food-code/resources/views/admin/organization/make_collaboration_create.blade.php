@extends('layouts.admin')
@section('title', 'Make Collaboration')
@section('page', $pagename='Add Collaboration')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="page-title">{{$pagename}}</h3>

        </div>
        <div class="card-body">
            <form action="{{route('store-collaboration.store')}}" method="POST" class="mt-3">
                <div class="row clearfix">
                    @csrf
                    <div class="col-md-12 col-sm-12 mb-3">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="collaborator_id" value="{{$organizationID}}" required>

                            <label><h5>Item required<span class="required-details">*</span></h5></label>
                            <input type="text" class="form-control" placeholder="Item name*" name="name" value="{{old('name')}}" required>

                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-3">
                        <div class="form-group">
                            <label><h5>Quantity<span class="required-details">*</span> </h5></label>
                            <input type="number" class="form-control" placeholder="Quantity*" name="quantity" value="{{old('quantity')}}" required >

                            @error('quantity')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-3">
                        <div class="form-group">
                            <label><h5>Unit Name<span class="required-details">*</span></h5></label>
                            <input type="text" class="form-control" placeholder="Like kg, litre*" name="unit" value="{{old('unit')}}" required >

                            @error('quantity')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 mb-3">
                        <div class="form-group">
                            <label><h5>Address <span class="required-details">*</span> </h5></label>
                            <input type="text" class="form-control" placeholder="Address*" name="address" value="{{old('address')}}" required />

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
                                    <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected':''}}> {{$category->name}}</option>

                                @endforeach
                            </select>

                            @error('category_id')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                         <div class="form-group">
                            <label><h5>Collaboration Start Date: <span class="required-details">*</span> </h5></label>
                            <input type="date" class="form-control" name="start_date" placeholder="today or greater than today" value="{{old('start_date')}}"/>
                            @error('start_date')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">

                        <div class="form-group ">
                            <label><h5>End Date: <span class="required-details">*</span> </h5></label>
                            <input type="date" class="form-control" name="end_date" value="{{old('end_date')}}" />
                            @error('end_date')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 mb-3">
                        <div class="form-group">
                            <label><h5>Expiry Date Required <span class="required-details">?</span> </h5></label>
                            <h5>Yes <input type="radio" name="is_expiry_date_needed" value="yes" {{old('is_expiry_date_needed') == 'yes' ? 'checked':''}} />
                                No <input type="radio" name="is_expiry_date_needed" value="no" {{old('is_expiry_date_needed') == 'no' ? 'checked':''}} />
                            </h5>
                            @error('is_expiry_date_needed')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
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
                    <div class="col-md-12 col-sm-12 mb-3">
                        <div class="form-group">
                            <label><h5>Remarks<span class="required-details">*</span> </h5></label>
                            <textarea class="form-control" name="remarks" rows="5" required>{{old('remarks')}}</textarea>

                            @error('remarks')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 ">

                        <div class="form-group">
                            <button class="btn btn-sm btn-primary">Add</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection








