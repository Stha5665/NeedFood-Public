@extends('layouts.admin')
@section('title', 'Approve Donation Page')
@section('page', 'Donation List')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Donation List</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Donor Name</th>
                                <th scope="col">Donor Address</th>
                                <th scope="col">Requested Item</th>
                                <th scope="col">Remaining Quantity </th>
                                <th scope="col">Donated Quantity</th>
                                <th scope="col">Item Description</th>
                                <th scope="col">Expiry Date</th>
                                <th scope="col">Delivery Type</th>
                                <th scope="col">Delivery Date</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($donationLists as $key => $donationList)


                                <tr>
                                    <th scope="row">{{ $key + 1}}</th>
                                    <td>{{$donationList['donor_name']}}</td>
                                    <td>{{$donationList['address']}}</td>
                                    <td>{{$donationList['item']}}</td>
                                    <td>{{$donationList['remaining_quantity']}}</td>
                                    <td>{{$donationList['quantity']}}</td>
                                    <td>{{$donationList['description']}}</td>
                                    <td>{{$donationList['expiry_date']}}</td>
                                    <td>{{$donationList['delivery_type']}}</td>
                                    <td>{{$donationList['delivery_date']}}</td>
                                    <td>

                                        <button type="button" class="btn btn-sm btn-primary verify-btn" data-bs-toggle="modal" data-bs-target="#approveDonation" value="{{$donationList['id']}}">
                                            Verify
                                        </button>

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

    <!-- This will appear when approving or rejecting -->
    <div class="modal fade" id="approveDonation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="approveDonationLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="approveDonationLabel">Verification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('edit-status.update')}}" method="POST">
                        <div class="row clearfix">
                            @csrf
                            <div class="col-md-12 mb-3">
                                <input type="hidden" id="hidden-donation-field" name="donation_id" value="">
                                    <label><h5>Select Status<span class="required-details">*</span> </h5></label>
                                    <select name="status" class="form-control" required>
                                        <option value="">--Select Category--</option>
                                        <option value="verified">Verified</option>
                                        <option value="rejected">Rejected</option>
                                    </select>
                            </div>
                            <div class="col-md-12 col-sm-12 mb-3">
                                <div class="form-group">
                                    <label><h5>Remarks<span class="required-details">*</span> </h5></label>
                                    <textarea class="form-control" name="remarks" rows="5" required>{{old('remarks')}}</textarea>

                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 ">

                                <div class="form-group">
                                    <button class="btn btn-sm btn-primary">Add</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(function(){
            $('.verify-btn').click(function(){
                $('#hidden-donation-field').val($(this).val());
            });

        });

    </script>
@endsection
