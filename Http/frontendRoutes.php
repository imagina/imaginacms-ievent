<?php

use Illuminate\Routing\Router;
if(Request::path()!='backend') {

    /**
    $router->group(['prefix' => trans('ievent::common.uri').'/{slug}'], function (Router $router) {
    **/    
    /** @var Router $router */
    $router->group(['prefix' =>'events/{slug}'], function (Router $router) {
        $locale = LaravelLocalization::setLocale() ?: App::getLocale();

        $router->get('/', [
            'as' => $locale . '.ievent.category',
            'uses' => 'PublicController@index',
        ]);
        
        $router->get('{slugp}', [
            'as' => $locale . '.ievent.event',
            'uses' => 'PublicController@show',
        ]);
        
    });

}