@extends('layouts.dashboard')

@section('page-title', 'Manage Catalog')

@section('content')
    {{-- Catalog Analytics --}}
    <div class="row dashboard-header">
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Biography</span>
                <h2 class="dashboard-total-products">{{ $biographyCount }}</h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Comics</span>
                <h2 class="dashboard-total-products">{{ $comicCount }}</h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Culture</span>
                <h2 class="dashboard-total-products">{{ $cultureCount }}</h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Self-Dev</span>
                <h2 class="dashboard-total-products">{{ $developmentCount }}</h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Economics</span>
                <h2 class="dashboard-total-products">{{ $economicCount }}</h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Geography</span>
                <h2 class="dashboard-total-products">{{ $geographyCount }}</h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>History</span>
                <h2 class="dashboard-total-products">{{ $historyCount }}</h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Language</span>
                <h2 class="dashboard-total-products">{{ $languageCount }}</h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Novel</span>
                <h2 class="dashboard-total-products">{{ $novelCount }}</h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Religion</span>
                <h2 class="dashboard-total-products">{{ $religionCount }}</h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Science</span>
                <h2 class="dashboard-total-products">{{ $scienceCount }}</h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Technology</span>
                <h2 class="dashboard-total-products">{{ $technologyCount }}</h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
    </div>
    {{-- Catalog Analytics --}}
    <!-- Catalog table starts -->
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=""
                href="{{ route('add-product') }}" role="button" data-original-title="Add User">
                <i class="ti-plus"></i> Add Product
            </a>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table class="table-hover table">
                        <thead>
                            <tr>
                                <th style="width: 1%;">#</th>
                                <th style="width: 19%;">Product Variant</th>
                                <th style="width: 35%;">Product Name</th>
                                <th style="width: 15%;">Supplier Price</th>
                                <th style="width: 15%;">Product Price</th>
                                <th class="text-center" style="width: 15%; ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->variant->variant_name }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->supplier_price }}</td>
                                    <td>{{ $product->product_price }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-warning waves-effect waves-light" data-toggle="tooltip"
                                            data-placement="top" title=""
                                            href="{{ route('edit-product', $product->id) }}" role="button"
                                            data-original-title="edit ">
                                            <i class="ti-pencil"></i>
                                        </a>
                                        <a class="btn btn-danger waves-effect waves-light" data-toggle="tooltip"
                                            data-placement="top" title="Delete" href="{{ route('delete-product', $product->id) }}"
                                            id="deleteProductForm{{ $product->id }}">
                                            <i class="ti-trash"></i>
                                        </a>

                                        <form action="{{ route('delete-product', $product->id) }}"
                                            id="delete-product-form{{ $product->id }}" method="POST"
                                            style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
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
    <!-- Catalog table ends -->
    @push('js')
        @foreach ($products as $product)
            <script>
                document.getElementById('deleteProductForm{{ $product->id }}').addEventListener('click', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Are you sure delete this product?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, do it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-product-form{{ $product->id }}').submit();
                        }
                    })
                });
            </script>
        @endforeach
        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Success',
                        text: '{{ session('success') }}',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    });
                });
            </script>
        @endif
    @endpush
@endsection
