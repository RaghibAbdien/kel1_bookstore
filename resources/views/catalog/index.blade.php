@extends('layouts.dashboard')

@section('page-title', 'Manage Catalog')

@section('content')
    {{-- Catalog Analytics --}}
    <div class="row dashboard-header">
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Biography</span>
                <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-truck text-success-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Comics</span>
                <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-package text-info-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Culture</span>
                <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-direction-alt text-danger-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Self-Dev</span>
                <h2 class="dashboard-total-products">4500</h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-wallet text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Economics</span>
                <h2 class="dashboard-total-products">4500</h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-wallet text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Geography</span>
                <h2 class="dashboard-total-products">4500</h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-wallet text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>History</span>
                <h2 class="dashboard-total-products">4500</h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-wallet text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Language</span>
                <h2 class="dashboard-total-products">4500</h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-wallet text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Novel</span>
                <h2 class="dashboard-total-products">4500</h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-wallet text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Religion</span>
                <h2 class="dashboard-total-products">4500</h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-wallet text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Science</span>
                <h2 class="dashboard-total-products">4500</h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-wallet text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Technology</span>
                <h2 class="dashboard-total-products">4500</h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-wallet text-primary-color"></i>
                </div>
            </div>
        </div>
    </div>
    {{-- Catalog Analytics --}}
    <!-- Catalog table starts -->
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=""
                href="/add-product" role="button" data-original-title="Add User">
                <i class="ti-plus"></i> Add Product
            </a>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table class="table-hover table">
                        <thead>
                            <tr>
                                <th style="width: 1%;">#</th>
                                <th style="width: 40%;">Product Name</th>
                                <th style="width: 39%;">Product Variant</th>
                                <th class="text-center" style="width: 20%; ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Naruto</td>
                                <td>Comic</td>
                                <td class="text-center">
                                    <a class="btn btn-warning waves-effect waves-light" data-toggle="tooltip"
                                        data-placement="top" title="" href="/edit-product" role="button"
                                        data-original-title="edit ">
                                        <i class="ti-pencil"></i>
                                    </a>
                                    <a class="btn btn-danger waves-effect waves-light" data-toggle="tooltip"
                                        data-placement="top" title="" href="#" role="button"
                                        data-original-title="delete ">
                                        <i class="ti-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Catalog table ends -->
@endsection
