@extends('layouts.dashboard')

@section('page-title', 'Manage Stock')

@section('content')
    <!-- Stock table starts -->
    <div class="card">
        <div class="card-block">
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table class="table-hover table">
                        <thead>
                            <tr>
                                <th style="width: 1%;">#</th>
                                <th style="width: 25%;">Product Name</th>
                                <th style="width: 10%;">Quantity</th>
                                <th style="width: 20%;">Warehouse</th>
                                <th style="width: 5%;">Warehouse Stock</th>
                                <th style="width: 5%;">Restock Threshold</th>
                                <th style="width: 19%;">Status</th>
                                <th class="text-center" style="width: 15%; ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($stocks as $stock)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $stock->product->product_name }}</td>
                                    <td>{{ $stock->quantity }}</td>
                                    <td>{{ $stock->warehouse->warehouse_name }}</td>
                                    <td>
                                        {{ $stock->warehouse->warehouseproduct->where('product_id', $stock->product_id)->first()->quantity }}
                                    </td>
                                    <td>{{ $stock->restock_threshold }}</td>
                                    <td>{{ $stock->status }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip"
                                            data-placement="top" title="" href="{{ route('add-stock', $stock->id) }}" role="button"
                                            data-original-title="add ">
                                            <i class="ti-plus"></i>
                                        </a>
                                        <a class="btn btn-warning waves-effect waves-light" data-toggle="tooltip"
                                            data-placement="top" title="" href="{{ route('edit-stock', $stock->id) }}"
                                            role="button" data-original-title="edit ">
                                            <i class="ti-pencil"></i>
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
    <!-- Stock table ends -->
@endsection
