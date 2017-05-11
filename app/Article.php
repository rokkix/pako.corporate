<?php

namespace Pako;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function user() {
        return $this->belongsTo('Pako\User');
    }
    public function category() {
        return $this->belongsTo('Pako\Category');
    }
    public function comments() {
        return $this->hasMany('Pako\Comment');
    }
}
