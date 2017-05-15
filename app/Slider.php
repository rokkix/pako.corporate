<?php

namespace Pako;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'img', 'desc', 'title'
    ];
}
