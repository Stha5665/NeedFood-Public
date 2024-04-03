@extends('layouts.admin')
@section('title', 'Edit-Category')
@section('page', $pagename='Edit Category')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="page-title">{{$pagename}}</h3>

        </div>
        <div class="card-body">
            <form action="{{route('categories.update', $category->id)}}" method="POST">
                @method('PUT')
                <div class="row clearfix">
                    @csrf
                    <div class="col-md-8 col-sm-12 mb-2">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Name*" name="name" value="{{$category->name}}" required >
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div>
                            <label>Select Priority</label>
                            <select name="priority" class="form-control" required>
                                <option value="">--Select Priority--</option>
                                <option value="High" {{$category->priority == 'High' ? 'selected':''}}>High</option>
                                <option value="Medium" {{$category->priority == 'Medium' ? 'selected':''}}>Medium</option>
                                <option value="Low" {{$category->priority == 'Low' ? 'selected':''}}>Low</option>
                            </select>
                            @error('priority')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 mb-2">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="5" required>{{$category->description}}</textarea>
                            @error('description')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="form-group">
                            <button class="btn btn-sm btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection








