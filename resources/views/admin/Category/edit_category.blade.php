@extends('admin.admin_dashboard')

@section('content')
    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
            </div>
            
        </div>
        <div class="row">
            <div class="col-lg-7 col-xl-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Category</h6>

                        <form class="forms-sample" action="{{ route('admin.categories.update',$category) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Category Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $category->name }}" placeholder="Enter category name">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Category Description</label>
                                <input type="text" class="form-control" value="{{ $category->description }}" name="description" placeholder="Enter category description">
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Edit Category</button>
                        </form>

                    </div>
                </div>
            </div>

        </div> <!-- row -->

    </div>
@endsection
