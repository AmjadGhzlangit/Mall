@extends('admin.admin_dashboard')

@section('content')

<div class="page-content">
    @if (session('success'))
    <div class="alert alert-danger">
        {{ session('success') }}
    </div>
@endif
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
                                    <tr>
                                        <th>ID</th>
                                        <th>Seller Name</th>
                                        <th>Order ID</th>
                                        <th>Total Amount</th>
                                        <th>Total Quantity</th>
                                        <th>Order Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                <tr>
                                    <td>{{ $order->seller->id }}</td>
                                    <td>{{ $order->seller->user->name }}</td>
                                    <!-- Display Order Information -->
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->total_amount }}</td>
                                    <td>{{ $order->total_quantity }}</td>   
                                    <td>{{ $order->created_at }}</td>   
                                    <!-- End Display Order Information -->
                                    <td>
                                        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" class="btn btn-danger" value="Delete">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.orders.show', $order->id) }}" method="GET">
                                            @csrf
                                            <input type="submit" class="btn btn-info" value="Show">
                                        </form>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <a href="{{ route('generate.invoice', ['orderId' => $order->id]) }}" class="btn btn-primary" target="_blank">Generate PDF</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No Order</td>
                                </tr>
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
