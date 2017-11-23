<?php

namespace Jblv\Admin\ApiTester;

use Jblv\Admin\Admin;

trait BootExtension
{
    /**
     * {@inheritdoc}
     */
    public static function boot()
    {
        static::registerRoutes();

        static::importAssets();

        Admin::extend('api-tester', __CLASS__);
    }

    /**
     * Register routes for daimakuai-ext.
     *
     * @return void
     */
    protected static function registerRoutes()
    {
        parent::routes(function ($router) {
            /* @var \Illuminate\Routing\Router $router */
            $router->get('api-tester', 'Jblv\Admin\ApiTester\ApiTesterController@index')->name('api-tester-index');
            $router->post('api-tester/handle', 'Jblv\Admin\ApiTester\ApiTesterController@handle')->name('api-tester-handle');
        });
    }

    /**
     * {@inheritdoc}
     */
    public static function import()
    {
        parent::createMenu('Api tester', 'api-tester', 'fa-sliders');

        parent::createPermission('Api tester', 'ext.api-tester', 'api-tester*');
    }

    /**
     * Import assets into daimakuai-ext.
     */
    public static function importAssets()
    {
        Admin::js('/vendor/api-tester/prism.js');
        Admin::css('/vendor/api-tester/prism.css');
    }
}