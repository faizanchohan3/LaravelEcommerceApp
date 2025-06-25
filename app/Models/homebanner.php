<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\URL;
class homebanner extends Model
{
 protected $fillable=[
'text',
'link',
'image',

 ];

 protected function Image(): Attribute
 {
     return Attribute::make(
         get: fn ($value) => URL::to('public/assets/images/'.$value.'')
     );
 }
}