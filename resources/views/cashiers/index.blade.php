@extends('admin.admin_dashboard')

@section('content')
<div class="page-content">
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h3 class="text-center mb-3 mt-4">Categories</h3>
            <div class="container">
                <div class="row">
                    <div class="col-md-2 stretch-card grid-margin grid-margin-md-0">
                           {{-- Categories Cards --}}
                        @forelse ($categories as $category)
                        <div class="card m-2">
                            <div class="card-body">
                                <h4 class="text-center mt-3 mb-3">{{ $category->name }}</h4>
                                <p class="text-muted  mb-4 fw-light text-wrap">{{ $category->description }}</p>
                                <div class="d-grid">
                                    <form class="card-link" action="{{ route('categories.showProducts', $category->id) }}" method="GET">
                                        @csrf
                                    <input type="submit" class="btn btn-success" value="Show Products">
                                </form>
                                </div>
                            </div>
                        </div>
                        @empty
                  <p>No category found</p>
                  @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
