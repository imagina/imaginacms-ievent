<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/events'], function (Router $router) {
  $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();
  $router->post('/', [
    'as' => $locale . 'api.ievent.events.create',
    'uses' => 'EventApiController@create',
  ]);
  $router->get('/', [
    'as' => $locale . 'api.ievent.events.index',
    'uses' => 'EventApiController@index',
  ]);
  $router->put('/{criteria}', [
    'as' => $locale . 'api.ievent.events.update',
    'uses' => 'EventApiController@update',
  ]);
  $router->delete('/{criteria}', [
    'as' => $locale . 'api.ievent.events.delete',
    'uses' => 'EventApiController@delete',
  ]);
  $router->get('/{criteria}', [
    'as' => $locale . 'api.ievent.events.show',
    'uses' => 'EventApiController@show',
  ]);
});
