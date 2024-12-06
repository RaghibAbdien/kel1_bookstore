@extends('layouts.dashboard')

@section('page-title', 'Manage Tax And Pricing')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <!-- Menu table starts -->
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table class="table-hover table">
                                <thead>
                                    <tr>
                                        <th style="width: 1%;">#</th>
                                        <th style="width: 20%;">Menu Name</th>
                                        <th class="text-center" style="width: 20%; ">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu table ends -->
        </div>
        <div class="col-md-6">
            <!-- Role table starts -->
            <div class="card">
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
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Role table ends -->
        </div>
    </div>
@endsection
