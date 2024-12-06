@extends('layouts.dashboard')

@section('root-page', 'Manage Purchase')
@section('page-title', 'Edit Purchase')

@section('content')

    <!-- Row start -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Control starts -->
            <div class="card">
                <div class="card-header">
                    <div class="col-lg-12">
                        <h5 class="card-header-text">Form Edit Purchase</h5>
                    </div>
                </div>

                <div class="card-block">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputProductname" class="form-control-label">Product Name</label>
                                    <input type="text" class="form-control" id="exampleInputProductname"
                                        name="product_name" aria-describedby="Productname" placeholder="Enter Productname"
                                        value="{{ $purchasings->product->product_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleSuppliername" class="form-control-label">Supplier Name</label>
                                    <select class="form-control" id="exampleSuppliername" name="supplier_name">
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}"
                                                {{ $supplier->id == $purchasings->supplier_id ? 'selected' : '' }}>
                                                {{ $supplier->supplier_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleStatus" class="form-control-label">Status</label>
                                    <select class="form-control" id="exampleStatus" name="">
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status }}"
                                                {{ $purchasings->status == $status ? 'selected' : '' }}>
                                                {{ $status }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPurchaseQuantity" class="form-control-label">Purchase
                                        Quantity</label>
                                    <input type="number" class="form-control" id="exampleInputPurchaseQuantity"
                                        name="quantity" aria-describedby="PurchaseQuantity"
                                        placeholder="Enter Purchase Quantity" value="{{ $purchasings->quantity }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleWarehousename" class="form-control-label">Warehouse Name</label>
                                    <select class="form-control" id="exampleWarehousename" name="warehouse_name">
                                        @foreach ($warehouses as $warehouse)
                                            <option value="{{ $warehouse->id }}"
                                                {{ $warehouse->id == $purchasings->warehouse_id ? 'selected' : '' }}>
                                                {{ $warehouse->warehouse_name }}
                                            </option>
                                        @endforeach
                                    </select>
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
