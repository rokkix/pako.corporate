<?php

namespace Pako\Http\Controllers;

use Illuminate\Http\Request;

use Pako\Category;
use Pako\Http\Requests;
use Pako\Menu;
use Pako\Repositories\ArticlesRepositories;
use Pako\Repositories\CommentsRepositories;
use Pako\Repositories\MenusRepositories;
use Pako\Repositories\PortfoliosRepositories;
use Pako\Repositories\SlidersRepositories;

class ArticlesController extends SiteController
{
    public function __construct(PortfoliosRepositories $p_rep, ArticlesRepositories $a_rep, CommentsRepositories $c_rep)
    {
        parent::__construct(new MenusRepositories(new Menu()));
        $this->p_rep = $p_rep;
        $this->a_rep = $a_rep;
        $this->c_rep = $c_rep;
        $this->template = env('THEME') . '.articles';
    }

    public function index($cat_alias = FALSE) {



        $comments = $this->getComments(2);
        $portfolios = $this->getPortfolios(3);
        $sidebar = view(env('THEME'). '.articles_bar')->with(['comments'=>$comments,'portfolios' => $portfolios])->render();
        $this->vars = array_add($this->vars,'articles_bar' ,$sidebar );
        $articles = $this->getArticles($cat_alias);
        $content = view(env('THEME') . '.articles_content')->with('articles',$articles)->render();
        $this->vars = array_add($this->vars,'content' ,$content );
        
        return $this->renderOutput();
    }

    public function getArticles($alias = FALSE) {
        $where = FALSE;

        if($alias) {
            if (!Category::select('id')->where('alias',$alias)->first()) {
               return abort(404);
            }

            $id = Category::select('id')->where('alias',$alias)->first()->id;

            $where = ['category_id',$id];
        }
        $articles = $this->a_rep->get('*',FALSE,2,$where);
        if($articles) {
            $articles->load('user','category','comments');
        }

        return $articles;

    }

    public function getComments($take) {
        $comments = $this->c_rep->get('*',$take);
        return $comments;
    }
    public function getPortfolios($take) {
        $portfolios = $this->p_rep->get('*',$take,FALSE,FALSE,TRUE);
        return $portfolios;
    }

    public function show($alias = FALSE) {
        
        $article = $this->a_rep->one($alias,['comments' => TRUE]);
        if($article) {
            $article->img = json_decode($article->img);
        }
//        if(!$article) {
//
//        }
        $comments = $this->getComments(2);
        $portfolios = $this->getPortfolios(3);
        $sidebar = view(env('THEME'). '.articles_bar')->with(['comments'=>$comments,'portfolios' => $portfolios])->render();
        $this->vars = array_add($this->vars,'articles_bar' ,$sidebar );
        $content = view(env('THEME'). '.articles_detail')->with('article',$article)->render();
        $this->vars = array_add($this->vars,'content' ,$content );
        return $this->renderOutput();
    }
}
