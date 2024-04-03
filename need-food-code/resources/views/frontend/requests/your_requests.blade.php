@extends('frontend.layout')
@section('title', $pagename='Your Request')
@section('content')
    <div class="container-xxl bg-dark py-4 page-header mb-5">
        <div class="container pb-4 my-5 pt-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{$pagename}}</h1>
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

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Your Request List</h3>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-vcenter text-nowrap mb-0">

                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Item</th>
                                        <th scope="col">Your Address</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Remarks</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($yourRequests as $key => $yourRequest)
                                        <tr>
                                            <th scope="row">{{ $key + 1}}</th>

                                            <td>{{$yourRequest->items->name. ' '.$yourRequest->items->quantity.''.$yourRequest->items->unit}}</td>
                                            <td>{{$yourRequest->address}}</td>
                                            <td class="{{$yourRequest->status}}-status">{{$yourRequest->status}}</td>
                                            <td>{{$yourRequest->remarks}}</td>
                                            <td>
    {{--                                            @if($yourRequest->status == 'open')--}}
    {{--                                            <a href="{{route('requests.edit', $yourRequest->id)}}" class="btn btn-sm btn-outline-success" ><i class="bi bi-pen"></i></a>--}}
    {{--                                            @endif--}}

                                                <a href="{{route('frontend.your-requests.show',$yourRequest->id)}}" class="main-btn" >View</a>

    {{--                                            <form action="{{ route('requests.destroy', $yourRequest->id)}}" method="POST" style="margin-left:5px;">--}}
    {{--                                                @csrf--}}
    {{--                                                @method('DELETE')--}}
    {{--                                                <button onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>--}}
    {{--                                            </form>--}}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th scope="row" colspan="6">No Donation Request Found</th>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            {{$yourRequests->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>

    <!-- Requests End -->
    @include('frontend.include.footer')


@endsection
