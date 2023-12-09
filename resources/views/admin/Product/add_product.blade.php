@extends('admin.admin_dashboard')

@section('content')
    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Products</h4>
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
                        <h6 class="card-title">Add Prodctu</h6>

                        <form class="forms-sample" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" name="name" class="form-control" required string placeholder="Enter products Name">
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Select Category</label>
                                <select class="form-select" name="category_id" required>
                                    <option selected disabled>Select Product Category</option>
                                    @forelse ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty
                                    <p>No category found</p>
                                    @endforelse
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Product Description</label>
                                <input type="text" required name="description" class="form-control" required   placeholder="Enter product Description">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Products Price</label>
                                <input type="text" class="form-control" name="price" required number placeholder="Enter product Price">
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Products Quantity</label>
                                <input type="number" class="form-control" name="quantity" required number placeholder="Enter product quantity">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="image">Products Image</label>
                                <input class="form-control" type="file" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Save</button>
                        </form>

                    </div>
                </div>
            </div>

        </div> <!-- row -->

    </div>
@endsection
