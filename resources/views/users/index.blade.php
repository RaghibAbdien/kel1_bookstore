@extends('layouts.dashboard')

@section('page-title', 'User Management')

@section('content')
    <!-- Hover effect table starts -->
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
    <!-- Hover effect table ends -->
@endsection
