<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'ProductId',
        'Price',
        'Name',
        'image',
        'quntity',
        'total',
        'delveryId',
    ];

    public function user()
{
    return $this->belongsTo(User::class,'userId','id'); 
}
public function order()
{
    return $this->hasmany(Order::class,'orderId','id'); 
}
public function delivery()
{
    return $this->belongsTo(User::class,'delveryId','id'); 
}
}
