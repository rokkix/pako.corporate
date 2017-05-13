<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 13.05.2017
 * Time: 18:12
 */

namespace Pako\Repositories;


use Illuminate\Support\Facades\Gate;
use Pako\Permission;

class PermissionsRepositories extends Repository
{
    protected $r_rep;
    public function __construct(Permission $permission, RolesRepositories $r_rep)
    {
        $this->model = $permission;
        $this->r_rep = $r_rep;
    }

    public function changePermissions($request) {
        if(Gate::denies('change',$this->model)){
            abort(403);
        }
        $data = $request->except('_token');

        $roles = $this->r_rep->get();
        foreach ($roles as $value) {
           // dd($data[$value->id]);
            if(isset($data[$value->id])) { 
                $value->savePermissions($data[$value->id]);
            } else {
                $value->savePermissions([]);
            }
        }
        return ['status' => 'Права обновлены'];
    }
}