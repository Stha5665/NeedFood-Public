@extends('layouts.admin')
@section('title', 'Users-Page')
@section('page', 'Users')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>User List</h3>
                    @can('users.create')
                    <a href="{{ route('users.create') }}" class="btn btn-outline-success btn-sm "><span>Add User</span></a>
                    @endcan
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
                                <th>Created Date</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($usersDetails as $key => $userDetail)


                                <tr>

                                    <td>{{++$key}}</td>
                                    <td><span class="tag tag-danger">{{$userDetail->first_name.' '}}{{$userDetail->middle_name ?? ''}}{{' '.$userDetail->last_name}}</span></td>
                                    <td>{{$userDetail->email}}</td>
                                    <td>{{$userDetail->phone_number}}</td>
                                    <td>{{$userDetail->created_at}}</td>
                                    <td>{{$userDetail->status}}</td>
                                    <td>{{$userDetail->roles[0]->name ?? 'Normal User'}}</td>


                                    <td >
                                        <div class="d-flex">


                                            @can('users-total-donations.index')
                                            <a class="btn btn-sm btn-outline-primary" href="{{route('users-total-donations.index', $userDetail->id)}}" title="Show Donation">Donations</a>
                                            @endcan
                                            @can('users-total-requests.index')
                                            <a class="btn btn-sm btn-outline-primary" href="{{route('users-total-requests.index', $userDetail->id)}}" title="Show Requests">Requests</a>
                                            @endcan
                                                @can('users.edit')
                                            <a class="btn btn-sm btn-outline-primary" href="{{route('users.edit', $userDetail->id)}}" title="Edit"><i class="bi bi-pen"></i></a>
                                            @endcan
                                            @can('users.destroy')
                                            <form action="{{ route('users.destroy', $userDetail->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are you sure, you want to delete this user?')" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                            </form>
                                                @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
