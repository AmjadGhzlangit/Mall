<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CashierController extends Controller
{

    public function index()
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
        $order = Order::create([
            'seller_id' => auth()->user()->id,
        ]);

        foreach ($request->products as $productId => $productData) {
            $orderItem = OrderItem::create([
                'product_id' => $productId,
                'order_id' => $order->id,
                'price' => $productData['quantity'] * $productData['price'],
                'quantity' => $productData['quantity'],
            ]);  
            $product = $orderItem->product;
            $product->update([
                'quantity' => $product->quantity - $productData['quantity'],
            ]);    
        }
        
        return redirect()->route('showInvoice', ['orderItem' => $orderItem]);
    }

    public function showInvoice(OrderItem $orderItem)
    {
        return view('cashiers.invoice');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
