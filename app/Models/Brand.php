<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'img',
        'slug',
        'status',
        
    ];

    public function product(){
        return $this->hasmany(Product::class,'Brand_id','id');
  }
}
