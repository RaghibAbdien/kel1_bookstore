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
                    <form id="formAddProduct" action="{{ route('store-product') }}" method="post">
                        @csrf
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
                                    <select class="form-control" id="exampleProductVariant" name="variant_id">
                                        <option value="" selected disabled>Pilih Variant</option>
                                        @foreach ($variants as $variant)
                                            <option value="{{ $variant->id }}">{{ $variant->variant_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputSupplierPrice" class="form-control-label">Supplier Price</label>
                                    <input type="number" class="form-control" id="exampleInputSupplierPrice"
                                        name="supplier_price" aria-describedby="SupplierPrice"
                                        placeholder="Enter Supplier Price">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputProductPrice" class="form-control-label">Product Price</label>
                                    <input type="number" class="form-control" id="exampleInputProductPrice"
                                        name="product_price" aria-describedby="ProductPrice"
                                        placeholder="Enter Product Price">
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
    @push('js')
        <script>
            $(document).ready(function() {
                $('#formAddProduct').on('submit', function(event) {
                    event.preventDefault();
                    var form = $(this);

                    // Menonaktifkan tombol submit
                    form.find('button[type="submit"]').prop('disabled', true);

                    $.ajax({
                        url: form.attr('action'), // URL dari form action
                        method: form.attr('method'), // Metode HTTP dari form method
                        data: form.serialize(), // Serialisasi data form
                        success: function(response) {
                            // Jika validasi berhasil, redirect atau lakukan tindakan lain
                            Swal.fire({
                                title: 'Success',
                                text: response.success,
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                window.location.href = response.redirect;
                            });
                        },
                        error: function(xhr) {
                            // Tangani error dari response server
                            var errors = xhr.responseJSON?.errors; // Validasi dari Laravel
                            var errorMessage = '';

                            // Jika ada error validasi, tampilkan pesan
                            if (errors) {
                                $.each(errors, function(field, messages) {
                                    messages.forEach(function(message) {
                                        errorMessage += message + '<br>';
                                    });
                                });
                            } else if (xhr.responseJSON?.error) {
                                // Tampilkan pesan error umum
                                errorMessage = xhr.responseJSON.error;
                            } else {
                                errorMessage = 'Something went wrong. Please try again.';
                            }

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
    @endpush

@endsection
