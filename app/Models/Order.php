<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'total_amount',
        'total_quantity',
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
