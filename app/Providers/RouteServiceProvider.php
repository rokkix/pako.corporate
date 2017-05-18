<?php

namespace Pako\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Pako\Article;
use Pako\Menu;
use Pako\Photo;
use Pako\Portfolio;
use Pako\Review;
use Pako\Service;
use Pako\Slider;
use Pako\User;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Pako\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        $router->pattern('alias','[\w-]+' );

        parent::boot($router);
        $router->bind('articles',function($value) {
            return Article::where('alias',$value)->first();
        });
        $router->bind('portfolios',function($value) {
            return Portfolio::where('alias',$value)->first();
        });
        $router->bind('services',function($value) {
            
            return Service::where('id',$value)->first();
        });
        $router->bind('reviews',function($value) {

            return Review::where('id',$value)->first();
        });
//        $router->bind('photos',function($value) {
//
//        $res =  Photo::where('id',$value)->first();
//        if(!$res) {
//            abort(404);
//        }
//        return $res;
//    });
       
        $router->bind('menus',function($value){

            $result = Menu::where('id',$value)->first();
            if(!$result) {
                abort(404);
            }
            return $result;
        });
        $router->bind('users',function($value){
           return User::find($value);
        });
        $router->bind('sliders',function($value){

            $result = Slider::where('id',$value)->first();
            if(!$result) {
                abort(404);
            }
            return $result;
        });
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => 'web',
        ], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
