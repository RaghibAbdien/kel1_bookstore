@extends('layouts.dashboard')

@section('root-page', 'Manage Role')
@section('page-title', 'Edit Role')

@section('content')

    <!-- Row start -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Control starts -->
            <div class="card">
                <div class="card-header">
                    <div class="col-lg-12">
                        <h5 class="card-header-text">Form Edit Role</h5>
                    </div>
                </div>

                <div class="card-block">
                    <form>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputRolename" class="form-control-label">Role Name</label>
                                <input type="text" class="form-control" id="exampleInputRolename" name="role_name"
                                    aria-describedby="Rolename" placeholder="Enter Rolename">
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleAccessLevel" class="form-control-label">Access Level</label>
                                <select class="form-control" id="exampleRoleLevel" name="">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div> --}}
                        <button type="submit" class="btn btn-primary waves-effect waves-light m-r-30 f-right">Save</button>
                    </form>
                </div>
            </div>
            <!-- Form Control ends -->
        </div>
    </div>
    <!-- Row end -->
@endsection
