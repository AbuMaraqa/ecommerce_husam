<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'orders_items';

    public function order(){
        return $this->belongsTo(Orders::class , 'order_id' , 'id');
    }

    public function product(){
        return $this->belongsTo(Product::class , 'product_id' , 'id');
    }
}
