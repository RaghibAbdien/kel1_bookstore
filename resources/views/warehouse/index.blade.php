@extends('layouts.dashboard')

@section('page-title', 'Manage Warehouse')

@section('content')
    <!-- Warehouse table starts -->
    <div class="card">
        <div class="card-block">
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table class="table-hover table">
                        <thead>
                            <tr>
                                <th style="width: 1%;">#</th>
                                <th style="width: 20%;">Product Name</th>
                                <th style="width: 19%;">Warehouse</th>
                                <th style="width: 10%;">Stock</th>
                                <th style="width: 15%;">Restock Threshold</th>
                                <th style="width: 15%;">Status</th>
                                <th class="text-center" style="width: 20%; ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->product->product_name }}</td>
                                    <td>{{ $item->warehouse->warehouse_name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->restock_threshold }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-warning waves-effect waves-light" data-toggle="tooltip"
                                            data-placement="top" title=""
                                            href="{{ route('edit-warehouse-product', $item->id) }}" role="button"
                                            data-original-title="edit ">
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
    <!-- Warehouse table ends -->
@endsection
