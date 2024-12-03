@extends('layouts.dashboard')

@section('page-title', 'Manage Purchasing')

@section('content')
    <!-- Filter Purchase start -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Control starts -->
            <div class="card">
                <div class="card-header">
                    <div class="col-lg-12">
                        <h5 class="card-header-text">Filter</h5>
                    </div>
                </div>

                <div class="card-block">
                    <form>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleProductVariant" class="form-control-label">Product Variant</label>
                                <select class="form-control" id="exampleProductVariant" name="">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleBalance" class="form-control-label">Balance</label>
                                <select class="form-control" id="exampleBalance" name="">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleStatus" class="form-control-label">Status</label>
                                <select class="form-control" id="exampleStatus" name="">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Form Control ends -->
        </div>
    </div>
    <!-- Filter Purchase end -->
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
