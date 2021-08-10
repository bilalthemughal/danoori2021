
@extends('admin.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">Today Ad Budget for {{ $product->name }}</h3>
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
            <form method="post" action="{{ route('admin.budget.store', $product) }}">
                @csrf
                <div class="form-group">
                    <label for="budget">Budget</label>
                    <input name="budget" required value="{{ old('budget') }}" type="text" class="form-control" id="budget" placeholder="Enter Budget">
                </div>

                <div class="form-group">
                    <label for="sold">Sold</label>
                    <input name="sold" required value="{{ old('sold') }}" type="text" class="form-control" id="sold" placeholder="Enter sold quantity">
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection

@section('extra-js')
    <script>
        $(function() {
            $('#link').on('keypress', function(e) {
                if (e.which == 32){
                    return false;
                }
            });
        });
    </script>
@endsection
