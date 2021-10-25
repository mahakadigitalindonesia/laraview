<?php
namespace Mdigi\LaraView\Helpers;

class LaraView
{
    const ASSETS_PATH = 'mdigi/laraview';
    const VIEWS_PATH = 'views/vendor/mdigi/laraview';

    public static function isAssetExists()
    {
        return is_dir(public_path(self::ASSETS_PATH));
    }

    public static function isViewsPublished()
    {
        return is_dir(resource_path(self::VIEWS_PATH));
    }

    public static function isConfigPublished()
    {
        return file_exists(config_path('laraview.php'));
    }


}