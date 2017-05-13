<?php

namespace Pako;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users() {
        return $this->belongsToMany('Pako\User','role_user');

    }
    public function perms() {
        return $this->belongsToMany('Pako\Permission','permission_role');
    }
}
