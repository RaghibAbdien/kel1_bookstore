@extends('layouts.dashboard')

@section('page-title', 'Manage Purchasing')

@section('content')
    {{-- Purchase Analytics --}}
    <div class="row dashboard-header">
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>In Stock</span>
                <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-truck text-success-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Low of Stock</span>
                <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-package text-info-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Out of Stock</span>
                <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-direction-alt text-danger-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Need Restock</span>
                <h2 class="dashboard-total-products">4500</h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-wallet text-primary-color"></i>
                </div>
            </div>
        </div>
    </div>
    {{-- Purchase Analytics --}}
    <!-- Purchase table starts -->
    <div class="card">
        <div class="card-header">
            <div class="col-lg-12">
                <p class="card-header-text f-right">Note: Balance = Warehouse Stock - Restock Threshold</p>
            </div>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table class="table-hover table">
                        <thead>
                            <tr>
                                <th style="width: 1%;">#</th>
                                <th style="width: 20%;">Product Name</th>
                                <th style="width: 20%;">Supplier</th>
                                <th style="width: 20%;">Balance</th>
                                <th style="width: 19%;">Status</th>
                                <th class="text-center" style="width: 20%; ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Comic-Naruto</td>
                                <td>Supplier Satu</td>
                                <td>+200</td>
                                <td>Need Restock</td>
                                <td class="text-center">
                                    <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip"
                                        data-placement="top" title="" href="/add-purchase-quantity" role="button"
                                        data-original-title="add ">
                                        <i class="ti-plus"></i>
                                    </a>
                                    <a class="btn btn-warning waves-effect waves-light" data-toggle="tooltip"
                                        data-placement="top" title="" href="/edit-purchase-quantity" role="button"
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
    <!-- Purchase table ends -->
@endsection
