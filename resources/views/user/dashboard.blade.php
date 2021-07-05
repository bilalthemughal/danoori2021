@extends('frontend.layout')

@section('title')
Past Orders &#8211; Danoori
@endsection

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    {{-- <link rel="stylesheet" href="{{asset('page-level/css/image-popup.css')}}"> --}}
@stop

@section('content')
    {{-- @include('user.partials.orderDetailModal') --}}
    @livewire('order-detail-modal')

    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="/"><i class="ci-home"></i>Home</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active">Orders History
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">My orders</h1>
            </div>
        </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            @include('user.partials.sidebar')
            <!-- Content  -->
            <section class="col-lg-8">
                <!-- Toolbar-->
                <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
                    <div class="d-flex align-items-center">
                        <h3 class="text-primary">My orders</h3>
                    </div>
                    <a class="btn btn-primary btn-sm d-none d-lg-inline-block" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ci-sign-out me-2"></i>Sign out</a>
                </div>
                <!-- Orders list-->
                <div class="table-responsive fs-md mb-4">
                    <table class="table table-hover mb-0" id="orders-table">
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Date Purchased</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td class="py-3">
                                        <a class="nav-link-style fw-medium fs-sm"
                                        href="#"    
                                        onclick="populateModal('{{ $order->order_id }}')">
                                            {{ $order->order_id }}
                                        </a>
                                    </td>

                                    <td class="py-3">{{ $order->created_at->format('M d, Y') }}</td>
                                    <td class="py-3">
                                        @if ($order->status === 0)
                                            <span class="badge bg-info m-0">In Progress</span>
                                        @elseif ($order->status === 1)
                                            <span class="badge bg-success m-0">Shipped</span>
                                        @else
                                            <span class="badge bg-danger m-0">Cancelled</span>
                                        @endif
                                    </td>
                                    <td class="py-3">Rs. {{ number_format($order->total) }}</td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No data exists.</td>
                                </tr>

                            @endforelse


                        </tbody>
                    </table>
                </div>

            </section>
        </div>
    </div>
@endsection

@section('extra-js')
<script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>

<script>
    $('#orders-table').DataTable({});

    function populateModal(e) {
        Livewire.emit('modalOpened', e)
    }

    Livewire.on('openModal', () => {
        $('#order-details').modal('show');
    })

</script>

@endsection
