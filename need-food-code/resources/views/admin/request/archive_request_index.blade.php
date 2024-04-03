@extends('layouts.admin')
@section('title', 'Archived DonationRequest-page')
@section('page', 'Archived Donation Request')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Archived Donation Request List</h3>

                    <div class="row">
                        @can('requests.index')
                            <div class="col-md-6">
                                <form action="{{route('requests-archive.index')}}" method="GET">
                                    <div class="d-flex">
                                        <input type="text" class="form-control" placeholder="Search by item name or address" name="search_by" value="">

                                        <button type="submit" class="btn btn-sm btn-primary mx-2"><i class="bi bi-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        @endcan

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Address</th>
                                <th scope="col">Item</th>
                                <th scope="col">Requested By</th>
                                <th scope="col">Description</th>
                                <th scope="col">Remarks</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($donationRequests as $key => $donationRequest)
                                <tr>
                                    <th scope="row">{{ $key + 1}}</th>
                                    <td>{{$donationRequest->address}}</td>
                                    <td>{{$donationRequest->items->name.' '.$donationRequest->items->quantity.$donationRequest->items->unit}}</td>
                                    <td><a href="{{route('users.show', $donationRequest->user->id)}}">{{$donationRequest->user->first_name}} {{$donationRequest->user->middle_name ?? ''}} {{$donationRequest->user->last_name}}</a></td>
                                    <td>{{$donationRequest->description}}</td>
                                    <td>{{$donationRequest->remarks}}</td>
                                    <td>{{$donationRequest->status}}</td>
                                    <td>
                                        <div class="d-flex">
                                            @can('requests-archive.unarchive')
                                                <a href="{{route('requests-archive.unarchive', $donationRequest->id)}}" class="btn btn-sm btn-warning" >UnArchive</a>
                                            @endcan

                                                @can('requests.destroy')
                                                    <form action="{{ route('requests.destroy', $donationRequest->id)}}" method="POST" style="margin-left:5px;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                                    </form>
                                                @endcan
                                        </div>

                                        @if($donationRequest->totalDonations() >0)
                                            <a href="{{route('requests-donors.index', $donationRequest->id)}}" class="btn btn-sm btn-outline-success my-2" > Donors</a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th scope="row" colspan="5">No Donation Request Found</th>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $donationRequests->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
