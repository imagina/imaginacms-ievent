<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/categories'], function (Router $router) {
  $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();
  $router->post('/', [
    'as' => $locale . 'api.ievent.categories.create',
    'uses' => 'CategoryApiController@create',
  ]);
  $router->get('/', [
    'as' => $locale . 'api.ievent.categories.index',
    'uses' => 'CategoryApiController@index',
  ]);
  $router->put('/{criteria}', [
    'as' => $locale . 'api.ievent.categories.update',
    'uses' => 'CategoryApiController@update',
  ]);
  $router->delete('/{criteria}', [
    'as' => $locale . 'api.ievent.categories.delete',
    'uses' => 'CategoryApiController@delete',
  ]);
  $router->get('/{criteria}', [
    'as' => $locale . 'api.ievent.categories.show',
    'uses' => 'CategoryApiController@show',
  ]);
});
