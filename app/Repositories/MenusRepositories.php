<?php

namespace Pako\Repositories;

use Pako\Menu;

class MenusRepositories extends Repository
{
    public function __construct(Menu $menu)
    {
        $this->model = $menu;
    }
}