@extends('layouts.dashboard')

@section('page-title', 'Manage Order & Delivery')

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
                                <th style="width: 15%;">Customer Name</th>
                                <th style="width: 20%;">Address</th>
                                <th style="width: 19%;">Status</th>
                                <th class="text-center" style="width: 30%; ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Comic-Naruto</td>
                                <td>Prisandut</td>
                                <td>Mojo, Surabaya</td>
                                <td>Delivered</td>
                                <td class="text-center">
                                    <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip"
                                        data-placement="top" title="" href="#" role="button"
                                        data-original-title="ship ">
                                        <i class="ti-truck"></i>
                                    </a>
                                    <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip"
                                        data-placement="top" title="" href="#" role="button"
                                        data-original-title="delivered ">
                                        <i class="ti-truck"></i>
                                    </a>
                                    <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip"
                                        data-placement="top" title="" href="#" role="button"
                                        data-original-title="failed ">
                                        <i class="ti-truck"></i>
                                    </a>
                                    <a class="btn btn-danger waves-effect waves-light" data-toggle="tooltip"
                                        data-placement="top" title="" href="#" role="button"
                                        data-original-title="cancel ">
                                        <i class="ti-close"></i>
                                    </a>
                                    <a class="btn btn-warning waves-effect waves-light" data-toggle="tooltip"
                                        data-placement="top" title="" href="/edit-delivery" role="button"
                                        data-original-title="edit ">
                                        <i class="ti-pencil"></i>
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
