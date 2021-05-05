@extends('admin.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">Create Carousel</h3>
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
            <form method="post" action="{{ route('admin.carousel.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="background-color">Background Color</label>
                        <input name="background_color" required value="{{ old('background_color') }}" type="text" class="form-control" id="background-color" placeholder="Enter background color">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="is_active">Status</label>
                        <select name="is_active" required value="{{ old('is_active') }}" class="form-control" id="is_active">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="link">Link</label>
                    <input name="link" required value="{{ old('link') }}" type="text" class="form-control" id="link" placeholder="Enter link">
                </div>
                <div class="form-group">
                    <label for="h3-tag">H3 Tag</label>
                    <input name="h3_tag" required value="{{ old('h3_tag') }}" type="text" class="form-control" id="h3-tag" placeholder="Enter h3 tag">
                </div>
                <div class="form-group">
                    <label for="h2-tag">H2 Tag</label>
                    <input name="h2_tag" required value="{{ old('h2_tag') }}" type="text" class="form-control" id="h2-tag" placeholder="Enter h2 tag">
                </div>
                <div class="form-group">
                    <label for="p-tag">P Tag</label>
                    <input name="p_tag" required value="{{ old('p_tag') }}" type="text" class="form-control" id="p-tag" placeholder="Enter p tag">
                </div>
                <div class="form-group">
                    <label for="upload-image">Upload Image</label>
                    <input name="image" required type="file" class="form-control" id="upload-image" accept="image/png, image/jpeg, image/jpg">
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection


