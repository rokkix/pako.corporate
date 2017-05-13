<?php

namespace Pako\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use Pako\Http\Requests;
use Pako\Http\Controllers\Controller;

class IndexController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        if(Gate::denies('VIEW_ADMIN')) {
            abort(403);
        }
        $this->template = env('THEME').'.admin.index';
    }
    public function index() {

        $this->title = 'Панель администратора';
        
        return $this->renderOutput();
    }
}
