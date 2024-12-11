@extends('layouts.dashboard')

@section('page-title', 'Manage User')

@section('content')
    {{-- User Analytics --}}
    <div class="row dashboard-header">
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Total <br> Employee</span>
                <h2 class="dashboard-total-products">{{ $employeeCount }}</h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Customer <br> Service</span>
                <h2 class="dashboard-total-products">{{ $customerServiceCount }}</h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Logistic <br> Manager</span>
                <h2 class="dashboard-total-products">{{ $logisticManagerCount }}</h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Purchasing <br> Agent</span>
                <h2 class="dashboard-total-products">{{ $purchasingManagerCount }}</h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Head <br> Manager</span>
                <h2 class="dashboard-total-products">{{ $headManagerCount }}</h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Cashier <br> Store</span>
                <h2 class="dashboard-total-products"><span>{{ $cashierCount }}</span></h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Admin</span>
                <h2 class="dashboard-total-products"><span>{{ $adminCount }}</span></h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Customer</span>
                <h2 class="dashboard-total-products"><span>{{ $customerCount }}</span></h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="card dashboard-product">
                <span>Total User</span>
                <h2 class="dashboard-total-products">{{ $users->count() }}</h2>
                <div class="side-box">
                    <i class="ti-filter text-primary-color"></i>
                </div>
            </div>
        </div>
    </div>
    {{-- User Analytics --}}
    <!-- User table starts -->
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=""
                href="{{ route('add-user') }}" role="button" data-original-title="Add User">
                <i class="ti-plus"></i> Add User
            </a>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table class="table-hover table">
                        <thead>
                            <tr>
                                <th style="width: 1%;">#</th>
                                <th style="width: 20%;">Fullname</th>
                                <th style="width: 20%;">Email</th>
                                <th style="width: 12%;">Role</th>
                                <th style="width: 20%;">Registration Date</th>
                                <th class="text-center" style="width: 7%;">Status</th>
                                <th class="text-center" style="width: 20%; ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->role_name }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <div class="label-main m-l-2">
                                            @if ($user->status)
                                                <label class="label label-lg label-success">Active</label>
                                            @else
                                                <label class="label label-lg label-default">Non Active</label>
                                            @endif
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <a class="btn btn-warning waves-effect waves-light" data-toggle="tooltip"
                                            data-placement="top" title="" href="{{ route('edit-user', $user->id) }}"
                                            role="button" data-original-title="edit ">
                                            <i class="ti-pencil"></i>
                                        </a>
                                        <a class="btn btn-danger waves-effect waves-light" data-toggle="tooltip"
                                            data-placement="top" title="Delete"
                                            href="{{ route('delete-user', $user->id) }}"
                                            id="deleteUserForm{{ $user->id }}">
                                            <i class="ti-trash"></i>
                                        </a>

                                        <form action="{{ route('delete-user', $user->id) }}"
                                            id="delete-user-form{{ $user->id }}" method="POST" style="display:none;">
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
    <!-- User table ends -->
    @push('js')
        @foreach ($users as $user)
            <script>
                document.getElementById('deleteUserForm{{ $user->id }}').addEventListener('click', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Are you sure delete this user?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, do it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-user-form{{ $user->id }}').submit();
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
