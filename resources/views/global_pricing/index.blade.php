@extends('layouts.dashboard')

@section('page-title', 'Manage Tax And Pricing')

@section('content')
    <div class="row">
        <!-- Form Tax starts -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="col-lg-12">
                        <h5 class="card-header-text">Form Edit Tax</h5>
                    </div>
                </div>
                <div class="card-block">
                    <form id="formEditTax" action="" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" id="exampleInputTax" name="tax"
                                        aria-describedby="Tax" placeholder="Enter Tax" value="{{ $tax }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="submit"
                                    class="btn btn-primary waves-effect waves-light m-r-30 f-right">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Form Tax ends -->
        <!-- Form Shiping starts -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="col-lg-12">
                        <h5 class="card-header-text">Form Edit Shiping</h5>
                    </div>
                </div>
                <div class="card-block">
                    <form id="formEditShiping" action="" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" id="exampleInputShiping" name="shiping"
                                        aria-describedby="Shiping" placeholder="Enter Shiping" value="{{ $shiping }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="submit"
                                    class="btn btn-primary waves-effect waves-light m-r-30 f-right">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Form Shiping ends -->
        <!-- Form Discount starts -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="col-lg-12">
                        <h5 class="card-header-text">Form Edit SDiscount</h5>
                    </div>
                </div>
                <div class="card-block">
                    <form id="formEditDiscount" action="" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" id="exampleInputDiscount" name="discount"
                                        aria-describedby="Discount" placeholder="Enter Discount"
                                        value="{{ $discount }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="submit"
                                    class="btn btn-primary waves-effect waves-light m-r-30 f-right">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Form Discount ends -->
    </div>
@endsection
