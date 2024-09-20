<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";      // table name
    protected $primarykey = "id"; 
    
    protected $fillable = [
        'user_id', 'order_id', 'name', 'email', 'phone', 'address','city','state','postal_code', 'payment_method', 'payment_status', 'total', 'delivery_status'
    ];
    
    // Define the relationship to OrderItem
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');// Specify foreign key if it's not the default 'order_id'
    }
}
