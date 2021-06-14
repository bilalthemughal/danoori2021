@extends('admin.layout')

@section('extra-css')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('page-level/css/image-popup.css')}}"> --}}
@stop

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Orders</h1>
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
                {{-- <div class="card-header float-right">
                    <a class="btn btn-primary" href="{{ route('admin.carousel.create') }}">Create Carousel</a>
                </div> --}}
                <div class="card-body table-responsive">
                    <table class="table" id="orders-table">
                    </table>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection

@section('extra-js')

    <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>

    <script>
        $('#orders-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.order.table.data') }}',
            columns: [
                {data: 'id', title: 'ID'},
                {data: 'name', title: 'Name'},
                {data: 'email', title: 'Email'},
                {data: 'sub_total', title: 'Sub'},
                {data: 'total', title: 'Total'},
                {data: 'phone_number', title: 'Number'},
                {data: 'coupon', title: 'Coupon'},
                {data: 'address', title: 'Address'},
                {data: 'city', title: 'City'},
                {data: 'total_products', title: '#'},
                {data: 'action', title: 'Action'},
            ]
        });
    </script>
@endsection
