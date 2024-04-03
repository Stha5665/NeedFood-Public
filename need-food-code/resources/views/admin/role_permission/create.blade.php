@extends('layouts.admin')
@section('title', 'Add-Role-Permissions')
@section('page', $pagename='Add Role Permissions')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="page-title">{{$pagename}}</h3>

        </div>
        <div class="card-body">
            <form action="{{route('role-permissions.store') }}" method="POST">
                @csrf
                    <div class="form-group">

                        <div class="col-md-12 mb-3">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 table-vcenter text-nowrap ">
                                    <thead>
                                    <tr>

                                        <th>Permissions</th>
                                        <th>Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    @foreach ($permissionNames as $tableName => $permissionName)

                                        <tr>
                                            <td>{{$tableName}}</td>

                                            <td class="d-flex">

                                                @foreach($permissionName as $functionName => $value)

                                                    <input type="checkbox" name="permissions[]" class="btn-check" id="{{$tableName.'-'.$functionName}}" value="{{json_encode($value)}}" autocomplete="off">
                                                    <label class="btn btn-outline-primary m-2" for="{{$tableName.'-'.$functionName}}">{{$functionName}}</label>
                                                @endforeach
                                            </td>


                                        </tr>

                                    @endforeach

                                    @error('permission')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <label for="">Role Name<span class="required-details">*</span> </label>
                        <input type="text" name="name" class="form-control" placeholder="Enter role Name*" required>
                        @error('name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror

                        <div class="col-md-12 mt-3">
                            <button class="btn btn-primary mt-2">Add Role</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
