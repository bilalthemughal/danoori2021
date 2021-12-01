@extends('admin.layout')

@section('extra-css')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('page-level/css/image-popup.css')}}">
@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
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
                    <a class="btn btn-primary" href="{{ route('admin.product.create') }}">Create Product</a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table" id="products-table">
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
        $('#products-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.product.table.data') }}',
            columns: [
                {data: 'id', title: 'ID'},
                {data: 'name', title: 'Name'},
                {data: 'category.name', title: 'Category'},
                {data: 'image', title: 'Image'},
                {data: 'slug', title: 'Slug'},
                {data: 'status', title: 'Active'},
                {data: 'original_price', title: 'Price'},
                {data: 'discounted_price', title: 'Discounted Price'},
                {data: 'label_tag', title: 'Product Label'},
                {data: 'action', title: 'Action'},
            ]
        });
    </script>
@endsection
