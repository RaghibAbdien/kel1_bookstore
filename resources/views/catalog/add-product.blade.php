@extends('layouts.dashboard')

@section('root-page', 'Manage Catalog')
@section('page-title', 'Add Product')

@section('content')

    <!-- Row start -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Control starts -->
            <div class="card">
                <div class="card-header">
                    <div class="col-lg-12">
                        <h5 class="card-header-text">Form Add Product</h5>
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
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleProductVariant" class="form-control-label">Product Variant</label>
                                    <select class="form-control" id="exampleProductVariant" name="product_variant">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit"
                                class="btn btn-primary waves-effect waves-light m-r-30 f-right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Form Control ends -->
        </div>
    </div>
    <!-- Row end -->
@endsection
