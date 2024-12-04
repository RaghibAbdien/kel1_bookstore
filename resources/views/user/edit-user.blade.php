@extends('layouts.dashboard')

@section('root-page', 'Manage User')
@section('page-title', 'Edit User')

@section('content')

    <!-- Row start -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Control starts -->
            <div class="card">
                <div class="card-header">
                    <div class="col-lg-12">
                        <h5 class="card-header-text">Form Edit User</h5>
                    </div>
                </div>

                <div class="card-block">
                    <form id="formEditUser" action="{{ route('update-user', $users->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputFullname" class="form-control-label">Fullname</label>
                                    <input type="text" class="form-control" id="exampleInputFullname" name="name"
                                        aria-describedby="Fullname" placeholder="Enter fullname"
                                        value="{{ $users->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail" class="form-control-label">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail" name="email"
                                        aria-describedby="emailHelp" placeholder="Enter email" value="{{ $users->email }}">

                                </div>
                                <div class="form-group">
                                    <label for="exampleRole" class="form-control-label">Role</label>
                                    <select class="form-control" id="exampleRole" name="role_id">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ $role->id == $users->role_id ? 'selected' : '' }}>
                                                {{ $role->role_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPhone" class="form-control-label">Phone</label>
                                    <input type="text" class="form-control" id="exampleInputPhone" name="phone"
                                        aria-describedby="Phone" placeholder="Enter phone" value="{{ $users->phone }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword" class="form-control-label">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword" name="password"
                                        placeholder="Password" value="{{ $users->password }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleStatus" class="form-control-label">Status</label>
                                    <select class="form-control" id="exampleStatus" name="status">
                                        <option value="1" {{ $users->status == '1' ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ $users->status == '0' ? 'selected' : '' }}>Tidak Aktif
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleAddress" class="form-control-label">Address</label>
                                    <textarea class="form-control" id="exampleAddress" rows="4" name="address">{{ $users->address }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit"
                                class="btn btn-primary waves-effect waves-light m-r-30 f-right">Save</button>
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
                $('#formEditUser').on('submit', function(event) {
                    event.preventDefault();
                    var form = $(this);
                    // Menonaktifkan tombol submit
                    form.find('button[type="submit"]').prop('disabled', true);

                    $.ajax({
                        url: form.attr('action'),
                        method: form.attr('method'),
                        data: form.serialize(),
                        success: function(response) {
                            // Jika validasi berhasil, redirect atau lakukan tindakan lain
                            Swal.fire({
                                title: 'Success',
                                text: response.success,
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            }).then((result) => {
                                window.location.href = response.redirect;
                            });
                        },
                        error: function(xhr) {
                            // Dapatkan objek errors dari response JSON Laravel
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
