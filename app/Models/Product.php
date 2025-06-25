<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\URL;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductAttributes;
use App\Models\ProductAttributeValue;
use App\Models\ProductAttr;
use App\Models\ProductImage;
use App\Models\ProductAttributeImage;
use App\Models\Size;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'float',
        'stock' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function product_attribute(){
        return $this->hasMany(ProductAttributes::class);
    }
    public function product_attr(){
        return $this->hasMany(ProductAttr::class,'product_id','id')->with('sizes','colors');
    }


    public function size(){
        return $this->hasMany(Size::class);
    }
}
