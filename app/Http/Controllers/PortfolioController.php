<?php

namespace Pako\Http\Controllers;

use Illuminate\Http\Request;

use Pako\Http\Requests;
use Pako\Menu;
use Pako\Repositories\MenusRepositories;
use Pako\Repositories\PortfoliosRepositories;

class PortfolioController extends SiteController
{
    public function __construct(PortfoliosRepositories $p_rep)
    {
        parent::__construct(new MenusRepositories(new Menu()));
        $this->p_rep = $p_rep;
        $this->template = env('THEME') . '.portfolios';

    }

    public function index() {

        $portfolios = $this->getPortfolios(6);

        $content = view(env('THEME'). '.portfolios_content')->with('portfolios',$portfolios)->render();
        $this->vars = array_add($this->vars,'content' ,$content );

        return $this->renderOutput();

    }

    public function getPortfolios($paginate = FALSE) {
        $portfolios = $this->p_rep->get('*',FALSE, $paginate);
        return $portfolios;
    }

    public function show($alias) {
        $portfolio = $this->p_rep->one($alias);
        $portfolios = $this->getPortfolios();
        
        //dd($portfolio);
        $content = view(env('THEME'). '.portfolio_content')->with(['portfolio' => $portfolio,'portfolios' => $portfolios])->render();
        $this->vars = array_add($this->vars,'content' ,$content );
        return $this->renderOutput();
    }
}
