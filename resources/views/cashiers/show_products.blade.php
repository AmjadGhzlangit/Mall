@extends('admin.admin_dashboard')

@section('content')
    <div class="page-content">

        <!-- First Row [Products]-->
        <h2 class="font-weight-bold mb-2">{{ $category->name }}</h2>
        <p class="font-italic text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>

        <form action="{{ route('addToCart') }}" method="POST">
            @csrf

            <div class="row pb-5 mb-4">
                @forelse ($products as $product)
                    <div class="col-lg-3 col-md-4 mb-4 mb-lg-4">
                        <!-- Card-->
                        <div class="card rounded shadow-sm border-0">
                            <div class="card-body p-4"><img src="{{ asset('storage/'.$product->image) }}" alt="" class="img-fluid d-block mx-auto mb-3">
                                <h5> <a href="#" >{{ $product->name }}</a></h5>
                                <p class="small text-muted font-italic mb-3">{{ $product->description }}</p>
                                <p class=" text-muted font-italic mb-3">Price {{ $product->price }}$</p>

                                <input type="hidden" name="products[{{ $product->id }}][id]" value="{{ $product->id }}">
                                <input type="hidden" name="products[{{ $product->id }}][price]" value="{{ $product->price }}">
                                <label for="name" class="form-label">Quantity</label>
                                <input type="number" class="form-control" min="1" name="products[{{ $product->id }}][quantity]" placeholder="0">
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No products found</p>
                @endforelse
            </div>

            <button type="submit" class="btn btn-primary">Add All to Cart</button>
        </form>

    </div>
@endsection
