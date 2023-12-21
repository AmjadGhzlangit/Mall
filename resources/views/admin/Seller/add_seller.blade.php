@extends('admin.admin_dashboard')

@section('content')
    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Sellers</h4>
            </div>
            
        </div>
        <div class="row">
            <div class="col-lg-7 col-xl-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add Seller</h6>

                        <form class="forms-sample" action="{{ route('admin.sellers.store') }}" method="POST">
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
