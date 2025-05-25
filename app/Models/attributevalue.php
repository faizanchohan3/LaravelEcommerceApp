<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class attributevalue extends Model
{
     protected $table='atributevalue';
    protected $fillable=['attribute_id','values'];


    public function singleattribute(){
        return $this->hasOne(attribute::class,'id','attribute_id');
    }
    public function value(){
        return $this->hasMany(attributevalue::class,'attribute_id','attribute_id');
    }

}
