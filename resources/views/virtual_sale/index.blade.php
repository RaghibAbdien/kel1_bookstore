@extends('layouts.dashboard')

@section('page-title', 'Manage Virtual Sale')

@section('content')
    {{-- Delivery Analytics --}}
    <div class="row dashboard-header">
        <div class="col-md-4">
            <div class="card dashboard-product">
                <span>Total Order</span>
                <h2 class="dashboard-total-products"><span>{{ $statusCount }}</span></h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-truck text-success-color"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card dashboard-product">
                <span>Confirmed</span>
                <h2 class="dashboard-total-products"><span>{{ $statusConfirmed }}</span></h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-package text-info-color"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card dashboard-product">
                <span>Unconfirmed</span>
                <h2 class="dashboard-total-products"><span>{{ $statusUnConfirmed }}</span></h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-direction-alt text-danger-color"></i>
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
                                <th style="width: 20%;">Customer Name</th>
                                <th style="width: 30%;">Customer Address</th>
                                <th style="width: 15%;">Customer Phone</th>
                                <th style="width: 15%;">Order Date</th>
                                <th style="width: 14%;">Status</th>
                                <th class="text-center" style="width: 5%; ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bookstores as $bookstore)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bookstore->user->name }}</td>
                                    <td>{{ $bookstore->user->address }}</td>
                                    <td>{{ $bookstore->user->phone }}</td>
                                    <td>{{ $bookstore->created_at }}</td>
                                    <td>
                                        <label
                                            class="label label-lg {{ $bookstore->status_delivery ? 'label-success' : 'label-danger' }}">
                                            {{ $bookstore->status_delivery ? 'CONFIRMED' : 'UNCONFIRMED' }}
                                        </label>
                                    </td>
                                    <td>
                                        <a class="btn btn-info waves-effect waves-light" data-toggle="tooltip"
                                            data-placement="top" title=""
                                            href="{{ route('show-virtual-invoice', $bookstore->id) }}" role="button"
                                            data-original-title="detail ">
                                            <i class="ti-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Customer Orders Found</td>
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
