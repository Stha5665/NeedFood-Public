@extends('layouts.admin')
@section('title', 'Update-User')
@section('page', $pagename='Update User')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="page-title">{{$pagename}}</h3>
        </div>
        <div class="card-body">
            <form action="{{route('users.update', $userDetail->id)}}" method="POST" class="mt-3">
                @method('PUT')
                <div class="row clearfix">
                    @csrf
                    <div class="col-md-4 col-sm-12 mb-3">
                        <div class="form-group">
                            <label><h5>First Name<span class="required-details">*</span></h5></label>
                            <input type="text" class="form-control" name="first_name" value="{{$userDetail->first_name}}" placeholder="Enter First Name*" required>
                            @error('first_name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 mb-3">
                        <label><h5>Middle Name</h5></label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="middle_name" value="{{$userDetail->middle_name ?? ''}}" placeholder="Middle Name *">
                            @error('middle_name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label><h5>Last Name<span class="required-details">*</span></h5></label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="last_name" value="{{$userDetail->last_name}}" placeholder="Last Name *"  required>
                            @error('last_name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label><h5>Email<span class="required-details">*</span></h5></label>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" value="{{$userDetail->email}}"   placeholder="Your Email ID *" required>
                            @error('email')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-8 col-sm-12 mb-3">
                        <label><h5>Select Role<span class="required-details">*</span></h5></label>
                        <div class="form-group">
                            <select class="form-control show-tick" name="role">
                                @foreach ($rolesNames as $roleName)
                                    <option value="{{$roleName->name}}" {{$userDetail->roles[0]->name == $roleName->name ? 'selected':''}}> {{$roleName->name}}</option>

                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label><h5>Phone Number<span class="required-details">*</span></h5></label>
                        <input type="text" placeholder="Phone Number*" id="phone_number"  value="{{$userDetail->phone_number}}" class="form-control"
                               name="phone_number" autofocus>
                        @error('phone_number')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-4 col-sm-12 mb-3">
                        <label><h5>Password</h5></label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="password" placeholder="Enter Password*">
                            @error('password')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 mb-3">
                        <label><h5>Confirm Password</h5></label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                            @error('password_confirmation')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-8 mb-3">
                        <label><h5>Status<span class="required-details">*</span></h5></label>
                        <div class="form-group">
                            <select class="form-control show-tick" name="status">
                                <option value="active" {{$userDetail->status == 'active' ? 'selected':''}}>Active</option>
                                <option value="close" {{$userDetail->status == 'close' ? 'selected':''}}>Close</option>
                            </select>
                            @error('status')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm">Update User</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection


