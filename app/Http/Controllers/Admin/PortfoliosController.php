<?php

namespace Pako\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Gate;
use Pako\Filter;
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
        $this->title = "Добавить новую работу";

        //$filters = Filter::select(['title','alias','id'])->get();
       // $lists = array();
        $filter = $this->getFilters()->reduce(function ($returnFilters, $filter) {
            $returnFilters[$filter->alias] = $filter->alias;
            return $returnFilters;
        }, []);
       //dd($filter);



        $this->content = view(env('THEME'). '.admin.portfolios_create_content')->with('filters',$filter)->render();
        return $this->renderOutput();
    }
    public function getFilters() {
        return Filter::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PortfolioRequest $request)
    {
        $result = $this->p_rep->addPortfolio($request);
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
    public function edit(Portfolio $portfolio)
    {
        if(Gate::denies('edit',new Portfolio())) {
            abort(403);
        }

        $portfolio->img = json_decode($portfolio->img);
        $filter = $this->getFilters()->reduce(function ($returnFilters, $filter) {
            $returnFilters[$filter->alias] = $filter->alias;
            return $returnFilters;
        }, []);

        $this->title = 'Редактирование материала - '.$portfolio->title;
        $this->content = view(env('THEME'). '.admin.portfolios_create_content')->with(['filters' => $filter,'portfolio'=>$portfolio])->render();
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PortfolioRequest $request, Portfolio $portfolio)
    {
        $result = $this->p_rep->updatePortfolio($request,$portfolio);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect()->route('admin.portfolios.index')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        $result = $this->p_rep->deletePortfolio($portfolio);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect()->route('admin.portfolios.index')->with($result);
    }
}
