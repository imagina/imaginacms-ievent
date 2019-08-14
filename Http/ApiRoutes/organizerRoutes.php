<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/organizers'], function (Router $router) {
  $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();
  $router->post('/', [
    'as' => $locale . 'api.ievent.organizers.create',
    'uses' => 'OrganizerApiController@create',
  ]);
  $router->get('/', [
    'as' => $locale . 'api.ievent.organizers.index',
    'uses' => 'OrganizerApiController@index',
  ]);
  $router->put('/{criteria}', [
    'as' => $locale . 'api.ievent.organizers.update',
    'uses' => 'OrganizerApiController@update',
  ]);
  $router->delete('/{criteria}', [
    'as' => $locale . 'api.ievent.organizers.delete',
    'uses' => 'OrganizerApiController@delete',
  ]);
  $router->get('/{criteria}', [
    'as' => $locale . 'api.ievent.organizers.show',
    'uses' => 'OrganizerApiController@show',
  ]);
});
