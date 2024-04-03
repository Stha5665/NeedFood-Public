@extends('layouts.admin')
@section('title', 'Receiver-page')
@section('page', $page = 'Receiver')
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
                                <th scope="col">Receiver Name</th>
                                <th scope="col">Receiver Email</th>
                                <th scope="col">Receiver Number</th>
                                <th scope="col">Address</th>
                                <th scope="col">Received Date</th>
                            </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    <td>{{$receiverDetails['full_name']}}</td>
                                    <td>{{$receiverDetails['email']}}</td>
                                    <td>{{$receiverDetails['phone']}}</td>
                                    <td>{{$receiverDetails['address']}}</td>
                                    <td>{{$receiverDetails['recieved_at']}}</td>

                                </tr>


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
