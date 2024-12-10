@extends('layouts.dashboard')

@section('page-title', 'Manage Purchasing')

@section('content')
    <!-- Purchase table starts -->
    <div class="card">
        <div class="card-header">
            <div class="col-lg-12">
                <p class="card-header-text f-right">Note: Balance = Warehouse Stock - Restock Threshold</p>
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
                                <th style="width: 15%;">Supplier</th>
                                <th style="width: 20%;">Warehouse</th>
                                <th style="width: 5%;">Purchase</th>
                                <th style="width: 5%;">Balance</th>
                                <th style="width: 14%;">Status</th>
                                <th class="text-center" style="width: 15%; ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($purchasings as $purchase)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $purchase->product->product_name }}</td>
                                    <td>{{ $purchase->supplier->supplier_name }}</td>
                                    <td>{{ $purchase->warehouse->warehouse_name }}</td>
                                    <td>{{ $purchase->quantity }}</td>
                                    <td>{{ $balances[$purchase->product_id] ?? 0 }}</td>
                                    <td>{{ $purchase->status }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip"
                                            data-placement="top" title=""
                                            href="{{ route('add-purchase', $purchase->id) }}" role="button"
                                            data-original-title="add ">
                                            <i class="ti-plus"></i>
                                        </a>
                                        <a class="btn btn-warning waves-effect waves-light" data-toggle="tooltip"
                                            data-placement="top" title=""
                                            href="{{ route('edit-purchase', $purchase->id) }}" role="button"
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
    <!-- Purchase table ends -->
@endsection
