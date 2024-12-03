@extends('layouts.dashboard')

@section('root-page', 'Manage Warehouse')
@section('page-title', 'Edit Warehouse Stock')

@section('content')

    <!-- Row start -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Control starts -->
            <div class="card">
                <div class="card-header">
                    <div class="col-lg-12">
                        <h5 class="card-header-text">Form Edit Warehouse Stock</h5>
                    </div>
                </div>

                <div class="card-block">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputProductname" class="form-control-label">Product Name</label>
                                    <input type="text" class="form-control" id="exampleInputProductname"
                                        name="product_name" aria-describedby="Productname" placeholder="Enter Productname">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputQuantity" class="form-control-label">Warehouse Quantity</label>
                                    <input type="number" class="form-control" id="exampleInputQuantity" name="quantity"
                                        aria-describedby="Quantity" placeholder="Enter Quantity">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputRestockThreshodl" class="form-control-label">Restock
                                        Threshold</label>
                                    <input type="number" class="form-control" id="exampleInputRestockThreshodl"
                                        name="restock_threshold" aria-describedby="RestockThreshodl"
                                        placeholder="Enter RestockThreshodl">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit"
                                class="btn btn-primary waves-effect waves-light m-r-30 f-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Form Control ends -->
        </div>
    </div>
    <!-- Row end -->
@endsection
