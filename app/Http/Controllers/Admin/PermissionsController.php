<?php

namespace Pako\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Pako\Http\Requests;
use Pako\Http\Controllers\Controller;
use Pako\Repositories\PermissionsRepositories;
use Pako\Repositories\RolesRepositories;

class PermissionsController extends AdminController
{
    protected $per_rep;
    protected $r_rep;
    
    public function __construct(PermissionsRepositories $per_rep, RolesRepositories $r_rep)
    {
        parent::__construct();
        if(Gate::denies('EDIT_USERS')) {
            abort(403);
        }
        $this->per_rep = $per_rep;
        $this->r_rep = $r_rep;
        $this->template = env('THEME').'.admin.permissions';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $this->title = 'Менеджер прав пользователей';
        $roles = $this->getRoles();
        $permissions = $this->getPermissions();
        $this->content = view(env('THEME').'.admin.permissions_content')->with(['roles'=>$roles,'priv'=>$permissions])->render();
        return $this->renderOutput();
    }

    public function getRoles() {
        $roles = $this->r_rep->get();
        return $roles;

    }
    public function getPermissions() {
        $permissions = $this->per_rep->get();
        return $permissions;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->per_rep->changePermissions($request);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return back()->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
