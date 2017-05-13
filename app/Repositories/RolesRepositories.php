<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 13.05.2017
 * Time: 18:13
 */

namespace Pako\Repositories;


use Pako\Role;

class RolesRepositories extends Repository
{
    public function __construct(Role $role)
    {
        $this->model = $role;
    }
}