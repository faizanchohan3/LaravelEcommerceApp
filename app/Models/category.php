<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


use App\Models\Product;

class category extends Model
{

    protected $table='categories';
protected $fillable=['name','slug','parent_id'];

public function product(){
    return $this->hasMany(Product::class,'category_id','id');
}


}
