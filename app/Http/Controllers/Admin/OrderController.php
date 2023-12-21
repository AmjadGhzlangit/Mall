<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;


class OrderController extends Controller
{
   
    public function index()
    {
        $orders = Order::with('seller')->get();
        return view('admin.Order.index',compact('orders'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        // Implement logic to show details of a specific order
        return view('admin.Order.invoice', compact('order'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully');
    }


    public function generatePDF($orderId)
    {
    // Fetch the data for the invoice
    $order = Order::findOrFail($orderId);
    $orders = OrderItem::where('order_id', $orderId)->get();
    $data = ['order' => $order];
    $pdf = Pdf::loadView('admin.Order.invoice', $data);
    return $pdf->download('invoice.pdf');
    // Calculate total
   
    }
}
