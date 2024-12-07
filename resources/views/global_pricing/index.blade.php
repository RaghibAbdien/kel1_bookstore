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
                    <form id="formEditTax" action="{{ route('update-tax', $global_pricing->id) }}" method="post">
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
                    <form id="formEditShiping" action="{{ route('update-shiping', $global_pricing->id) }}" method="post">
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
                        <h5 class="card-header-text">Form Edit Discount</h5>
                    </div>
                </div>
                <div class="card-block">
                    <form id="formEditDiscount" action="{{ route('update-discount', $global_pricing->id) }}" method="post">
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

    @push('js')
        <script>
            $(document).ready(function() {
                $('#formEditTax').on('submit', function(event) {
                    event.preventDefault();
                    var form = $(this);
                    var formData = form.serialize();

                    // Menonaktifkan tombol submit
                    form.find('button[type="submit"]').prop('disabled', true);

                    $.ajax({
                        url: form.attr('action'),
                        method: form.attr('method'),
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Tampilkan pesan sukses
                            Swal.fire({
                                title: 'Success',
                                text: response.success,
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                // Refresh halaman untuk memperbarui data
                                window.location.reload();
                            });
                        },
                        error: function(xhr) {
                            // Tangani error validasi
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

            $(document).ready(function() {
                $('#formEditShiping').on('submit', function(event) {
                    event.preventDefault();
                    var form = $(this);
                    var formData = form.serialize();

                    // Menonaktifkan tombol submit
                    form.find('button[type="submit"]').prop('disabled', true);

                    $.ajax({
                        url: form.attr('action'),
                        method: form.attr('method'),
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Tampilkan pesan sukses
                            Swal.fire({
                                title: 'Success',
                                text: response.success,
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                // Refresh halaman untuk memperbarui data
                                window.location.reload();
                            });
                        },
                        error: function(xhr) {
                            // Tangani error validasi
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

            $(document).ready(function() {
                $('#formEditDiscount').on('submit', function(event) {
                    event.preventDefault();
                    var form = $(this);
                    var formData = form.serialize();

                    // Menonaktifkan tombol submit
                    form.find('button[type="submit"]').prop('disabled', true);

                    $.ajax({
                        url: form.attr('action'),
                        method: form.attr('method'),
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Tampilkan pesan sukses
                            Swal.fire({
                                title: 'Success',
                                text: response.success,
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                // Refresh halaman untuk memperbarui data
                                window.location.reload();
                            });
                        },
                        error: function(xhr) {
                            // Tangani error validasi
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
    @endpush

@endsection
