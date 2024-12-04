@extends('layouts.dashboard')

@section('root-page', 'Kel1 Bookstore')
@section('page-title', 'Order History')

@section('content')
    {{-- Delivery Analytics --}}
    <div class="row dashboard-header">
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Total Order</span>
                <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-truck text-success-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Pending</span>
                <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-package text-info-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Shipped</span>
                <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-direction-alt text-danger-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Delivered</span>
                <h2 class="dashboard-total-products">4500</h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-wallet text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Failed</span>
                <h2 class="dashboard-total-products">37,500</h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-shopping-cart text-warning-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Canceled</span>
                <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-archive text-danger-color"></i>
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
                                <th style="width: 15%;">Product Name</th>
                                <th style="width: 20%;">Issue Date</th>
                                <th style="width: 20%;">Due Date</th>
                                <th style="width: 15%;">Quantity</th>
                                <th style="width: 19%;">Status</th>
                                <th style="width: 19%;">Invoice</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Comic-Naruto</td>
                                <td>04 Des 2024</td>
                                <td>06 Des 2024</td>
                                <td>10</td>
                                <td>Delivered</td>
                                <td class="text-center">
                                    <a class="btn btn-info waves-effect waves-light" data-toggle="tooltip"
                                        data-placement="top" title="" href="/detail-report" role="button"
                                        data-original-title="detail ">
                                        <i class="ti-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Order & Delivery table ends -->
@endsection
