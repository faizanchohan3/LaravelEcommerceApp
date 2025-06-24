<?php

namespace App\Models;

use App\Models\color;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Size;
class ProductAttr extends Model
{
    use HasFactory;

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
       public function sizes(){

        return $this->hasOne(Size::class,'id','size_id');
    }
    public function colors(){

        return $this->hasOne(color::class,'id','color_id');
    }
}
