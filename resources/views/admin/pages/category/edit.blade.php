@extends('admin.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">Edit Category</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('admin.category.update', $category) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" required value="{{ $category->name }}" type="text" class="form-control" id="name" placeholder="Enter name">
                </div>

                <div class="form-group">
                    <label for="is_active">Status</label>
                    <select name="is_active" required class="form-control" id="is_active">
                        <option value="1" {{ $category->is_active == 1 ? 'selected': '' }}>Active</option>
                        <option value="0" {{ $category->is_active == 0 ? 'selected': '' }}>Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input name="slug" required value="{{ $category->slug }}" type="text" class="form-control" id="slug" placeholder="Enter Slug">
                </div>

                <div class="form-group">
                    <label for="upload-image">Upload Image</label>
                    <input name="image" type="file" class="form-control" id="upload-image" accept="image/png, image/jpeg, image/jpg">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection


