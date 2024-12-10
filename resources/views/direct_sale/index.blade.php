@extends('layouts.dashboard')

@section('page-title', 'Manage Direct Sale')

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
                                        <th style="width: 10%;">Stock</th>
                                        <th style="width: 10%;">Price</th>
                                        <th class="text-center" style="width: 30%; ">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->product->product_name }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->product->product_price }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-primary waves-effect waves-light add-product-btn"
                                                    data-toggle="tooltip" data-placement="top" title="Add Product"
                                                    href="#" data-product-id="{{ $product->id }}"
                                                    data-product-name="{{ $product->product->product_name }}"
                                                    data-product-price="{{ $product->product->product_price }}"
                                                    data-product-stock="{{ $product->quantity }}">
                                                    <i class="ti-plus"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Product Table End --}}

        {{-- POS Start --}}
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="col-lg-12">
                        <h5 class="card-header-text">Point of Sales</h5>
                    </div>
                </div>
                <div class="card-block">
                    <form id="formAddPayment" action="{{ route('store-payment') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleCustomerName" class="form-control-label">Customer Name</label>
                                    <select class="form-control" id="exampleCustomerName" name="user_id" required>
                                        <option value="" selected disabled>Pilih Customer</option>
                                        @forelse ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @empty
                                            <option disabled>Tidak ada pelanggan tersedia</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="product-list">
                                    <!-- Produk akan ditambahkan secara dinamis di sini -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputTax" class="form-control-label">Tax (%)</label>
                                    <input type="number" class="form-control" id="exampleInputTax" name="tax_rate"
                                        aria-describedby="Tax" placeholder="Enter Tax Rate" value="{{ $tax }}"
                                        min="0" max="100" step="0.01" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputDiscount" class="form-control-label">Discount (%)</label>
                                    <input type="number" class="form-control" id="exampleInputDiscount"
                                        name="discount_rate" aria-describedby="Discount"
                                        placeholder="Enter Discount Rate" value="{{ $discount }}" min="0"
                                        max="100" step="0.01" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card">
                                <div class="card-block">
                                    <dl class="dl-horizontal row">
                                        <dt class="col-sm-9 font-weight-normal">Total Amount</dt>
                                        <dd class="col-sm-3 sub-total" data-value="0.00">: $0.00</dd>
                                        <input type="hidden" name="total_amount" id="total-amount" value="0.00">

                                        <dt class="col-sm-9 font-weight-normal">Discount Amount</dt>
                                        <dd class="col-sm-3 discount-total" data-value="0.00">: $0.00</dd>
                                        <input type="hidden" name="discount" id="discount" value="0.00">

                                        <dt class="col-sm-9 font-weight-normal">Estimated Tax</dt>
                                        <dd class="col-sm-3 tax-total" data-value="0.00">: $0.00</dd>
                                        <input type="hidden" name="estimated_tax" id="estimated-tax" value="0.00">
                                    </dl>
                                    <hr>
                                    <dl class="dl-horizontal row">
                                        <dt class="col-sm-9">Grand Amount</dt>
                                        <dd class="col-sm-3 font-weight-bold grand-total" data-value="0.00">: $0.00</dd>
                                        <input type="hidden" name="grand_amount" id="grand-amount" value="0.00">
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="examplePaymentMethod" class="form-control-label">Payment Method</label>
                                    <select class="form-control" id="examplePaymentMethod" name="payment_method_id"
                                        required>
                                        <option value="" selected disabled>Pilih Payment Method</option>
                                        @forelse ($payment_methods as $payment_method)
                                            <option value="{{ $payment_method->id }}">
                                                {{ $payment_method->payment_method_name }}
                                            </option>
                                        @empty
                                            <option disabled>Tidak ada payment method tersedia</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary waves-effect waves-light m-r-30 f-right">
                                    Payment
                                </button>
                                <button type="reset" id="void-button"
                                    class="btn btn-danger waves-effect waves-light m-r-30 f-right">
                                    Void
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- POS End --}}
    </div>
    @push('js')
        <script>
            function toFixed(value, precision) {
                return parseFloat(value.toFixed(precision));
            }

            $(document).ready(function() {
                // Fungsi kalkulasi total
                function calculateTotals() {
                    let subTotal = 0;

                    // Default nilai discount dan tax adalah 0 jika input kosong
                    let discountRate = parseFloat($('#exampleInputDiscount').val()) || 0;
                    let taxRate = parseFloat($('#exampleInputTax').val()) || 0;

                    // Hitung subtotal
                    $('#product-list .product-row').each(function() {
                        const productPrice = parseFloat($(this).find('.product-price').val()) || 0;
                        subTotal += productPrice;
                    });

                    // Hitung discount dan tax
                    const discount = toFixed((subTotal * discountRate) / 100, 2);
                    const tax = toFixed((subTotal * taxRate) / 100, 2);

                    // Hitung grand total
                    const grandTotal = toFixed(subTotal + tax - discount, 2);

                    // Update UI
                    $('.sub-total').text(`: $${toFixed(subTotal, 2)}`);
                    $('.discount-total').text(`: $${toFixed(discount, 2)}`);
                    $('.tax-total').text(`: $${toFixed(tax, 2)}`);
                    $('.grand-total').text(`: $${grandTotal}`);

                    // Update hidden input fields
                    $('#total-amount').val(toFixed(subTotal, 2));
                    $('#discount').val(toFixed(discount, 2));
                    $('#estimated-tax').val(toFixed(tax, 2));
                    $('#grand-amount').val(toFixed(grandTotal, 2));
                }

                // Trigger calculateTotals saat form tax atau discount diubah
                $('#exampleInputTax, #exampleInputDiscount').on('input', calculateTotals);

                // Event listener untuk tombol Void
                $('#void-button').on('click', function(event) {
                    event.preventDefault();

                    // Menghapus semua produk dari #product-list
                    $('#product-list').empty();

                    // Reset customer dan payment method
                    $('#exampleCustomerName').val('').prop('disabled', false);
                    $('#examplePaymentMethod').val('').prop('disabled', false);

                    // Reset total dan harga
                    $('.sub-total').text(': $0.00');
                    $('.discount-total').text(': $0.00');
                    $('.tax-total').text(': $0.00');
                    $('.grand-total').text(': $0.00');

                    // Reset hidden input fields
                    $('#total-amount, #discount, #estimated-tax, #grand-amount').val('0.00');

                    // Trigger calculation
                    calculateTotals();
                });

                // Event listener untuk tombol Add
                $('.add-product-btn').on('click', function(event) {
                    event.preventDefault();

                    // Ambil data produk dari tombol
                    const productId = $(this).data('product-id');
                    const productName = $(this).data('product-name');
                    const productPrice = parseFloat($(this).data('product-price'));
                    const productStock = parseInt($(this).data('product-stock'));

                    // Validasi stok sebelum melanjutkan
                    if (productStock <= 0) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Out of Stock',
                            text: `Stock for ${productName} is out of stock.`
                        });
                        return;
                    }

                    // Periksa apakah produk sudah ada dalam form
                    const existingRow = $(`#product-row-${productId}`);
                    if (existingRow.length > 0) {
                        // Jika produk sudah ada, tambahkan quantity dan update price
                        const quantityInput = existingRow.find('.product-quantity');
                        const priceInput = existingRow.find('.product-price');

                        let currentQuantity = parseInt(quantityInput.val()) || 0;

                        if (currentQuantity < productStock) {
                            currentQuantity += 1;

                            quantityInput.val(currentQuantity);
                            priceInput.val((productPrice * currentQuantity).toFixed(2));

                            // Trigger calculation
                            calculateTotals();
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Stock Limit',
                                text: `Stock for ${productName} is limited to ${productStock}.`
                            });
                        }
                    } else {
                        // Jika produk belum ada, tambahkan row baru
                        const newRow = `
                    <div class="product-row" id="product-row-${productId}">
                        <input type="hidden" name="product_id[]" value="${productId}">
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <input type="text" class="form-control product-name" value="${productName}" readonly>
                            </div>
                            <div class="col-md-3">
                                <input type="number" class="form-control product-quantity" name="quantity[]" value="1" readonly>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control product-price" name="sub_total[]" value="${productPrice.toFixed(2)}" readonly>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-danger btn-sm delete-product-btn" data-product-id="${productId}" data-product-price="${productPrice}">
                                    <i class="ti-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>`;
                        $('#product-list').append(newRow);

                        // Trigger calculation
                        calculateTotals();
                    }
                });

                // Event listener untuk tombol Delete
                $('#product-list').on('click', '.delete-product-btn', function(event) {
                    event.preventDefault();

                    // Ambil data produk dari tombol
                    const productId = $(this).data('product-id');
                    const productPrice = parseFloat($(this).data('product-price'));

                    // Cari elemen row terkait
                    const row = $(`#product-row-${productId}`);
                    const quantityInput = row.find('.product-quantity');
                    const priceInput = row.find('.product-price');

                    // Kurangi quantity dan update price
                    let currentQuantity = parseInt(quantityInput.val()) || 0;

                    if (currentQuantity <= 1) {
                        // Hapus baris jika jumlah kurang dari atau sama dengan 1
                        row.remove();
                    } else {
                        // Jika jumlah lebih dari 1, kurangi quantity dan perbarui harga
                        currentQuantity -= 1;
                        quantityInput.val(currentQuantity);
                        priceInput.val((productPrice * currentQuantity).toFixed(2));
                    }

                    // Trigger calculation setelah perubahan
                    calculateTotals();
                });

                // Inisialisasi pertama kali
                calculateTotals();
            });

            // Form submission handling
            $(document).ready(function() {
                $('#formAddPayment').on('submit', function(event) {
                    event.preventDefault();
                    var form = $(this);

                    // Cek apakah produk sudah dipilih
                    if ($('#product-list .product-row').length === 0) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'No Products Selected',
                            text: 'Please add at least one product to the cart.'
                        });
                        return;
                    }

                    // Cek apakah customer dan payment method dipilih
                    if (!$('#exampleCustomerName').val() || !$('#examplePaymentMethod').val()) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Incomplete Information',
                            text: 'Please select a customer and payment method.'
                        });
                        return;
                    }

                    // Nonaktifkan tombol submit
                    form.find('button[type="submit"]').prop('disabled', true);

                    // Siapkan FormData untuk mendukung array input
                    var formData = new FormData(form[0]);

                    $.ajax({
                        url: form.attr('action'),
                        method: form.attr('method'),
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            Swal.fire({
                                title: 'Success',
                                text: response.success || 'Payment processed successfully',
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            }).then((result) => {
                                window.location.href = response.redirect || window.location
                                    .href;
                            });
                        },
                        error: function(xhr) {
                            // Tampilkan error detail
                            console.error('Submission Error:', xhr);

                            var errorMessage = 'An error occurred';
                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                var errors = xhr.responseJSON.errors;
                                errorMessage = Object.values(errors).flat().join('<br>');
                            } else if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMessage = xhr.responseJSON.message;
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
