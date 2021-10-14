@extends('admin.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">Edit Order</h3>
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
            <form method="post" action="{{ route('admin.order.update', $order) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" required value="{{ $order->name }}" type="text" class="form-control" id="name"
                        placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" value="{{ $order->email }}" type="text" class="form-control" id="email"
                        placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone No:</label>
                    <input name="phone_number" required value="{{ $order->phone_number }}" type="text" class="form-control" id="phone"
                        placeholder="Enter Phone Number">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input name="total" required value="{{ $order->total }}" type="text" class="form-control" id="price"
                        placeholder="Enter Price">
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input name="city" required value="{{ $order->city }}" type="text" class="form-control" id="city"
                        placeholder="City">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input name="address" required value="{{ $order->address }}" type="text" class="form-control" id="address"
                        placeholder="Address">
                </div>
                <div class="form-group">
                    <label for="order_note">Remarks</label>
                    <input name="order_note" required value="{{ $order->order_note }}" type="text" class="form-control" id="order_note"
                        placeholder="Remarks">
                </div>
                {{-- <div class="form-group">
                    <label for="product_id">Product</label>
                    <select name="product_id" required class="form-control"
                        id="product_id">
                        @forelse($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @empty
                            <option value="">No record found</option>
                        @endforelse
                    </select>
                </div> --}}
                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection



