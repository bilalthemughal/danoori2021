@extends('admin.layout')

@section('extra-css')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('page-level/css/image-popup.css')}}">
@stop

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Categories</h1>
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
            <div class="card">
                <div class="card-header float-right">
                    <a class="btn btn-primary" href="{{ route('admin.category.create') }}">Create Category</a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table" id="categories-table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if($category->is_active == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">In-active</span>
                                    @endif
                                </td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    <img class="img-popup" width="50px" height="50px" src="{{ asset($category->getImage()) }}" alt="">
                                </td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="{{ route('admin.category.edit', $category) }}"><i class="fa fa-edit"></i></a>
                                    @if($category->products_count === 0)
                                        <form class="d-inline" action="{{ route('admin.category.destroy', $category) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="confirm('Do you really want to delete this ?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No data found</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>

        </div><!-- /.container-fluid -->

    </div>
    <!-- /.content -->
    @include('admin.pages.partials.image-popup')


@endsection

@section('extra-js')

    <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('page-level/js/image-popup.js')}}"></script>

    <script>
        $('#categories-table').DataTable({});
    </script>
@endsection
