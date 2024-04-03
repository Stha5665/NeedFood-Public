@extends('layouts.admin')
@section('title', 'Organization-Page')
@section('page', $page='Organizations')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>{{$page}}</h3>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-vcenter text-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th >Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Member Since</th>
                                <th>Total Donations</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <!-- this loop will list the users of organization -->
                            @forelse ($usersDetail as $key => $userDetail)
<!--  for listing user -->
<!--  show this -->
                                <tr>
                                    <!-- the indes -->
                                    <td>{{$key+1}}</td>
                                    <!-- the name of the user -->
                                    <td><span class="tag tag-danger">{{$userDetail['name']}}</span></td>
                                    <!--  email of the user -->
                                    <td>{{$userDetail['email']}}</td>
                                    <!--  phone number -->
                                    <td>{{$userDetail['phone_number']}}</td>
                                    <!-- created at -->
                                    <td>{{$userDetail['created_at']}}</td>
                                    <!-- totaldonation -->
                                    <td>{{$userDetail['total_donations']}}</td>
                                    <!-- staus -->
                                    <td>{{$userDetail['status']}}</td>


                                    <td >
                                        <div class="d-flex">
                                            @if($userDetail['id'] != auth()->user()->id)

                                            @can('make-collaboration.create')
                                                <a class="btn btn-sm btn-outline-success" href="{{route('make-collaboration.create', $userDetail['id'])}}" title="Collaborate">Collaborate</a>
                                            @endcan
                                            @endif

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="8">No records found</td>
                            @endforelse

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
