@extends('layouts.admin')
@section('title', 'DonationRequest-page')
@section('page', 'Donation Request')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-5">
                            <h3>Donation Request List</h3>
                        </div>



                        @can('requests.index')
                            <div class="col-md-5">
                            <form action="{{route('requests.index')}}" method="GET">
                                <div class="d-flex">
                                    <input type="text" class="form-control" placeholder="Search by item name or address" name="search_by" value="">

                                    <button type="submit" class="btn btn-sm btn-primary mx-2"><i class="bi bi-search"></i></button>
                                </div>
                            </form>
                            </div>
                        @endcan
                        @can('requests.create')
                            <div class="col-md-2">
                                <a href="{{ route('requests.create') }}" class="btn btn-outline-success btn-sm align-items-right"><span>Add Request</span></a>
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
                                <!--  place all the object detail according to table -->
                            @forelse($donationRequests as $key => $donationRequest)
                                <tr>
                                    <!--  place the index -->
                                    <th scope="row">{{ $key + 1}}</th>
                                    <!--  address -->
                                    <td>{{$donationRequest->address}}</td>
                                    <!--  -->
                                    <!-- item name -->
                                    <td>{{$donationRequest->items->name.' '.$donationRequest->items->quantity.$donationRequest->items->unit}}</td>
                                    <td><a href="{{route('users.show', $donationRequest->user->id)}}">{{$donationRequest->user->first_name}} {{$donationRequest->user->middle_name ?? ''}} {{$donationRequest->user->last_name}}</a></td>
                                    <td>{{$donationRequest->description}}</td>
                                    <!--  display remarks -->
                                    <td>{{$donationRequest->remarks}}</td>
                                    <!--  status of donation -->
                                    <td>{{$donationRequest->status}}</td>
                                    <td>
                                        <!--   -->
                                        <div class="d-flex">
                                            <!--  show -->
                                            @can('requests-archive.archive')
                                            <!--  archive button if the user have 
                                        archive functionality -->
                                                <a href="{{route('requests-archive.archive', $donationRequest->id)}}" class="btn btn-sm btn-warning" >Archive</a>
                                            @endcan
                                            @can('requests.edit')
                                            <!--  edit button -->
                                            <!--  for editing -->
                                            <a href="{{route('requests.edit', $donationRequest->id)}}" class="btn btn-sm btn-outline-success mx-2" ><i class="bi bi-pen"></i></a>
                                                @endcan
<!--  if the request has donation
view donors button will be available -->
                                                @if($donationRequest->totalDonations() == 0)
                                            @can('requests.destroy')
                                            <!--  form for deleting -->
                                            <!--  this will let to delete if there is no donation -->
                                            <form action="{{ route('requests.destroy', $donationRequest->id)}}" method="POST" style="margin-left:5px;">
                                                @csrf
                                                <!-- for protection csrf is used -->
                                                @method('DELETE')
                                                <!--  delete method will ask form confirmation -->
                                                <button onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                            </form>
                                                @endcan
                                                @endif
                                        </div>
<!--  for viewing donors  -->
                                        @if($donationRequest->totalDonations() >0)
                                        <!--  if the donors are available -->
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
