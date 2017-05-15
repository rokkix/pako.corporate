<?php

namespace Pako\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Gate;
use Pako\Http\Requests;
use Pako\Http\Controllers\Controller;
use Pako\Repositories\SlidersRepositories;
use Pako\Slider;

class SlidersController extends AdminController
{
    protected $s_rep;

    public function __construct(SlidersRepositories $s_rep)
    {
        if(Gate::denies('VIEW_ADMIN_SLIDER')) {
            abort('403');
        }
        parent::__construct();
        $this->s_rep = $s_rep;

        $this->template = env('THEME') . '.admin.sliders';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->title = 'Редактирование изображений сладера';
        $sliders = $this->getSliders();
        //dd($slider);
        $this->content = view(env('THEME') . '.admin.sliders_content')->with('sliders',$sliders)->render();
        return $this->renderOutput();
    }

    public function getSliders() {
        $slider = $this->s_rep->get();
        return $slider;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (Gate::denies('save',new Slider())) {
            abort(403);
        }
        $this->title = "Добавить новый материал";
        $this->content = view(env('THEME'). '.admin.sliders_create_content')->render();
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
        $result = $this->s_rep->addSlider($request);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect('/admin')->with($result);
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
    public function edit(Slider $slider)
    {
        if(Gate::denies('edit',new Slider())) {
            abort(403);
        }

       
        $this->title = 'Редактирование слайдера - '.$slider->title;
        $this->content = view(env('THEME'). '.admin.sliders_create_content')->with('slider',$slider)->render();
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $result = $this->s_rep->updateSlider($request,$slider);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect()->route('admin.sliders.index')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $result = $this->s_rep->deleteSlider($slider);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect()->route('admin.sliders.index')->with($result);

    
    }
}
