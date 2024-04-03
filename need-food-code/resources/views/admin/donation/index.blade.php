@extends('layouts.admin')
@section('title', 'Approve Donation Page')
@section('page', 'Donation List')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <h3>Donation List</h3>
                        </div>



                        @can('donations.index')
                            <div class="col-md-6">
                                <form action="{{route('donations.index')}}" method="GET">
                                    <div class="d-flex">
                                        <input type="text" class="form-control" placeholder="Search by item name or address" name="search_by" value="">

                                        <button type="submit" class="btn btn-sm btn-primary mx-2"><i class="bi bi-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        @endcan
                        @can('donations.create')
                            <div class="col-md-2">
                                <a href="{{ route('donations.create') }}" class="btn btn-outline-success btn-sm float-right"><span>Add Donation</span></a>
                            </div>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-vcenter text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Donor Name</th>
                                <th scope="col">Donor Address</th>
                                <th scope="col">Donated Item</th>
                                <th scope="col">Item Description</th>
                                <th scope="col">Expiry Date</th>
                                <th scope="col">Delivery Type</th>
                                <th scope="col">Delivery Date</th>
                                <th scope="col">Status</th>
                                <th>Image</th>

                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($donationLists as $key => $donationList)


                                <tr>
                                    <th scope="row">{{ $key + 1}}</th>
                                    <td>{{$donationList->user->first_name}} {{$donationList->user->middle_name ?? ''}} {{$donationList->user->last_name}}</td>
                                    <td>{{$donationList['address']}}</td>
                                    <td>{{$donationList->donationItem->name ?? 'Healthy Meal'}} {{$donationList->donationItem['quantity'] ?? '20'}}{{$donationList->donationItem['unit'] ??'plates'}}</td>
                                    <td>{{$donationList['description']}}</td>
                                    <td>{{$donationList['expiry_date'] ?? 'not applicable'}}</td>
                                    <td>{{$donationList['delivery_type']}}</td>
                                    <td>{{$donationList['donated_date_time'] ?? 'Not given'}}</td>
                                    <td>{{$donationList['status']}}</td>
                                    <td>
                                        @forelse($donationList['images'] as $image)

                                            <a href="{{url(asset($image->image_path))}}"><img src="{{asset($image->image_path) }}" style="width:80px; height:80px;" class="me-4 border" alt="Donation Img"></a>
                                        @empty
                                            {{'No Image' }}
                                        @endforelse
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            @can('donations-archive.archive')
                                                <a href="{{route('donations-archive.archive', $donationList->id)}}" class="btn btn-sm btn-warning" >Archive</a>
                                            @endcan
                                            @can('donations.edit')
                                                <a href="{{route('donations.edit', $donationList->id)}}" class="btn btn-sm btn-outline-success mx-2 " ><i class="bi bi-pen"></i></a>
                                            @endcan
                                                @if(!($donationList->recieverDetail ?? ''))
                                            @can('donations.destroy')
                                                <form action="{{ route('donations.destroy', $donationList->id)}}" method="POST" style="margin-left:1px;">
                                                    @csrf
                                                    @method('DELETE')

                                                        <button onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>

                                                </form>
                                            @endcan
                                                @endif

                                        </div>
                                        @if($donationList->recieverDetail ?? '')
                                            <a href="{{route('donations-receiver.index', $donationList->id)}}" class="btn btn-sm btn-outline-success my-2" > Receiver</a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th scope="row" colspan="11">No Donation Found</th>
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

