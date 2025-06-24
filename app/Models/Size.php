<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{

    protected $fillable=
    [
'id',
'text'
    ];

    public function size(){
        return $this->belongsTo(ProductAttr::class);
    }
}
