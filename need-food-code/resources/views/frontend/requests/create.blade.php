@extends('frontend.layout')
@section('title', $pagename='Add Request')
@section('content')
    <div class="container-xxl py-4 page-header bg-dark mb-5">
        <div class="container pb-4 my-5 pt-5">
            <h1 class="display-3 text-white mb-3">{{$pagename}}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Request</li>
                    <li class="breadcrumb-item text-white active" aria-current="page">{{$pagename}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Requests Start -->
    <div class="container-xxl py-3">
        <div class="container">

            <div class="row mb-2">

                <div class="card">
                    <div class="card-header">
                        <h3 class="page-title">{{$pagename}}</h3>

                    </div>
                    <div class="card-body">
                        <form action="{{route('frontend.requests.store')}}" method="POST">
                            <div class="row clearfix">
                                @csrf
                                <div class="col-md-12 col-sm-12 mb-3">
                                    <div class="form-group">
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

            </div>




        </div>
    </div>

    <!-- Requests End -->
    @include('frontend.include.footer')


@endsection
