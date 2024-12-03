@extends('layouts.dashboard')

@section('page-title', 'Manage User')

@section('content')
    {{-- User Analytics --}}
    <div class="row dashboard-header">
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Total <br> Employee</span>
                <h2 class="dashboard-total-products">4500</h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-wallet text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Customer <br> Service</span>
                <h2 class="dashboard-total-products">4500</h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-wallet text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Logistic <br> Manager</span>
                <h2 class="dashboard-total-products">4500</h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-wallet text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Purchasing <br> Agent</span>
                <h2 class="dashboard-total-products">4500</h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-wallet text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Delivery <br> Driver</span>
                <h2 class="dashboard-total-products">4500</h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-wallet text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Head <br> Manager</span>
                <h2 class="dashboard-total-products">4500</h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-wallet text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>HR Manager</span>
                <h2 class="dashboard-total-products">4500</h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-wallet text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Cashier</span>
                <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-direction-alt text-danger-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Admin</span>
                <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-package text-info-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Customer</span>
                <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-truck text-success-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Total User</span>
                <h2 class="dashboard-total-products">4500</h2>
                <a href="">Show</a>
                <div class="side-box">
                    <i class="ti-wallet text-primary-color"></i>
                </div>
            </div>
        </div>
    </div>
    {{-- User Analytics --}}
    <!-- User table starts -->
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=""
                href="/add-user" role="button" data-original-title="Add User">
                <i class="ti-plus"></i> Add User
            </a>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table class="table-hover table">
                        <thead>
                            <tr>
                                <th style="width: 1%;">#</th>
                                <th style="width: 20%;">Fullname</th>
                                <th style="width: 20%;">Email</th>
                                <th style="width: 12%;">Role</th>
                                <th style="width: 20%;">Registration Date</th>
                                <th style="width: 7%;">Status</th>
                                <th class="text-center" style="width: 20%; ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Prisalindut</td>
                                <td>prisandut@gmail.com</td>
                                <td>Admin</td>
                                <td>3 Des 2024</td>
                                <td>Active</td>
                                <td class="text-center">
                                    <a class="btn btn-warning waves-effect waves-light" data-toggle="tooltip"
                                        data-placement="top" title="" href="/edit-user" role="button"
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
    <!-- User table ends -->
@endsection
