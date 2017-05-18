<?php

namespace Pako;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['customer','city','text'];
}
