<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tempuser extends Model
{
use HasFactory;

protected $fillable=[

'user_id',
'user_type',
'token',

];


}
