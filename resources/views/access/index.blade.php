@extends('layouts.dashboard')

@section('page-title', 'Role & Menu Access')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <!-- Menu table starts -->
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top"
                        title="" href="/add-menu" role="button" data-original-title="Add User">
                        <i class="ti-plus"></i> Add Menu
                    </a>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table class="table-hover table">
                                <thead>
                                    <tr>
                                        <th style="width: 1%;">#</th>
                                        <th style="width: 20%;">Menu Name</th>
                                        <th class="text-center" style="width: 20%; ">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($menus as $menu)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $menu->menu_name }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-warning waves-effect waves-light" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    href="{{ route('update-menu', $menu->id) }}" role="button"
                                                    data-original-title="edit ">
                                                    <i class="ti-pencil"></i>
                                                </a>
                                                <a class="btn btn-danger waves-effect waves-light" data-toggle="tooltip"
                                                    data-placement="top" title="Delete"
                                                    href="{{ route('delete-menu', $menu->id) }}"
                                                    id="deleteMenuForm{{ $menu->id }}">
                                                    <i class="ti-trash"></i>
                                                </a>

                                                <form action="{{ route('delete-menu', $menu->id) }}"
                                                    id="delete-menu-form{{ $menu->id }}" method="POST"
                                                    style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <span></span>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu table ends -->
        </div>
        <div class="col-md-7">
            <!-- Role table starts -->
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top"
                        title="" href="/add-role" role="button" data-original-title="Add User">
                        <i class="ti-plus"></i> Add Role
                    </a>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table class="table-hover table">
                                <thead>
                                    <tr>
                                        <th style="width: 1%;">#</th>
                                        <th style="width: 20%;">Role Name</th>
                                        <th style="width: 40%;">Access Menu</th>
                                        <th class="text-center" style="width: 20%; ">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($roles as $role)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $role->role_name }}</td>
                                            <td>
                                                @foreach ($role->menus as $menu)
                                                    <span>{{ $menu->menu_name }}</span><br>
                                                @endforeach
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-warning waves-effect waves-light" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    href="{{ route('update-role', $role->id) }}" role="button"
                                                    data-original-title="edit ">
                                                    <i class="ti-pencil"></i>
                                                </a>
                                                <a class="btn btn-danger waves-effect waves-light" data-toggle="tooltip"
                                                    data-placement="top" title="Delete"
                                                    href="{{ route('delete-role', $role->id) }}"
                                                    id="deleteRoleForm{{ $role->id }}">
                                                    <i class="ti-trash"></i>
                                                </a>

                                                <form action="{{ route('delete-menu', $role->id) }}"
                                                    id="delete-role-form{{ $role->id }}" method="POST"
                                                    style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <span>Belum ada role</span>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Role table ends -->
        </div>
    </div>

    @push('js')
        @foreach ($menus as $menu)
            <script>
                document.getElementById('deleteMenuForm{{ $menu->id }}').addEventListener('click', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Are you sure delete this menu?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, do it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-menu-form{{ $menu->id }}').submit();
                        }
                    })
                });
            </script>
        @endforeach
        @foreach ($roles as $role)
            <script>
                document.getElementById('deleteRoleForm{{ $role->id }}').addEventListener('click', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Are you sure delete this role?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, do it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-role-form{{ $role->id }}').submit();
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
