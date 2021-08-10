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
                    <h1 class="m-0">Ad Budget of {{ $product->name }}</h1>
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
                    <a class="btn btn-primary" href="{{ route('admin.budget.create', $product) }}">Create Budget</a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table" id="budgets-table">
                    </table>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection

@include('admin.pages.partials.image-popup')

@section('extra-js')

    <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('page-level/js/image-popup.js')}}"></script>

    <script>
        $('#budgets-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.budget.table.data', $product->id) }}',
            columns: [
                {data: 'id', title: 'ID'},
                {data: 'budget', title: 'Budget'},
                {data: 'sold', title: 'Sold'},
                {data: 'cost', title: 'Cost per sale'},
                {data: 'created_at', title: 'Date'}
                
            ]
        });
    </script>
@endsection
