@extends('layouts.admin')
@section('title', 'Collaborations-page')
@section('page', $page = 'Collaboration')
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
                                <th scope="col">Organization Name</th>
                                <th scope="col">Organization Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Collaboration With</th>
                                <th scope="col">Collaborator Email</th>
                                <th scope="col">Collaborator Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Item</th>
                                <th scope="col">Item Description</th>
                                <th scope="col">Expiry Date Required</th>
                                <th scope="col">Collaboration Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Status</th>

                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($collaborationLists as $key => $collaborationList)


                                <tr>
                                    <th scope="row">{{ $key + 1}}</th>
                                    <td>{{$collaborationList['full_name']}}</td>
                                    <td>{{$collaborationList['email']}}</td>
                                    <td>{{$collaborationList['phone_number']}}</td>
                                    <td>{{$collaborationList['collaborator_name']}}</td>
                                    <td>{{$collaborationList['collaborator_email']}}</td>
                                    <td>{{$collaborationList['collaborator_phone_number']}}</td>
                                    <td>{{$collaborationList['address']}}</td>
                                    <td>{{$collaborationList['item']}}</td>
                                    <td>{{$collaborationList['description']}}</td>
                                    <td>{{$collaborationList['expiry_date']}}</td>
                                    <td>{{$collaborationList['start_date']}}</td>
                                    <td>{{$collaborationList['end_date']}}</td>
                                    <td>{{$collaborationList['status']}}</td>

                                    <td>
                                        <div class="d-flex">
                                            @can('accept-collaboration.update')
                                                @if($collaborationList['status'] == 'under-approval' && $collaborationList['collaborator_id'] == $collaborationList['logged_user_id'])
                                                <a class="btn btn-sm btn-outline-success me-1" href="{{route('accept-collaboration.update', ['requestID' => $collaborationList['request_id'], 'status' =>'accepted'])}}" >Accept</a>
                                                <a class="btn btn-sm btn-outline-danger " href="{{route('accept-collaboration.update', ['requestID' => $collaborationList['request_id'], 'status' =>'rejected'])}}" >Reject</a>
                                                @endif
                                            @endcan

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th scope="row" colspan="11">No Collaboration Request Found</th>
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
