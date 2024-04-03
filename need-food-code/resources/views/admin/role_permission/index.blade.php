@extends('layouts.admin')
@section('title', 'Role-Permission-Page')
@section('page', 'Role Permissions')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Role List</h3>
                    @can('role-permissions.create')
                    <a href="{{ route('role-permissions.create') }}" class="btn btn-outline-success btn-sm float-right"><span>Add Role</span></a>
                    @endcan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-vcenter text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Guard Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($rolesLists as $key=> $roleList)

                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$roleList->name}}</td>
                                    <td>{{$roleList->guard_name}}</td>

                                    <td class="d-flex">
                                        @can('role-permissions.edit')
                                        <a class="btn btn-sm btn-outline-primary" href="{{route('role-permissions.edit', $roleList->id)}}" title="Edit"><i class="bi bi-pen"></i></a>
                                        @endcan
                                        @can('role-permissions.destroy')
                                        <form action="{{ route('role-permissions.destroy', $roleList->id)}}" method="POST" style="margin-left:5px;">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                        </form>
                                            @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
