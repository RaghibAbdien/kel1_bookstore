@extends('layouts.dashboard')

@section('root-page', 'Reports & Analytics')
@section('page-title', 'Edit Report')

@section('content')

    <!-- Row start -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Control starts -->
            <div class="card">
                <div class="card-header">
                    <div class="col-lg-12">
                        <h5 class="card-header-text">Form Edit Report</h5>
                    </div>
                </div>

                <div class="card-block">
                    <form>
                        Form Edit Report
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
