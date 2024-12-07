@extends('layouts.dashboard')

@section('root-page', 'Manage Direct Sale')
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
                                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" height="50rem">
                                    </dt>

                                    <dt class="col-sm-12">
                                        <h4 class="m-t-15">{{ auth()->user()->name }}</h4>
                                    </dt>

                                    <dt class="col-sm-12 font-weight-normal">
                                        <span>{{ auth()->user()->role->role_name }}</span>
                                    </dt>

                                    <dt class="col-sm-12 font-weight-normal">
                                        <address class="m-t-15">
                                            1729 Bangor St, Houlton, ME, 04730, USA <br>
                                            <strong>Phone:</strong> +1(142)-532-9109
                                        </address>
                                    </dt>
                                </dl>
                                <hr>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-block">
                                <dl class="dl-horizontal row">
                                    <dt class="col-sm-6 m-b-10">Invoice ID</dt>
                                    <dd class="col-sm-6">: <strong>#{{ $payment->id }}</strong></dd>

                                    <dt class="col-sm-6 m-b-10">Due Date</dt>
                                    <dd class="col-sm-6">: {{ $payment->created_at }}</dd>

                                    <dt class="col-sm-6 m-b-10">Product Varian</dt>
                                    <dd class="col-sm-6">: {{ $variant_product }}</dd>

                                    <dt class="col-sm-6 m-b-10">Amount</dt>
                                    <dd class="col-sm-6">: ${{ $payment->grand_amount }}</dd>

                                    <dt class="col-sm-6 m-b-10">Status</dt>
                                    <dd class="col-sm-6 d-flex">: <div class="label-main m-l-2"><label
                                                class="label label-lg label-success">PAID</label></div>
                                    </dd>
                                </dl>
                                <hr>
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
                                        <th style="width: 40%;">Product Name</th>
                                        <th style="width: 14%;">Quantity</th>
                                        <th style="width: 15%;">Price</th>
                                        <th style="width: 15%;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payment_products as $payment_product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $payment_product->product->product_name }}</td>
                                            <td>{{ $payment_product->quantity }}</td>
                                            <td>{{ $payment_product->product->product_price }}</td>
                                            <td>{{ $payment_product->sub_total }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="card-block">
                            <dl class="dl-horizontal row">
                                <dt class="col-sm-8 font-weight-normal">Sub Total</dt>
                                <dd class="col-sm-4">: ${{ $payment->total_amount }}</dd>
                                <dt class="col-sm-8 font-weight-normal">Estimated Tax ({{ $tax }}%)</dt>
                                <dd class="col-sm-4">: ${{ $payment->estimated_tax }}</dd>
                                <dt class="col-sm-8 font-weight-normal">Discount ({{ $discount }}%)</dt>
                                <dd class="col-sm-4">: ${{ $payment->discount }}</dd>
                            </dl>
                            <hr>
                            <dl class="dl-horizontal row">
                                <dt class="col-sm-8">Grand Amount</dt>
                                <dd class="col-sm-4 font-weight-bold">: ${{ $payment->grand_amount }}</dd>
                            </dl>
                            <div class="row">
                                <a href="{{ route('manage-direct-sale') }}"
                                    class="btn btn-primary waves-effect waves-light"><i
                                        class="ti-shopping-cart m-r-1"></i>Direct Sale</a>
                                <button type="submit" class="btn btn-primary waves-effect waves-light"><i
                                        class="ti-printer m-r-1"></i>Print</button>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-1"></div>
    </div>
    {{-- Invoice end --}}
@endsection
