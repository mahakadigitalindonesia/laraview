<?php

use Illuminate\Support\Facades\Route;
use Mdigi\LaraView\Helpers\LaraView;

if (LaraView::isLandingPage()) {
    Route::get('/', function () {
        if (!LaraView::isAssetExists()) {
            return view('laraview::errors.install');
        }
        return view('laraview::frontend.index');
    });
}
