<?php


namespace Mdigi\LaraView;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Mdigi\LaraView\Helpers\LaraView;

class LaraViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        if (LaraView::isConfigPublished()) {
            $this->mergeConfigFrom(config_path('laraview.php'), 'laraview');
        } else {
            $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'laraview');
        }
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('laraview.php'),
            ], 'laraview-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path(LaraView::VIEWS_PATH),
            ], 'laraview-views');

            $this->publishes([
                __DIR__ . '/../stubs' => public_path(LaraView::ASSETS_PATH),
            ], 'laraview-assets');
        }
        if (LaraView::isViewsPublished()) {
            $this->loadViewsFrom(resource_path(LaraView::VIEWS_PATH), 'laraview');
        } else {
            $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laraview');
        }
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
            $this->registerComponent('frontend.logo');
            $this->registerComponent('frontend.buttons.primary');
            $this->registerComponent('frontend.buttons.primary-icon');
            $this->registerComponent('backend.layouts.main');
            $this->registerComponent('backend.layouts.authenticated');
            $this->registerComponent('backend.guest');
            $this->registerComponent('backend.navbar');
            $this->registerComponent('backend.sidebar');
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
        return [
            'prefix' => config('laraview.routes.prefix'),
            'middleware' => config('laraview.routes.middleware')
        ];
    }
}