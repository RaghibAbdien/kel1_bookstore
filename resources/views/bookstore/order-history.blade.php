@extends('layouts.dashboard')

@section('root-page', 'Kel1 Bookstore')
@section('page-title', 'Order History')

@section('content')
    {{-- Delivery Analytics --}}
    <div class="row dashboard-header">
        <div class="col-lg-4 col-md-6">
            <div class="card dashboard-product">
                <span>Total Order</span>
                <h2 class="dashboard-total-products"><span>{{ $statusCount }}</span></h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card dashboard-product">
                <span>Confirmed</span>
                <h2 class="dashboard-total-products"><span>{{ $statusConfirmed }}</span></h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card dashboard-product">
                <span>UNCONFIRMED</span>
                <h2 class="dashboard-total-products"><span>{{ $statusUnConfirmed }}</span></h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
    </div>
    {{-- Delivery Analytics --}}
    <!-- Order & Delivery table starts -->
    <div class="card">
        <div class="card-block">
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table class="table-hover table">
                        <thead>
                            <tr>
                                <th style="width: 1%;">#</th>
                                <th style="width: 35%;">Product Name</th>
                                <th style="width: 15%;">Quantity</th>
                                <th style="width: 20%;">Order Date</th>
                                <th style="width: 19%;">Status</th>
                                <th style="width: 19%;">Invoice</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bookstores as $bookstore)
                                @foreach ($bookstore->customer_order as $order)
                                    <tr>
                                        <td>{{ $loop->parent->iteration }}</td>
                                        <td>{{ $order->product->product_name ?? 'No Product' }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $bookstore->created_at->format('Y-m-d H:i:s') }}</td>
                                        <td>
                                            <label
                                                class="label label-lg {{ $bookstore->status_delivery ? 'label-success' : 'label-danger' }}">
                                                {{ $bookstore->status_delivery ? 'CONFIRMED' : 'UNCONFIRMED' }}
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-info waves-effect waves-light" data-toggle="tooltip"
                                                data-placement="top"
                                                href="{{ route('show-bookstore-invoice', $bookstore->id) }}" role="button"
                                                title="Detail">
                                                <i class="ti-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No data available</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Order & Delivery table ends -->
@endsection
