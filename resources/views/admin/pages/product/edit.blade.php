@extends('admin.layout')

@section('extra-css')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">Edit Product</h3>
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
            <form method="post" action="{{ route('admin.product.update', $product) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" required value="{{ $product->name }}" type="text" class="form-control" id="name"
                        placeholder="Enter name">
                </div>

                <div class="form-group">
                    <label for="is_active">Status</label>
                    <select name="is_active" required value="{{ $product->is_active }}" class="form-control"
                        id="is_active">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="is_active">Category</label>
                    <select name="category_id" required value="{{ old('category_id') }}" class="form-control"
                        id="category_id">
                        @forelse($categories as $category)
                            <option {{ $category->id == $product->category_id ? 'selected' : '' }}
                                value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                            <option value="">No record found</option>
                        @endforelse
                    </select>
                </div>

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input name="slug" required value="{{ $product->slug }}" type="text" class="form-control" id="slug"
                        placeholder="Enter Slug">
                </div>

                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input name="stock" required value="{{ $product->stock }}" type="number" class="form-control"
                        id="stock" placeholder="Enter Stock">
                </div>

                <div class="form-group">
                    <label for="original_price">Original Price</label>
                    <input name="original_price" required value="{{ $product->original_price }}" type="text"
                        class="form-control" id="original_price" placeholder="Enter Original Price">
                </div>

                <div class="form-group">
                    <label for="discounted_price">Discounted Price</label>
                    <input name="discounted_price" value="{{ $product->discounted_price }}" type="text"
                        class="form-control" id="discounted_price" placeholder="Enter Discounted Price">
                </div>

                <div class="form-group">
                    <label for="label_tag">Label Tag</label>
                    <input name="label_tag" value="{{ $product->label_tag }}" type="text" class="form-control"
                        id="label_tag" placeholder="Enter Label Tag">
                </div>

                <div class="form-group">
                    <label for="cost">Cost</label>
                    <input name="cost" value="{{ $product->cost }}" type="text" class="form-control" id="cost"
                        placeholder="Enter cost of product">
                </div>

                <div class="form-group">
                    <label for="upload-image">Upload Image</label>
                    <input name="image" type="file" class="form-control" id="upload-image"
                        accept="image/png, image/jpeg, image/jpg, image/webp">
                </div>

                <div class="form-group">
                    <label for="upload-image">Upload Second Image</label>
                    <input name="second_image" type="file" class="form-control" id="upload-image"
                        accept="image/png, image/jpeg, image/jpg, image/webp">
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="left_color">Left color</label>
                        <input name="left_color" required value="{{ $product->left_color }}" type="text"
                            class="form-control" id="left_color" placeholder="Enter left color">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="right_color">Right color</label>
                        <input name="right_color" required value="{{ $product->right_color }}" type="text"
                            class="form-control" id="right_color" placeholder="Enter right color">
                    </div>
                </div>

                <div class="form-group">
                    <label for="video">Video</label>
                    <input name="video_path" value="{{ $product->video_path }}" type="text" class="form-control"
                        id="video" placeholder="Enter Video Path">
                </div>

                <div class="form-group">
                    <label for="product_info">Product Information</label>
                    <textarea id="product-info-editor" name="product_info">{{ $product->product_info }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection

@section('extra-js')

    <script>
        ClassicEditor
            .create(document.querySelector('#product-info-editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
