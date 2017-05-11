<?php

namespace Pako;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function article() {
        return $this->belongsTo('Pako\Article');
    }
    public function user() {
        return $this->belongsTo('Pako\User');
    }
}
