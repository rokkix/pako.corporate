<?php

namespace Pako\Http\Controllers;

use Illuminate\Http\Request;

use Config;
use Pako\Http\Requests;
use Pako\Menu;
use Pako\Repositories\ArticlesRepositories;
use Pako\Repositories\MenusRepositories;
use Pako\Repositories\PortfoliosRepositories;
use Pako\Repositories\ReviewsRepositories;
use Pako\Repositories\SlidersRepositories;

class IndexController extends SiteController
{
    public function __construct(SlidersRepositories $s_rep,PortfoliosRepositories $p_rep, ReviewsRepositories $r_rep, ArticlesRepositories $a_rep)
    {
        parent::__construct(new MenusRepositories(new Menu()));
        $this->a_rep = $a_rep;
        $this->p_rep = $p_rep;
        $this->r_rep = $r_rep;
        $this->s_rep = $s_rep;
        $this->template = env('THEME') . '.index';
        $this->bar = 'right';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = view(env('THEME').'.content')->render();
        $this->vars = array_add($this->vars,'content' ,$content );
        $articles = $this->getArticles();
        $blog = view(env('THEME').'.blog')->with('articles',$articles)->render();
        $this->vars = array_add($this->vars,'blog' ,$blog );
        $reviews = $this->getReviews();
        $reviews = view(env('THEME').'.reviews')->with('reviews',$reviews)->render();
        $this->vars = array_add($this->vars,'reviews' ,$reviews );
        $portfolio = $this->getPortfolio();
        $sidebar_portfolio = view(env('THEME').'.sidebar_portfolio')->with('portfolios',$portfolio)->render();
        $this->vars = array_add($this->vars,'sidebar_portfolio' ,$sidebar_portfolio);
        $sliderItems = $this->getSliders();
        
        
        $sliders = view(env('THEME') . '.slider')->with('sliders',$sliderItems)->render();
        $this->vars = array_add($this->vars,'sliders' ,$sliders);
        return $this->renderOutput();
    }
    
    protected function getArticles() {
        $articles = $this->a_rep->get('*',5);
        return $articles;
    }
    
    protected function getReviews() {
        $reviews = $this->r_rep->get();
        return $reviews;
    }

    protected function getPortfolio() {
        $portfolio = $this->p_rep->get();
        return $portfolio;
    }
    
    public function getSliders() {
        $sliders = $this->s_rep->get('*');
        
        if($sliders->isEmpty()) {
            return FALSE;
        }
        $sliders->transform(function($item,$key){
            $item->img = Config::get('setting.slider_path') .'/'. $item->img;
            return $item;
        });

        return $sliders;    
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
