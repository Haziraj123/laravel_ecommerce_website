<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';  // Table name
    protected $primaryKey = 'id';  

    protected $fillable = [
        'order_id',
        'product_id',
        'product_title',
        'quantity',
        'image'
    ];

    // Define the relationship to the Order model
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id'); // Specify foreign key if it's not the default 'order_id'
 
    }
     // Define the relationship to the Product model
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
