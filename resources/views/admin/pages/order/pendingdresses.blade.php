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
                        Pending Dresses
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
                <div class="card-body table-responsive">
                    <table class="table" id="pending-orders-table">
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
        $('#pending-orders-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.pendingdressestable') }}',
            "pageLength": 50,
            columns: [
                {
                    data: 'photo',
                    title: 'Photo'
                },
                {
                    data: 'name',
                    title: 'Name'
                },
                {
                    data: 'quantity',
                    title: 'Quantity'
                }                
            ]
        });
    </script>
@endsection
