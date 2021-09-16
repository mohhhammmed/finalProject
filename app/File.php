<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
     protected $fillable=['title','desc','mainFile'];
     protected $table='files';
}
