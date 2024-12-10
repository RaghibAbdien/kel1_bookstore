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
                    <form id="formEditPurchase" action="{{ route('update-purchase', $purchasings->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputProductname" class="form-control-label">Product Name</label>
                                    <input type="text" class="form-control" id="exampleInputProductname"
                                        name="product_name" aria-describedby="Productname" placeholder="Enter Productname"
                                        value="{{ $purchasings->product->product_name }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSuppliername" class="form-control-label">Supplier Name</label>
                                    <select class="form-control" id="exampleSuppliername" name="supplier_id">
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
                                    <select class="form-control" id="exampleStatus" name="status">
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
                                    <select class="form-control" id="exampleWarehousename" name="warehouse_id">
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
    @push('js')
        <script>
            $(document).ready(function() {
                $('#formEditPurchase').on('submit', function(event) {
                    event.preventDefault();
                    var form = $(this);
                    // Menonaktifkan tombol submit
                    form.find('button[type="submit"]').prop('disabled', true);

                    $.ajax({
                        url: form.attr('action'),
                        method: form.attr('method'),
                        data: form.serialize(),
                        success: function(response) {
                            // Jika validasi berhasil, redirect atau lakukan tindakan lain
                            Swal.fire({
                                title: 'Success',
                                text: response.success,
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            }).then((result) => {
                                window.location.href = response.redirect;
                            });
                        },
                        error: function(xhr) {
                            // Dapatkan objek errors dari response JSON Laravel
                            var errors = xhr.responseJSON.errors;
                            var errorMessage = '';
                            $.each(errors, function(field, messages) {
                                messages.forEach(function(message) {
                                    errorMessage += message + '<br>';
                                });
                            });

                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                html: errorMessage
                            });

                            // Aktifkan kembali tombol submit
                            form.find('button[type="submit"]').prop('disabled', false);
                        }
                    });
                });
            });
        </script>
        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Success',
                        text: '{{ session('success') }}',
                        icon: 'success',
                        timer: 2500,
                        showConfirmButton: false
                    });
                });
            </script>
        @endif
        @if (session('failed'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: '{{ session('failed') }}',
                    });
                });
            </script>
        @endif
    @endpush
@endsection
