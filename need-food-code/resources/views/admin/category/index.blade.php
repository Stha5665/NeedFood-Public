@extends('layouts.admin')
@section('title', 'category-page')
@section('page', 'Category')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Category List</h3>
                    @can('categories.create')
                    <a href="{{ route('categories.create') }}" class="btn btn-outline-success btn-sm float-right"><span>Add category</span></a>
                    @endcan
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $key => $category)
                            <tr>
                                <th scope="row">{{ $key + 1}}</th>
                                <td>{{$category->name}}</td>
                                <td>{{$category->priority}}</td>
                                <td>{{$category->description}}</td>
                                <td class="d-flex d-inline-block">
                                    @can('categories.edit')
                                    <a href="{{route('categories.edit', $category->id)}}" class="btn btn-sm btn-outline-success" ><i class="bi bi-pen"></i></a>
                                    @endcan
                                    @can('categories.destroy')
                                    <form action="{{ route('categories.destroy', $category->id)}}" method="POST" style="margin-left:5px;">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                        @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th scope="row" colspan="4">No category Found</th>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
{{--                    {{ $categories->links() }}--}}
                </div>
            </div>
        </div>
    </div>
@endsection
