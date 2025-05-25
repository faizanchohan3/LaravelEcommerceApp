<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributes extends Model
{
    protected $fillable=[
        'category_id',
        'product_id',
        'atributevalue_id',

       ];

}
