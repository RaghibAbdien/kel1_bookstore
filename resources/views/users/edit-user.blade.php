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
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputFullname" class="form-control-label">Fullname</label>
                                    <input type="text" class="form-control" id="exampleInputFullname" name="fullname"
                                        aria-describedby="Fullname" placeholder="Enter fullname">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail" class="form-control-label">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail"
                                        aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleRole" class="form-control-label">Role</label>
                                    <select class="form-control" id="exampleRole" name="role">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPhone" class="form-control-label">Phone</label>
                                    <input type="text" class="form-control" id="exampleInputPhone" name="phone"
                                        aria-describedby="Phone" placeholder="Enter phone">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword" class="form-control-label">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword"
                                        placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleStatus" class="form-control-label">Status</label>
                                    <select class="form-control" id="exampleStatus" name="status">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleAddress" class="form-control-label">Address</label>
                                    <textarea class="form-control" id="exampleAddress" rows="4"></textarea>
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
@endsection
