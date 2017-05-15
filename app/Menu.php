<?php

namespace Pako;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['title','path','parent'];

    public function delete(array $option = []) {
        $child = self::where('parent',$this->id)->delete();

        parent::delete($option);
    }
}


