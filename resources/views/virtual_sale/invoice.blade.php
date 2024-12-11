@extends('layouts.dashboard')

@section('root-page', 'Manage Virtual Sale')
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
                                    <dd class="col-sm-6">: <strong>#{{ $bookstore->id }}</strong></dd>

                                    <dt class="col-sm-6 m-b-10">Due Date</dt>
                                    <dd class="col-sm-6">: {{ $bookstore->created_at }}</dd>

                                    <dt class="col-sm-6 m-b-10">Product Varian</dt>
                                    <dd class="col-sm-6">: {{ $variant_product }}</dd>

                                    <dt class="col-sm-6 m-b-10">Amount</dt>
                                    <dd class="col-sm-6">: ${{ $bookstore->grand_amount }}</dd>

                                    <dt class="col-sm-6 m-b-10">Status</dt>
                                    <dd class="col-sm-6 d-flex">:
                                        <div class="label-main m-l-2">
                                            <label
                                                class="label label-lg {{ $bookstore->status ? 'label-success' : 'label-danger' }}">
                                                {{ $bookstore->status ? 'PAID' : 'UNPAID' }}
                                            </label>
                                        </div>
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
                                    @foreach ($customer_orders as $customer_order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $customer_order->product->product_name }}</td>
                                            <td>{{ $customer_order->quantity }}</td>
                                            <td>{{ $customer_order->product->product_price }}</td>
                                            <td>{{ $customer_order->sub_total }}</td>
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
                                <dt class="col-sm-8 font-weight-normal">Total Amount</dt>
                                <dd class="col-sm-4">: ${{ $bookstore->total_amount }}</dd>
                                <dt class="col-sm-8 font-weight-normal">Estimated Tax ({{ $bookstore->estimated_tax }}%)
                                </dt>
                                <dd class="col-sm-4">: ${{ $bookstore->estimated_tax }}</dd>
                                <dt class="col-sm-8 font-weight-normal">Discount ({{ $bookstore->discount }}%)</dt>
                                <dd class="col-sm-4">: ${{ $bookstore->discount }}</dd>
                            </dl>
                            <hr>
                            <dl class="dl-horizontal row">
                                <dt class="col-sm-8">Grand Amount</dt>
                                <dd class="col-sm-4 font-weight-bold">: ${{ $bookstore->grand_amount }}</dd>
                            </dl>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <a href="{{ route('manage-virtual-sale') }}" class="btn btn-primary waves-effect waves-light"><i
                                        class="ti-shopping-cart m-r-1"></i>Virtual Sale</a>
                                <a href="#" id="confirmButton" class="btn btn-warning waves-effect waves-light">
                                    <i class="ti-check m-r-1"></i> Confirmed
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Invoice end --}}
    @push('js')
        <script>
            $(document).ready(function() {
                $('#confirmButton').on('click', function() {
                    // Ambil ID invoice yang akan dikonfirmasi
                    var invoiceId = '{{ $bookstore->id }}'; // Sesuaikan dengan data yang ada

                    // Kirim permintaan Ajax
                    $.ajax({
                        url: '/confirm-virtual-invoice/' + invoiceId, // Ganti dengan URL route Anda
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}', // Token CSRF untuk keamanan
                        },
                        success: function(response) {
                            // Tampilkan pesan sukses menggunakan Swal atau alert
                            Swal.fire({
                                title: 'Success',
                                text: response.success,
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            }).then((result) => {
                                // Redirect setelah sukses
                                window.location.href = response.redirect;
                            });
                        },
                        error: function(xhr) {
                            // Tampilkan pesan error jika terjadi kesalahan
                            var errorMessage = xhr.responseJSON.error || 'Something went wrong!';
                            Swal.fire({
                                title: 'Error',
                                text: errorMessage,
                                icon: 'error'
                            });
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection