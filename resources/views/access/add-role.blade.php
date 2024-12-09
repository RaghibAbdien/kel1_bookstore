@extends('layouts.dashboard')

@section('root-page', 'Role & Menu Access')
@section('page-title', 'Add Role')

@section('content')

    <!-- Row start -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Control starts -->
            <div class="card">
                <div class="card-header">
                    <div class="col-lg-12">
                        <h5 class="card-header-text">Form Add Role</h5>
                    </div>
                </div>

                <div class="card-block">
                    <form id="formAddRole" action="{{ route('store-role') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputRolename" class="form-control-label">Role Name</label>
                                    <input type="text" class="form-control" id="exampleInputRolename" name="role_name"
                                        aria-describedby="Rolename" placeholder="Enter Rolename">
                                </div>
                            </div>
                            <div class="col-md-6" data-select2-id="45">
                                <div class="form-group" data-select2-id="44">
                                    <label for="exampleAccessLevel" class="form-control-label">Access Menu</label>
                                    <select name="menu_id[]" class="select2 select2-hidden-accessible" multiple=""
                                        data-placeholder="Select Menu" style="width: 100%" data-select2-id="7"
                                        tabindex="-1" aria-hidden="true">
                                        @forelse ($menus as $menu)
                                            <option value="{{ $menu->id }}">{{ $menu->menu_name }}</option>
                                        @empty
                                            <option value="" disabled>Belum ada menu</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit"
                                class="btn btn-primary waves-effect waves-light m-r-30 f-right">Submit</button>
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
                $('#formAddRole').on('submit', function(event) {
                    event.preventDefault();

                    var form = $(this);
                    form.find('button[type="submit"]').prop('disabled', true);

                    $.ajax({
                        url: form.attr('action'),
                        method: form.attr('method'),
                        data: form.serialize(),
                        success: function(response) {
                            Swal.fire({
                                title: 'Success',
                                text: response.success,
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                window.location.href = response.redirect;
                            });
                        },
                        error: function(xhr) {
                            var errors = xhr.responseJSON.errors;
                            var errorMessage = '';

                            if (errors) {
                                $.each(errors, function(field, messages) {
                                    messages.forEach(function(message) {
                                        errorMessage += message + '<br>';
                                    });
                                });
                            } else {
                                errorMessage = 'An unknown error occurred.';
                            }

                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                html: errorMessage
                            });

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
