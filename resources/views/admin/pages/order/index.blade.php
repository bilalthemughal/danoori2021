@extends('admin.layout')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    {{-- <link rel="stylesheet" href="{{asset('page-level/css/image-popup.css')}}"> --}}
@stop

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        {{ $status === App\Models\Order::IS_PENDING ? 'Pedning Orders' : ($status === App\Models\Order::IS_SHIPPED ? 'Completed Orders' : 'Cancelled Orders') }}
                    </h1>
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
                    @if ($status != App\Models\Order::IS_SHIPPED)
                        <a class="btn btn-success" href="{{ route('admin.order.completed') }}">Successfull Orders</a>
                    @endif
                    @if ($status != App\Models\Order::IS_PENDING)
                        <a class="btn btn-info" href="{{ route('admin.order.index') }}">Pending Orders</a>
                    @endif
                    @if ($status != App\Models\Order::IS_CANCELLED)
                        <a class="btn btn-danger" href="{{ route('admin.order.cancelled') }}">Cancelled Orders</a>
                    @endif
                </div>
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

    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>

    <script>
        $('#orders-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.order.table.data', ['id' => $status]) }}',
            order: [
                [0, 'desc']
            ],
            columns: [{
                    data: 'id',
                    title: 'ID'
                },
                {
                    data: 'name',
                    title: 'Name'
                },
                {
                    data: 'sub_total',
                    title: 'Sub'
                },
                {
                    data: 'total',
                    title: 'Total'
                },
                {
                    data: 'coupon',
                    title: 'Coupon'
                },
                {
                    data: 'time',
                    title: 'Placed @'
                },
                {
                    data: 'action',
                    title: 'Action'
                },
            ]
        });
    </script>
@endsection
