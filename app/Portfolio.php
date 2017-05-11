<?php

namespace Pako;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    public function filter() {
        return $this->belongsTo('Pako\Filter','filter_alias','alias');
    }
    public function photo() {
        return $this->hasMany('Pako\Photo');
    }

}
