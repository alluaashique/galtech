@extends('admin.layout.app')
@section('content')
 <!-- content body -->
 <div class="content-body">
    <div class="container">
        <div class="row page-titles">
            <div class="col p-0">
                <h4>Departments</h4>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Departments</li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Departments</h4>
                        <div class="basic-form">
                            @if(isset($department))
                            <form id="myForm" method="POST" action="{{route('admin.departments.update',$department->id)}}" enctype="multipart/form-data">
                            @method("PUT")
                            @else
                            <form id="myForm" method="POST" action="{{route('admin.departments.store')}}" enctype="multipart/form-data">
                            @method("POST")
                            @endif
                                @csrf
                                <div class="form-group">
                                    <label>Treatment Name</label>
                                    <input type="text" id="departments" name="departments" class="form-control" placeholder="Department"
                                    value="{{ old('departments') ?? $department->name ?? "" }}">
                                    @error('departments')
                                    {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea name="short_description" id="short_description" class="form-control"  placeholder="Short Description">{{ old('short_description') ?? $department->short_description ?? "" }}</textarea>
                                    @error('short_description')
                                    {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" id="description" class="form-control"  placeholder="Description">{{ old('description') ?? $department->description ?? "" }}</textarea>
                                    @error('description')
                                    {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" id="image" name="image" class="form-control" accept="image/*">
                                    @error('image')
                                    {{ $message }}
                                    @enderror
                                </div>
                                <button type="submit" name="submit" class="btn btn-dark">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!-- #/ content body -->
@endsection
