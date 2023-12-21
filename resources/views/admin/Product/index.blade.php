@extends('admin.admin_dashboard')

@section('content')
<div class="page-content">

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Products</h4>
        
    </div>
</div>
<div class="row">
    <div class="col-lg-7 col-xl-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="pt-0">id</th>
                                    <th class="pt-0">Product Name</th>
                                    <th class="pt-0">Category Name</th>
                                    <th class="pt-0">Product Descripition</th>
                                    <th class="pt-0"> Price</th>
                                    <th class="pt-0"> Quantity</th>
                                    <th class="pt-0"> Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ optional($product->category)->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td><img src="{{ asset('storage/'.$product->image) }}" alt="" width="30px" height="30px"></td>
                                        <td>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                        <input type="submit" class="btn btn-danger" value="Delete Product">
                                        </form>
                                    </td>
                                        <td>
                                            <form action="{{ route('admin.products.edit', $product->id) }}" method="GET">
                                                @csrf
                                            <input type="submit" class="btn btn-success" value="Edit Product">
                                        </form>
                                    </tr>
                                @empty

                                    <p>No Products found</p>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div> <!-- row -->

</div>
@endsection
