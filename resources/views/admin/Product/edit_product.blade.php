@extends('admin.admin_dashboard')

@section('content')
    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Products</h4>
            </div>
            
        </div>
        <div class="row">
            <div class="col-lg-7 col-xl-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Product</h6>

                        <form class="forms-sample" action="{{ route('admin.products.update',$product) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $product->name }}" placeholder="Enter category name">
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Select Category</label>
                                <select class="form-select" name="category_id" required>
                                    <option selected disabled>Select Product Category</option>
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif>
                                            {{ $category->name }}
                                        </option>
                                    @empty
                                        <p>No category found</p>
                                    @endforelse
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Product Description</label>
                                <input type="text" required name="description" class="form-control" value="{{ $product->description }}" required   placeholder="Enter product Description">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Products Price</label>
                                <input type="text" class="form-control" name="price" value="{{ $product->price }}" required number placeholder="Enter product Price">
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Products Quantity</label>
                                <input type="number" class="form-control" name="quantity"value="{{ $product->quantity }}" required number placeholder="Enter product quantity">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="image">Products Image</label>
                                <input class="form-control" type="file" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Edit</button>
                        </form>

                    </div>
                </div>
            </div>

        </div> <!-- row -->

    </div>
@endsection
