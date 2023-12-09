@extends('admin.admin_dashboard')

@section('content')
    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Sellers</h4>
            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                    <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i
                            data-feather="calendar" class="text-primary"></i></span>
                    <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date"
                        data-input>
                </div>
                <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="printer"></i>
                    Print
                </button>
                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                    Download Report
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 col-xl-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add Seller</h6>

                        <form class="forms-sample" action="{{ route('sellers.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Seller Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter seller name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Seller Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter seller email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Seller Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter seller password">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Seller Status</label>
                                <select class="form-select" name="status" required>
                                    <option selected disabled>Select Seller Status</option>
                                    <option value="{{ 1 }}">{{ 'ACTIVE' }}</option>
                                    <option value="{{ 0 }}">{{ 'DISABLED' }}</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>

                    </div>
                </div>
            </div>

        </div> <!-- row -->

    </div>
@endsection
