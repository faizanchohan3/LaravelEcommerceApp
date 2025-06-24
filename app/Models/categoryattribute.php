<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;
class categoryattribute extends Model
{
    use HasFactory;
    protected $table='_category_attribute';

protected $fillable=['attribute_id','category_id'];
public function attribute(){

    return $this->hasOne(attributevalue::class,'attribute_id','attribute_id')->with('singleattribute');
}
public function category(){

    return $this->hasOne(category::class,'id','category_id');

}
}
