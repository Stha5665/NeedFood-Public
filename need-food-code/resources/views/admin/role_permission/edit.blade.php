@extends('layouts.admin')
@section('title', 'Edit Role Permissions')
@section('page', $pagename='Edit Role and Permission')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="page-title">{{$pagename}}</h3>

        </div>
        <div class="card-body">
            <form action="{{route('role-permissions.update', $roleDetail->id)}}" method="POST">
                @method('PUT')
                @csrf
                    <div class="form-group">
                        <div class="col-md-12 mb-3">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 table-vcenter text-nowrap ">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Permissions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($permissionNames as $tableName => $permissionName)
                                        <tr>
                                            <td>{{$tableName}}</td>
                                            <td class="d-flex">
                                                @foreach($permissionName as $functionName => $value)
                                                    <input type="checkbox" name="permissions[]" class="btn-check" id="{{$tableName.'-'.$functionName}}" value="{{json_encode($value)}}" autocomplete="off" @if ($roleDetail->hasAnyPermission($value)) checked @endif>
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

                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{$roleDetail->name}}" required>
                        @error('name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror

                        <div class="col-md-12 mt-3">
                            <button class="btn btn-primary mt-2">Update</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
