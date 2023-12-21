<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CashierController extends Controller
{

    public function dashboard()
    {
        $categories = Category::all();

        return view('cashiers.index', compact('categories'));
    }

    public function showProducts(Category $category)
    {
        $products = $category->product()->get();
        return view('cashiers.show_products', compact('category', 'products'));
    }

    public function addToCart(Request $request)
    {

        try {
            $order = Order::create([
                'seller_id' => 1,
            ]);

            foreach ($request->products as $productId => $productData) {
                $product = Product::find($productId);

                // Check if the requested quantity is greater than the available stock
                if ($product->quantity < $productData['quantity']) {
                    return redirect()->back()->withErrors(['error' => 'The requested quantity is greater than the available stock for ' . $product->name]);
                }

                $orderItem = OrderItem::create([
                    'product_id' => $productId,
                    'order_id' => $order->id,
                    'price' => $productData['quantity'] * $productData['price'],
                    'quantity' => $productData['quantity'],
                ]);
                $updatedQuantity = $product->quantity - $productData['quantity'];

                $product->update([
                    'quantity' => $updatedQuantity,
                ]);
            }

            return redirect()->route('showInvoice', ['orderItem' => $orderItem]);
        } catch (\Exception $e) {
            // Handle the exception
            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.' . $e->getMessage()]);
        }
    }



    public function showInvoice(OrderItem $orderItem)
    {
        $orders = $orderItem->with('product')->get();
        return view('cashiers.invoice', compact('orders'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function storeOrder($orderId)
    {
        // Retrieve the order using the ID
        $order = Order::with('orderItems')->find($orderId);
        // Initialize variables to store updated totals
        $totalAmount = 0;
        $totalQuantity = 0;

        // Loop through order items and calculate updated totals
        foreach ($order->orderItems as $orderItem) {
            $totalAmount += $orderItem->price;
            $totalQuantity += $orderItem->quantity;
        }

        // Update the order with the calculated totals
        $order->update([
            'total_amount' => $totalAmount,
            'total_quantity' => $totalQuantity,
        ]);

        return redirect()->route('cashier.dashboard')->with('success', 'Order added successfully');
    }
}
