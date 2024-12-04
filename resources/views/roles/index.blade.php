@extends('layouts.dashboard')

@section('page-title', 'Manage Role & Access')

@section('content')
    <!-- Role table starts -->
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=""
                href="/add-role" role="button" data-original-title="Add User">
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
                                <th style="width: 40%;">Access Level</th>
                                <th class="text-center" style="width: 20%; ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->role_name }}</td>
                                    <td>create, read, update, delete</td>
                                    <td class="text-center">
                                        <a class="btn btn-warning waves-effect waves-light" data-toggle="tooltip"
                                            data-placement="top" title="" href="{{ route('update-role', $role->id) }}"
                                            role="button" data-original-title="edit ">
                                            <i class="ti-pencil"></i>
                                        </a>
                                        <a class="btn btn-danger waves-effect waves-light" data-toggle="tooltip"
                                            data-placement="top" title="Delete" href="#"
                                            onclick="event.preventDefault(); document.getElementById('deleteRoleForm{{ $role->id }}').submit();">
                                            <i class="ti-trash"></i>
                                        </a>

                                        <form action="{{ route('delete-role', $role->id) }}"
                                            id="deleteRoleForm{{ $role->id }}" method="POST" style="display:none;">
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
    <!-- Role table ends -->
    @push('js')
        @foreach ($roles as $role)
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const deleteForm = document.querySelector(`#deleteRoleForm{{ $role->id }}`);
                    const deleteButton = document.querySelector(`#deleteButton{{ $role->id }}`);

                    deleteButton.addEventListener('click', function(event) {
                        event.preventDefault();
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "Are you sure you want to delete this role?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, do it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                deleteForm.submit();
                            }
                        });
                    });
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
