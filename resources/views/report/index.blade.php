@extends('layouts.dashboard')

@section('page-title', 'Reports & Analytics')

@section('content')
    {{-- Report Analytics --}}
    <div class="row dashboard-header">
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Employee</span>
                <h2 class="dashboard-total-products">4500</h2>
                <span class="label label-primary">Views</span><a href="">Show Report</a>
                <div class="side-box">
                    <i class="ti-id-badge text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Total Invoice</span>
                <h2 class="dashboard-total-products">37,500</h2>
                <span class="label label-warning">Views</span><a href="">Show Report</a>
                <div class="side-box">
                    <i class="ti-user text-warning-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Stock Invoice</span>
                <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                <span class="label label-danger">Views</span><a href="">Show Report</a>
                <div class="side-box">
                    <i class="ti-direction-alt text-danger-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Warehouse Invoice</span>
                <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                <span class="label label-info">Views</span><a href="">Show Report</a>
                <div class="side-box">
                    <i class="ti-package text-info-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Purchasing Invoice</span>
                <h2 class="dashboard-total-products">4500</h2>
                <span class="label label-primary">Sales</span><a href="">Show Report</a>
                <div class="side-box">
                    <i class="ti-wallet text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Delivery Invoice</span>
                <h2 class="dashboard-total-products">37,500</h2>
                <span class="label label-warning">Sales</span><a href="">Show Report</a>
                <div class="side-box">
                    <i class="ti-shopping-cart text-warning-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Failed Invoice</span>
                <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                <span class="label label-danger">Views</span><a href="">Show Report</a>
                <div class="side-box">
                    <i class="ti-archive text-danger-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Successful Invoice</span>
                <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                <span class="label label-success">Sales</span><a href="">Show Report</a>
                <div class="side-box">
                    <i class="ti-truck text-success-color"></i>
                </div>
            </div>
        </div>
    </div>
    {{-- Report Analytics --}}

    <!-- Report table starts -->
    <div class="card">
        <div class="card-block">
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table class="table-hover table">
                        <thead>
                            <tr>
                                <th style="width: 1%;">#</th>
                                <th style="width: 10%;">Invoice ID</th>
                                <th style="width: 10%;">Transaction</th>
                                <th style="width: 15%;">Employee</th>
                                <th style="width: 15%;">Product Name</th>
                                <th style="width: 15%;">Date Added</th>
                                <th style="width: 20%;">Status</th>
                                <th class="text-center" style="width: 14%; ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>#4567</td>
                                <td>Purchasing</td>
                                <td>Prisalindut</td>
                                <td>Comic-Naruto</td>
                                <td>03 Des 2024</td>
                                <td>Need Restock</td>
                                <td class="text-center">
                                    <a class="btn btn-info waves-effect waves-light" data-toggle="tooltip"
                                        data-placement="top" title="" href="/detail-report" role="button"
                                        data-original-title="detail ">
                                        <i class="ti-eye"></i>
                                    </a>
                                    <a class="btn btn-warning waves-effect waves-light" data-toggle="tooltip"
                                        data-placement="top" title="" href="/edit-invoice" role="button"
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
    <!-- Report table ends -->
@endsection
