@extends('layouts.admin')
@section('title', 'Donors-page')
@section('page', $page = 'Donors')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>{{$page}}</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-vcenter text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Donor Name</th>
                                <th scope="col">Donor Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Address</th>
                                <th scope="col">Quantity Donated</th>
                                <th scope="col">Delivery Type</th>
                                <th scope="col">Delivery Date Time</th>
                                <th scope="col">Donated Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($donorsDetailsLists as $key => $donorsDetailsList)


                                <tr>
                                    <th scope="row">{{ $key + 1}}</th>
                                    <td>{{$donorsDetailsList->user->getUserFullName()}}</td>
                                    <td>{{$donorsDetailsList->user->email}}</td>
                                    <td>{{$donorsDetailsList->user->phone_number}}</td>
                                    <td>{{$donorsDetailsList->address}}</td>
                                    <td>{{$donorsDetailsList->quantity}}</td>
                                    <td>{{$donorsDetailsList->delivery_type}}</td>
                                    <td>{{$donorsDetailsList->donated_date_time}}</td>
                                    <td>{{$donorsDetailsList->created_at}}</td>

                                </tr>
                            @empty
                                <tr>
                                    <th scope="row" colspan="8">No Donors Found</th>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
