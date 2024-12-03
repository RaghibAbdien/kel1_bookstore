@extends('layouts.dashboard')

@section('root-page', 'Reports & Analytics')
@section('page-title', 'Invoice')

@section('content')
    {{-- Invoice start --}}
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <div class="row" style="background-color: #D2DBDF">
                        <div class="col-md-6">
                            <div class="card-block">
                                <dl class="dl-horizontal row">

                                    <dt class="col-sm-12">
                                        <img src="assets/images/logo.png" alt="Logo" height="50rem">
                                    </dt>

                                    <dt class="col-sm-12">
                                        <h4 class="m-t-15">Prisandut</h4>
                                    </dt>

                                    <dt class="col-sm-12 font-weight-normal">
                                        <span>Purchasing Agent</span>
                                    </dt>

                                    <dt class="col-sm-12 font-weight-normal">
                                        <address class="m-t-15">
                                            1729 Bangor St, Houlton, ME, 04730, USA<br>
                                            <strong>Phone:</strong> +1(142)-532-9109
                                        </address>
                                    </dt>
                                </dl>
                                <hr>
                                <dl class="dl-horizontal row">

                                    <dt class="col-sm-12">
                                        <h5>Issue From :</h5>
                                    </dt>

                                    <dt class="col-sm-12">
                                        <h4>Supplier Satu</h4>
                                    </dt>

                                    <dt class="col-sm-12 font-weight-normal">
                                        <address>
                                            1729 Bangor St, Houlton, ME, 04730, USA<br>
                                            <strong>Phone:</strong> +1(142)-532-9109
                                        </address>
                                    </dt>
                                </dl>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-block">
                                <dl class="dl-horizontal row">
                                    <dt class="col-sm-6 m-b-10">Invoice ID</dt>
                                    <dd class="col-sm-6">: <strong>#INV-0758267/90</strong></dd>

                                    <dt class="col-sm-6 m-b-10">Issue Date</dt>
                                    <dd class="col-sm-6">: 23 April 2024</dd>

                                    <dt class="col-sm-6 m-b-10">Due Date</dt>
                                    <dd class="col-sm-6">: 26 April 2024</dd>

                                    <dt class="col-sm-6 m-b-10">Product Varian</dt>
                                    <dd class="col-sm-6">: 1</dd>

                                    <dt class="col-sm-6 m-b-10">Amount</dt>
                                    <dd class="col-sm-6">: $737.00</dd>

                                    <dt class="col-sm-6 m-b-10">Status</dt>
                                    <dd class="col-sm-6 d-flex">: <div class="label-main m-l-2"><label
                                                class="label label-lg label-success">SUCCESSFUL</label></div>
                                    </dd>
                                </dl>
                                <hr>
                                <dl class="dl-horizontal row">
                                    <dt class="col-sm-12">
                                        <h5>Issue For :</h5>
                                    </dt>
                                    <dt class="col-sm-12">
                                        <h4>Warehouse</h4>
                                    </dt>
                                    <dt class="col-sm-12 font-weight-normal">
                                        <address>
                                            1729 Bangor St, Houlton, ME, 04730, USA<br>
                                            <strong>Phone:</strong> +1(142)-532-9109
                                        </address>
                                    </dt>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table class="table-hover table">
                                <thead>
                                    <tr>
                                        <th style="width: 1%;">#</th>
                                        <th style="width: 20%;">Product Variant</th>
                                        <th style="width: 20%;">Product Name</th>
                                        <th style="width: 14%;">Quantity</th>
                                        <th style="width: 15%;">Price</th>
                                        <th style="width: 15%;">Tax</th>
                                        <th style="width: 15%;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Comic</td>
                                        <td>Naruto</td>
                                        <td>1</td>
                                        <td>$20.00</td>
                                        <td>$1.00</td>
                                        <td>$21.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-7"></div>
                    <div class="col-md-5">
                        <div class="card-block">
                            <dl class="dl-horizontal row">
                                <dt class="col-sm-6 font-weight-normal">Sub Total</dt>
                                <dd class="col-sm-6">: $737.00</dd>
                                <dt class="col-sm-6 font-weight-normal">Discount</dt>
                                <dd class="col-sm-6">: $737.00</dd>
                                <dt class="col-sm-6 font-weight-normal">Estimated Tax</dt>
                                <dd class="col-sm-6">: $737.00</dd>
                            </dl>
                            <hr>
                            <dl class="dl-horizontal row">
                                <dt class="col-sm-6">Grand Amount</dt>
                                <dd class="col-sm-6 font-weight-bold">: $737.00</dd>
                            </dl>
                            <button type="submit" class="btn btn-primary waves-effect waves-light m-r-1"><i
                                    class="ti-save m-r-1"></i>Save As</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light m-r-1"><i
                                    class="ti-printer m-r-1"></i>Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
    {{-- Invoice end --}}
@endsection
