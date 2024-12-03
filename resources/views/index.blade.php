@extends('layouts.dashboard')

@section('page-title', 'Dashboard')

@section('content')
    <!-- statistics -->
    <div class="row dashboard-header">
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Employee</span>
                <h2 class="dashboard-total-products">4500</h2>
                <span class="label label-primary">Views</span><a href="">More Info</a>
                <div class="side-box">
                    <i class="ti-id-badge text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Customer</span>
                <h2 class="dashboard-total-products">37,500</h2>
                <span class="label label-warning">Views</span><a href="">More Info</a>
                <div class="side-box">
                    <i class="ti-user text-warning-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Product Variant</span>
                <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                <span class="label label-danger">Views</span><a href="">More Info</a>
                <div class="side-box">
                    <i class="ti-direction-alt text-danger-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Products</span>
                <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                <span class="label label-info">Views</span><a href="">More Info</a>
                <div class="side-box">
                    <i class="ti-package text-info-color"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row dashboard-header">
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Sales</span>
                <h2 class="dashboard-total-products">4500</h2>
                <span class="label label-primary">Sales</span><a href="">More Info</a>
                <div class="side-box">
                    <i class="ti-wallet text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Order</span>
                <h2 class="dashboard-total-products">37,500</h2>
                <span class="label label-warning">Sales</span><a href="">More Info</a>
                <div class="side-box">
                    <i class="ti-shopping-cart text-warning-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Stock Available</span>
                <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                <span class="label label-danger">Views</span><a href="">More Info</a>
                <div class="side-box">
                    <i class="ti-archive text-danger-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Delivery</span>
                <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                <span class="label label-success">Sales</span><a href="">More Info</a>
                <div class="side-box">
                    <i class="ti-truck text-success-color"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- end statistics -->
@endsection
