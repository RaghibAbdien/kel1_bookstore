@extends('layouts.dashboard')

@section('page-title', 'User Management')

@section('content')
    <div class="row">
        <div class="main-header">
            <h4>User Management</h4>
        </div>
    </div>
    <!-- Hover effect table starts -->
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=""
                href="#" role="button" data-original-title="Add User">
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
                                <th style="width: 25%;">Email</th>
                                <th style="width: 20%;">Registration Date</th>
                                <th style="width: 14%;">Role</th>
                                <th class="text-center" style="width: 20%; ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Prisalindut</td>
                                <td>prisandut@gmail.com</td>
                                <td>3 Des 2024</td>
                                <td>Admin</td>
                                <td class="text-center">
                                    <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip"
                                        data-placement="top" title="" href="#" role="button"
                                        data-original-title="view ">
                                        <i class="ti-eye"></i>
                                    </a>
                                    <a class="btn btn-warning waves-effect waves-light" data-toggle="tooltip"
                                        data-placement="top" title="" href="#" role="button"
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
    <!-- Hover effect table ends -->
@endsection
