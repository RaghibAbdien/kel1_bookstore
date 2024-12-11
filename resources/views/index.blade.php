@extends('layouts.dashboard')

@section('page-title', 'Dashboard')

@section('content')
    <!-- statistics -->
    <div class="row dashboard-header">
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Employee</span>
                <h4 class="dashboard-total-products">{{ $employee }}</h4>
                <div class="side-box">
                    <i class="ti-id-badge text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Customer</span>
                <h4 class="dashboard-total-products">{{ $customer }}</h4>
                <div class="side-box">
                    <i class="ti-user text-warning-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Product</span>
                <h4 class="dashboard-total-products"><span>{{ $product }}</span></h4>
                <div class="side-box">
                    <i class="ti-tag text-danger-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Transaction</span>
                <h4 class="dashboard-total-products"><span>{{ $transaction }}</span></h4>
                <div class="side-box">
                    <i class="ti-credit-card text-info-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Sales</span>
                <h4 class="dashboard-total-products">$ <span>{{ $sales }}</span></h4>
                <div class="side-box">
                    <i class="ti-shopping-cart text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Orders</span>
                <h4 class="dashboard-total-products">$ <span>{{ $orders }}</span></h4>
                <div class="side-box">
                    <i class="ti-wallet text-warning-color"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
