<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductCart extends Model
{
    use HasFactory;
    public function user(){
        return $this->hasOne( 'App\Models\user', 'id', 'user-id');
    }
    public function product(){
             return $this->belongsTo(Product::class, 'product_id');

    }
}
