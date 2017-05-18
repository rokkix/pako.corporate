<?php

namespace Pako\Http\Controllers;

use Illuminate\Http\Request;

use Menu;
use Pako\Http\Requests;
use Pako\Repositories\MenusRepositories;

class SiteController extends Controller
{
    protected $ser_rep;
    protected $p_rep;
    protected $s_rep;
    protected $a_rep;
    protected $m_rep;
    protected $r_rep;
    protected $c_rep;
    protected $template;
    protected $vars = [];
    protected $bar = FALSE;
    protected $contentRightBar = FALSE;
    protected $contentLeftBar = FALSE;
    
    protected $title;
    protected $meta_desc;
    protected $keywords;
    
    public function __construct(MenusRepositories $m_rep)
    {
         $this->m_rep = $m_rep;      
    }
    
    protected function renderOutput(){
        
        $menu = $this->getMenu();


        $navigation = view(env('THEME') .'.navigation')->with('menu',$menu)->render();
        $this->vars = array_add($this->vars,'navigation', $navigation);

        $footer = view(env('THEME') . '.footer')->render();
        $this->vars = array_add($this->vars,'footer',$footer);

        return view($this->template)->with($this->vars);
    }
    
    public function getMenu(){
        $menu = $this->m_rep->get();
        $mBuilder = Menu::make('MyNav',function($m) use ($menu) {
            foreach ($menu as $item) {
                if($item->parent == 0){
                    $m->add($item->title,$item->path)->id($item->id);
                } else {
                    if($m->find($item->parent)) {
                        $m->find($item->parent)->add($item->title,$item->path)->id($item->id);
                    }
                }
            }
        });
        //dd($mBuilder);
        return $mBuilder;
    }
}
