<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function product_attribute_value(){
        return $this->hasMany(ProductAttributeValue::class);
    }

    public function product_image(){
        return $this->hasMany(ProductImage::class);
    }

    public function product_attribute_image(){
        return $this->hasMany(ProductAttributeImage::class);
    }

    public function size(){
        return $this->hasMany(Size::class);
    }
}
