@extends('admin.layouts.app_cashier')


@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Invoice</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
<div class="card">
  <div class="card-body">
    <div class="container-fluid d-flex justify-content-between">
      <div class="col-lg-3 ps-0">
        <a href="#" class="noble-ui-logo logo-light d-block mt-3">Al Maydan<span>Mall</span></a>                 
        <p><br> Al Maydan<br>Damascus</p>
        <h5 class="mt-5 mb-2 text-muted">Invoice by :</h5>
        <p>Joseph E Carr,<br> 102, 102  Crown Street,<br> London, W3 3PR.</p>
      </div>
      <div class="col-lg-3 pe-0">
        <h4 class="fw-bolder text-uppercase text-end mt-4 mb-2">invoice</h4>
        <h6 class="text-end mb-5 pb-4"># INV-</h6>
        <p class="text-end mb-1">Balance Due</p>
        <h4 class="text-end fw-normal">$ 72,420.00</h4>
        {{-- <h6 class="mb-0 mt-3 text-end fw-normal mb-2"><span class="text-muted">Invoice Date :</span> {{ $orders->created_at }}</h6> --}}
      </div>
    </div>
    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
      <div class="table-responsive w-100">
          <table class="table table-bordered">
            <thead>
              <tr>
                  <th>#</th>
                  <th class="text-center">Product</th>
                  <th class="text-center">Quantity</th>
                  <th class="text-center">Unit cost</th>
                  <th class="text-center">Total</th>
                </tr>
            </thead>
            <tbody>
              @php
    $total = 0; // Initialize total variable
    @endphp
                @foreach ( $orders as $order)
                <tr class="text-center">
                <td class="text-center">{{ $order->id }}</td>
                <td>{{ $order->product->name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->product->price }}</td>
                <td>{{ $order->price }}$</td>
              </tr>
              @php
              $total += $order->price; // Accumulate the price to the total
           @endphp
                @endforeach
                
              
            </tbody>
          </table>
        </div>
    </div>
    <div class="container-fluid mt-5 w-100">
      <div class="row">
        <div class="col-md-6 ms-auto">
            <div class="table-responsive">
              <table class="table">
                  <tbody>
                    <tr class="bg-dark">
                      <td class="text-bold-800">Total</td>
                      <td class="text-bold-800 text-end">$ {{ number_format($total, 2) }}</td>
                    </tr>
                  </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
    <div class="container-fluid w-100">
      <form action="{{ route('store.order' , $order->id) }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-primary float-end mt-4 ms-2">
              <i data-feather="send" class="me-3 icon-md"></i>Order
          </button>
      </form>

       

  </div>
  </div>
</div>
        </div>
    </div>
</div>
@endsection