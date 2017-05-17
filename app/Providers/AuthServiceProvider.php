<?php

namespace Pako\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Pako\Article;
use Pako\Menu;
use Pako\Permission;
use Pako\Photo;
use Pako\Policies\ArticlePolicy;
use Pako\Policies\MenusPolicy;
use Pako\Policies\PermissionPolicy;
use Pako\Policies\PortfolioPolicy;
use Pako\Policies\SliderPolicy;
use Pako\Policies\UserPolicy;
use Pako\Portfolio;
use Pako\Repositories\PortfoliosRepositories;
use Pako\Slider;
use Pako\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Article::class => ArticlePolicy::class,
        Permission::class => PermissionPolicy::class,
        Menu::class => MenusPolicy::class,
        User::class => UserPolicy::class,
        Slider::class => SliderPolicy::class,
        Portfolio::class => PortfolioPolicy::class,
        Photo::class => PortfolioPolicy::class
        

    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        
        $this->registerPolicies($gate);
        $gate->define('VIEW_ADMIN',function($user) {
            return $user->canDo('VIEW_ADMIN');
        });
        $gate->define('VIEW_ADMIN_ARTICLES',function($user) {
            return $user->canDo('VIEW_ADMIN_ARTICLES');
        });
        $gate->define('EDIT_USERS',function($user) {
            return $user->canDo('EDIT_USERS');
        });
        $gate->define('VIEW_ADMIN_MENU',function($user) {
            return $user->canDo('VIEW_ADMIN_MENU');
        });
        $gate->define('EDIT_MENU',function($user) {
            return $user->canDo('EDIT_MENU');
        });
        $gate->define('VIEW_ADMIN_SLIDER',function($user) {
            return $user->canDo('VIEW_ADMIN_SLIDER');
        });
        $gate->define('VIEW_PORTFOLIOS_SLIDER',function($user) {
            return $user->canDo('VIEW_PORTFOLIOS_SLIDER');
        });
        $gate->define('ADD_PORTFOLIO',function($user) {
            return $user->canDo('ADD_PORTFOLIO');
        });

        //
    }
}
