<?php

namespace Pako;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function roles() {
        return $this->belongsToMany('Pako\Role','permission_role');
    }
}
