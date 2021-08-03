@extends('admin.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">Order Detail</h3>
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
            <div class="row">
                <div class="col-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Danoori.pk
                                    <small class="float-right">{{ $order->created_at->format('d-M-Y') }}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <b>Customer Details</b>
                                <address>
                                    {{ $order->name }}<br>
                                    {{ $order->email }}<br>
                                    {{ $order->address }}<br>
                                    {{ $order->city }}<br>
                                    {{ $order->phone_number }}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <br>
                                <b>Order ID:</b> {{ $order->order_id }}<br>
                                <br>
                                @if ($order->status === App\Models\Order::IS_PENDING)
                                    <button class="btn btn-success" id="ship-button" onclick="shipIt({{ $order->id }})">Ship It</button>
                                    <button class="btn btn-danger" id="cancel-button" onclick="cancelIt({{ $order->id }})">Cancel It</button>
                                @elseif ($order->status === App\Models\Order::IS_SHIPPED)
                                    <span class="badge badge-success">Shipped</span>
                                @elseif ($order->status === App\Models\Order::IS_CANCELLED)
                                    <span class="badge badge-danger">Cancelled</span>
                                @endif
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td><a target="_blank"
                                                        href="{{ route('category.product', [$product->category->slug, $product->slug]) }}">{{ $product->name }}</a>
                                                </td>
                                                <td>{{ $product->pivot->quantity }}</td>
                                                <td>Rs: {{ $product->pivot->price }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">

                            <!-- /.col -->
                            <div class="col-md-6 col-sm-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th style="width:50%">Note:</th>
                                                <td>{{ $order->order_note ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td>Rs: {{ $order->sub_total }}</td>
                                            </tr>
                                            <tr>
                                                <th>Discount</th>
                                                <td>Rs: {{ $order->sub_total - $order->total }}</td>
                                            </tr>
                                            <tr>
                                                <th>Coupon</th>
                                                <td>{{ $order->coupon ?: 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>Rs: {{ $order->total }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>

                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection

<script>
    function shipIt(id) {
        $.ajax({
            url: "/admin/order/ship/"+id,
            type: 'GET',
            success: function(res) {
                document.getElementById('ship-button').innerHTML = 'Shipped';
                document.getElementById('cancel-button').style.visibility = 'hidden';
            }
        });
    }

    function cancelIt(id) {
        $.ajax({
            url: "/admin/order/cancel/"+id,
            type: 'GET',
            success: function(res) {
                document.getElementById('cancel-button').innerHTML = 'Cancelled';
                document.getElementById('ship-button').style.visibility = 'hidden';
            }
        });
    }
</script>
