<?php

namespace Pako\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Gate;
use Pako\Http\Requests;
use Pako\Http\Controllers\Controller;
use Pako\Portfolio;
use Pako\Repositories\PortfoliosRepositories;

class PortfoliosController extends AdminController
{

    public function __construct(PortfoliosRepositories $p_rep)
    {
        if(Gate::denies('VIEW_PORTFOLIOS_SLIDER')) {
            abort('403');
        }
        parent::__construct();
        $this->p_rep = $p_rep;

        $this->template = env('THEME') . '.admin.portfolios';

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->title = 'Редактирование работ';
        $portfolios = $this->getPortfolios();
        $this->content = view(env('THEME') . '.admin.portfolios_content')->with('portfolios',$portfolios)->render();
        return $this->renderOutput();
    }

    public function getPortfolios() {
        $portfolios = $this->p_rep->get();
        return $portfolios;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        if (Gate::denies('save',new Portfolio())) {
            abort(403);
        }
        $this->title = "Добавить новый материал";

        $categories = Category::select(['title','parent_id','alias','id'])->get();
        $lists = array();
        foreach ($categories as $category) {
            if($category->parent_id == 0){
                $lists[$category->title] = array();

            } else {
                $lists[$categories->where('id',$category->parent_id)->first()->title][$category->id] = $category->title;

            }
        }
        $this->content = view(env('THEME'). '.admin.articles_create_content')->with('categories',$lists)->render();
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
        //
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
