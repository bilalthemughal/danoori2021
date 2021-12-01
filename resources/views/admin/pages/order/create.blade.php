@extends('admin.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">Create Order</h3>
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
            <form method="post" action="{{ route('admin.order.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" required value="{{ old('name') }}" type="text" class="form-control" id="name"
                        placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" value="{{ old('email') }}" type="text" class="form-control" id="email"
                        placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="phone">Phone No:</label>
                    <input name="phone" required value="{{ old('phone') }}" type="text" class="form-control" id="phone"
                        placeholder="Enter Phone Number">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input name="price" required value="{{ old('price') }}" type="text" class="form-control" id="price"
                        placeholder="Enter Price">
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input name="city" required value="{{ old('city') }}" type="text" class="form-control" id="city"
                        placeholder="City">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input name="address" required value="{{ old('address') }}" type="text" class="form-control"
                        id="address" placeholder="Address">
                </div>
                <div class="form-group">
                    <label for="order_note">Remarks</label>
                    <input name="order_note" value="{{ old('order_note') }}" type="text" class="form-control"
                        id="order_note" placeholder="Enter Remarks">
                </div>
                
                <div class="form-group">
                    <label for="label">Label</label>
                    <input name="label" value="{{ old('label') }}" type="text" class="form-control"
                        id="label" placeholder="Enter Label">
                </div>
                <div>
                    <div id="product_div0" class="row product_div">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="product_id">Product</label>
                                <select name="product_id[]" required value="{{ old('product_id') }}"
                                    class="form-control" id="product_id">
                                    @forelse($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @empty
                                        <option value="">No record found</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for"product_price">Product Price</label>
                                <input type="text" name="product_price[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for"product_quantity">Product Quantity</label>
                                <input type="text" value="1" name="product_quantity[]" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for"remove_product">Remove Product</label>
                                <button type="button" class="btn btn-danger form-control" onclick="checkid(this)"><i
                                        class="fa fa-trash"></i></button>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <button id="add_new_product" type="button" class="form-control btn btn-primary"><i
                                class="fa fa-plus"></i> Add new</button>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection

@section('extra-js')
    <script>
        let add_button = document.querySelector('#add_new_product');

        let i = 0;
        add_button.addEventListener('click', function() {
            var original = document.querySelector('.product_div');
            var clone = original.cloneNode(true); // "deep" clone
            clone.id = "product_div" + ++i; // there can only be one element with an ID
            original.parentNode.appendChild(clone);
        })

        function checkid(el) {
            let count = document.querySelectorAll('.product_div').length;
            if (count > 1) {
                el.parentNode.parentNode.parentNode.remove();
            } else {
                alert('You cant delete the last item');
            }
        }
    </script>

@endsection
