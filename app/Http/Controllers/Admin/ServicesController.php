<?php

namespace Pako\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Gate;
use Pako\Http\Requests;
use Pako\Http\Controllers\Controller;
use Pako\Repositories\ServicesRepositories;
use Pako\Service;

class ServicesController extends AdminController
{

    protected $ser_rep;
    public function __construct(ServicesRepositories $ser_rep)
    {
        parent::__construct();

        if(Gate::denies('VIEW_ADMIN_ARTICLES')) {
            abort(403);
        }
        
        $this->ser_rep = $ser_rep;
        $this->template = env('THEME') . '.admin.services';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->title = 'Редактирование сервиса';
        $services = $this->getServices();

        //dd($slider);
        $this->content = view(env('THEME') . '.admin.services_content')->with('services',$services)->render();
        return $this->renderOutput();
    }
    
    public function getServices() {
        $services = $this->ser_rep->get();
        return $services;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('save',new Service())) {
            abort(403);
        }
        $this->title = "Добавить новый сервис";
        $this->content = view(env('THEME'). '.admin.services_create_content')->render();
        //dd($this->content);
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->ser_rep->addService($request);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect()->route('admin.services.index')->with($result);
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
    public function edit(Service $service)
    {
        if(Gate::denies('edit',new Service())) {
        abort(403);
    }
        // dd($service);

        $this->title = 'Редактирование сервиса - '.$service->title;
        $this->content = view(env('THEME'). '.admin.services_create_content')->with('service',$service)->render();
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $result = $this->ser_rep->updateService($request,$service);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect()->route('admin.services.index')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $result = $this->ser_rep->deleteService($service);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect()->route('admin.services.index')->with($result);
    }
}
