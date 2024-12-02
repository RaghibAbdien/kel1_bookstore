@extends('layouts.dashboard')

@section('page-title', 'Manage Role & Access')

@section('content')
    <!-- Hover effect table starts -->
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=""
                href="/add-role" role="button" data-original-title="Add User">
                <i class="ti-plus"></i> Add Role
            </a>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table class="table-hover table">
                        <thead>
                            <tr>
                                <th style="width: 1%;">#</th>
                                <th style="width: 20%;">Role Name</th>
                                <th style="width: 40%;">Access Level</th>
                                <th class="text-center" style="width: 20%; ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Admin</td>
                                <td>create, read, update, delete</td>
                                <td class="text-center">
                                    <a class="btn btn-warning waves-effect waves-light" data-toggle="tooltip"
                                        data-placement="top" title="" href="/edit-role" role="button"
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
