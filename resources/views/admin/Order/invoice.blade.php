<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice #6</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-center">Order Details</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: #6</span> <br>
                    <span>Date:{{ $order->created_at->format('d-m-Y h:i A') }}</span> <br>
                    <span>Zip code : 560077</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Date</th>
                <th>Total_Price</th>
                <th>Total_Quantity</th>
                <th width="50%" colspan="2" class="text-center">Sller Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $order->id }}</td>
                
                <td>{{ $order->created_at->format('d-m-Y h:i A') }}</td>
                
                <td>{{ $order->total_amount }}</td>
                
                <td>{{ $order->total_quantity }}</td>

                <td>{{ $order->seller->user->name}}</td>
                <td>{{ $order->seller->user->email}}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->product->name }}</td>
                <td>${{ $item->product->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td class="fw-bold">${{ $item->total }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
   
    <br>
    <p class="text-center">
        Thank your for shopping with Mall 
    </p>

</body>
</html>