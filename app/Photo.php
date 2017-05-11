<?php

namespace Pako;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function portfolio() {
        return $this->belongsTo('Pako\Portfolio');
    }
}
