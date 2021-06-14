@extends('admin.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">Edit Coupon</h3>
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
            <form method="post" action="{{ route('admin.coupon.update', $coupon) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="text">Text</label>
                    <input name="text" required value="{{ $coupon->text }}" type="text" class="form-control" id="text" placeholder="Enter text">
                </div>
                <div class="form-group">
                    <label for="percent">Percent</label>
                    <input name="percent" min="1" max="50" required value="{{ $coupon->percent }}" type="number" class="form-control" id="percent" placeholder="Enter percent">
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection


