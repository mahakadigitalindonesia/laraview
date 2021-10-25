<?php


namespace Mdigi\LaraView;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class LaraViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'laraview');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config('laraview.php'),
            ], 'laraview-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/'),
            ], 'laraview-views');

            $this->publishes([
                __DIR__ . '/../stubs' => public_path('laraview/'),
            ], 'laraview-assets');
        }
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laraview');
        $this->configureComponents();
        $this->registerRoutes();
    }

    protected function configureComponents()
    {
        $this->callAfterResolving(BladeCompiler::class, function () {
            $this->registerComponent('frontend.layouts.main');
            $this->registerComponent('frontend.about');
            $this->registerComponent('frontend.footer');
            $this->registerComponent('frontend.header');
            $this->registerComponent('frontend.hero');
            $this->registerComponent('frontend.navbar');
            $this->registerComponent('frontend.buttons.primary');
        });
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    protected function registerComponent(string $component)
    {
        Blade::component('laraview::components.' . $component, 'laraview-' . $component);
    }

    protected function routeConfiguration()
    {
        $routeOptions = [
            'prefix' => config('laraview.routes.prefix'),
            'middleware' => config('laraview.routes.middleware')
        ];
//        if (config('laraview.routes.prefix')) {
//            array_push($routeOptions, ['prefix' => config('laraview.routes.prefix')]);
//        }
        return $routeOptions;
    }
}