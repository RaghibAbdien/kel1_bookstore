@extends('layouts.dashboard')

@section('page-title', 'Sales & Transactions')

@section('content')
    {{-- Product Variant start --}}
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">Product Variant</h5>
                </div>
                <!--  start card-block  -->
                <div class="card-block button-list">
                    <!-- Biography -->
                    <button type="button" class="btn btn-default waves-effect">
                        Biography
                        <span class="badge">70</span>
                    </button>

                    <!-- Comics -->
                    <button type="button" class="btn btn-primary waves-effect waves-light">
                        Comics
                        <span class="badge">90</span>
                    </button>

                    <!-- Culture -->
                    <button type="button" class="btn btn-success waves-effect waves-light">
                        Culture
                        <span class="badge">70</span>
                    </button>

                    <!-- Self-Dev -->
                    <button type="button" class="btn btn-warning waves-effect waves-light">
                        Self-Dev
                        <span class="badge">170</span>
                    </button>

                    <!-- Economics -->
                    <button type="button" class="btn btn-danger waves-effect waves-light">
                        Economics
                        <span class="badge">07</span>
                    </button>

                    <!-- Tech -->
                    <button type="button" class="btn btn-info waves-effect waves-light">
                        Tech
                        <span class="badge">80</span>
                    </button>

                    <!-- Geography -->
                    <button type="button" class="btn btn-info waves-effect waves-light">
                        Geography
                        <span class="badge">80</span>
                    </button>

                    <!-- History -->
                    <button type="button" class="btn btn-default waves-effect">
                        History
                        <span class="badge">70</span>
                    </button>

                    <!-- Language -->
                    <button type="button" class="btn btn-primary waves-effect waves-light">
                        Language
                        <span class="badge">90</span>
                    </button>

                    <!-- Novel -->
                    <button type="button" class="btn btn-success waves-effect waves-light">
                        Novel
                        <span class="badge">70</span>
                    </button>

                    <!-- Religion -->
                    <button type="button" class="btn btn-warning waves-effect waves-light">
                        Religion
                        <span class="badge">170</span>
                    </button>

                    <!-- Science -->
                    <button type="button" class="btn btn-danger waves-effect waves-light">
                        Science
                        <span class="badge">07</span>
                    </button>

                </div>
                <!-- end of card-block  -->
            </div>
            <!-- end of card -->
        </div>
        <!-- end of col-sm-12 -->
    </div>
    {{-- Product Variant end --}}
    <div class="row">
        {{-- Product Table Start --}}
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="col-lg-12">
                        <h5 class="card-header-text">Product Table</h5>
                    </div>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table class="table-hover table">
                                <thead>
                                    <tr>
                                        <th style="width: 1%;">#</th>
                                        <th style="width: 25%;">Product Name</th>
                                        <th style="width: 15%;">Stock</th>
                                        <th style="width: 15%;">Price</th>
                                        <th class="text-center" style="width: 20%; ">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Comic-Naruto</td>
                                        <td>10</td>
                                        <td>$10.00</td>
                                        <td class="text-center">
                                            <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip"
                                                data-placement="top" title="" href="#" role="button"
                                                data-original-title="add ">
                                                <i class="ti-plus"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Product Table End --}}

        <div class="col-md-6">
            <div class="row">
                <div class="col-lg-12">
                    {{-- Order Table Start --}}
                    <div class="card">
                        <div class="card-header">
                            <div class="col-lg-12">
                                <h5 class="card-header-text">Order Table</h5>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-12 table-responsive">
                                    <table class="table-hover table">
                                        <thead>
                                            <tr>
                                                <th style="width: 1%;">#</th>
                                                <th style="width: 25%;">Product Name</th>
                                                <th style="width: 15%;">Quantity</th>
                                                <th style="width: 15%;">Total</th>
                                                <th class="text-center" style="width: 20%; ">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Comic-Naruto</td>
                                                <td>10</td>
                                                <td>$10.00</td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary waves-effect waves-light"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        href="#" role="button" data-original-title="add ">
                                                        <i class="ti-plus"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Order Table End --}}
                    {{-- POS Start --}}
                    <div class="card">
                        <div class="card-header">
                            <div class="col-lg-12">
                                <h5 class="card-header-text">Point of Sales</h5>
                            </div>
                        </div>
                        <div class="card-block">
                            <form>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleCustomerName" class="form-control-label">Customer
                                                Name</label>
                                            <select class="form-control" id="exampleCustomerName" name="">
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputProductname" class="form-control-label">Product
                                                Name</label>
                                            <input type="text" class="form-control" id="exampleInputProductname"
                                                name="product_name" aria-describedby="Productname"
                                                placeholder="Enter Productname">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputQuantity" class="form-control-label">Product
                                                Quantity</label>
                                            <input type="number" class="form-control" id="exampleInputQuantity"
                                                name="quantity" aria-describedby="Quantity" placeholder="Enter Quantity">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputQuantity" class="form-control-label">Amount</label>
                                            <input type="number" class="form-control" id="exampleInputQuantity"
                                                name="quantity" aria-describedby="Quantity" placeholder="Enter Quantity">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleTax" class="form-control-label">Tax</label>
                                            <select class="form-control" id="exampleTax" name="">
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
                                            <label for="exampleShipping" class="form-control-label">Shipping</label>
                                            <select class="form-control" id="exampleShipping" name="">
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
                                            <label for="exampleDiscount" class="form-control-label">Discount</label>
                                            <select class="form-control" id="exampleDiscount" name="">
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
                                    <div class="card">
                                        <div class="card-block">
                                            <dl class="dl-horizontal row">
                                                <dt class="col-sm-9 font-weight-normal">Sub Total</dt>
                                                <dd class="col-sm-3">: $737.00</dd>
                                                <dt class="col-sm-9 font-weight-normal">Discount</dt>
                                                <dd class="col-sm-3">: $737.00</dd>
                                                <dt class="col-sm-9 font-weight-normal">Estimated Tax</dt>
                                                <dd class="col-sm-3">: $737.00</dd>
                                            </dl>
                                            <hr>
                                            <dl class="dl-horizontal row">
                                                <dt class="col-sm-9">Grand Amount</dt>
                                                <dd class="col-sm-3 font-weight-bold">: $737.00</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleCustomerName" class="form-control-label">Payment
                                                Method</label>
                                            <select class="form-control" id="exampleCustomerName" name="">
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
                                        class="btn btn-primary waves-effect waves-light m-r-30 f-right">Payment</button>
                                    <button type="reset"
                                        class="btn btn-danger waves-effect waves-light m-r-30 f-right">Void</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- POS End --}}
                </div>
            </div>
        </div>

    </div>
@endsection
