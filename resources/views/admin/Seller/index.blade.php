@extends('admin.admin_dashboard')

@section('content')
<div class="page-content">

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Sellers</h4>
        
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
                                    <th class="pt-0">Seller Name</th>
                                    <th class="pt-0">Seller Email</th>
                                    <th class="pt-0">Seller Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sellers as $seller)
                                    <tr>
                                        <td>{{ $seller->id }}</td>
                                        <td>{{ $seller->user->name }}</td>
                                        <td>{{ $seller->user->email }}</td>
                                        <td>{{ $seller->status == 1 ? 'Active' : 'Disabled' }}</td>
                                        <td>
                                        <form action="{{ route('admin.sellers.destroy', $seller->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                        </form>
                                    </td>
                                        <td>
                                            <form action="{{ route('admin.sellers.edit', $seller->id) }}" method="GET">
                                                @csrf
                                            <input type="submit" class="btn btn-success" value="Edit">
                                        </form>
                                    </tr>
                                @empty

                                    <p>No Sellers found</p>
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
