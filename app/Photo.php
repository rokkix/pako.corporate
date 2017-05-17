<?php

namespace Pako;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['portfolio_id','img'];
    public function portfolio() {
        return $this->belongsTo('Pako\Portfolio');
    }


}
