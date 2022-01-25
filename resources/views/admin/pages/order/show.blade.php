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
                                    <a class="btn btn-info" href="tel:{{ $order->phone_number }}">
                                        {{ $order->phone_number }} </a>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <br>
                                <b>Order ID:</b> <a class="btn btn-info"
                                    href="https://mnpcourier.com/mycod/ConsignmentTracking.aspx?d={{ $order->order_id }}"
                                    target="_blank">{{ $order->order_id }}</a> <br>
                                <br>
                                @if ($order->status === App\Models\Order::IS_PENDING)
                                    <button class="btn btn-success" id="book-button"
                                        onclick="bookIt({{ $order->id }})">Book It</button>
                                    <button class="btn btn-success" id="ship-button"
                                        onclick="shipIt({{ $order->id }})">Ship It</button>
                                    <button class="btn btn-danger" id="cancel-button"
                                        onclick="cancelIt({{ $order->id }})">Cancel It</button>
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
                                            <th>Image</th>
                                            <th>Product</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td><img src="{{ get_image_path($product->small_photo_path) }}"
                                                        width="80px" height="120px" alt=""></td>
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
    function bookIt(id) {

        $.post("http://mnpcourier.com/mycodapi/api/Booking/InsertBookingData/", {
                "username": "bilal_8d128",
                "password": "M&Pis1234",
                "consigneeName": "{{ $order->name }}",
                "consigneeAddress": `{{ $order->address }}`,
                "consigneeMobNo": "{{ $order->phone_number }}",
                "destinationCityName": "{{ $order->city }}",
                "pieces": 1,
                "weight": 0.49,
                "codAmount": {{ $order->total }},
                "custRefNo": "{{ $order->order_id }}",
                "productDetails": "{{ $order->label }}",
                "fragile": "No",
                "service": "O",
                "remarks": "{{ $order->order_note }}",
                "insuranceValue": "0"

            },
            function(res) {
                if (res[0]["isSuccess"] == "true") {
                    $.ajax({
                        url: "/admin/order/ship/" + id,
                        type: 'GET',
                        success: function(res) {
                            document.getElementById('ship-button').innerHTML = 'Shipped';
                            document.getElementById('cancel-button').style.visibility = 'hidden';
                            document.getElementById('book-button').style.visibility = 'hidden';
                        }
                    });
                };
                alert(res[0]["message"]);
            }
        );


    }

    function shipIt(id) {
        $.ajax({
            url: "/admin/order/ship/" + id,
            type: 'GET',
            success: function(res) {
                document.getElementById('ship-button').innerHTML = 'Shipped';
                document.getElementById('cancel-button').style.visibility = 'hidden';
                document.getElementById('book-button').style.visibility = 'hidden';
            }
        });

    }

    function cancelIt(id) {
        $.ajax({
            url: "/admin/order/cancel/" + id,
            type: 'GET',
            success: function(res) {
                document.getElementById('cancel-button').innerHTML = 'Cancelled';
                document.getElementById('ship-button').style.visibility = 'hidden';
            }
        });
    }
</script>
