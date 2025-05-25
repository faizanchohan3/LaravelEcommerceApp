<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttr extends Model
{
    protected $fillable=[
        'product_id',
        'size_id',
        'color_id',
        'qty',
        'sku',
        'price',
        'quantity',
        'length',
        'width',
        'height',
        'breadth'
       ];

}
