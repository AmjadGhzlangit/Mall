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
                                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" class="btn btn-danger" value="Delete">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('orders.edit', $order->id) }}" method="GET">
                                            @csrf
                                            <input type="submit" class="btn btn-success" value="Edit">
                                        </form>
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
