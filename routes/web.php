<?php

use Illuminate\Support\Facades\Route;
use Mdigi\LaraView\Helpers\LaraView;

Route::get('/', function () {
    if (!LaraView::isAssetExists()) {
        return view('laraview::errors.install');
    }
    return view('laraview::frontend.index');
});