<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/birthdays'], function (Router $router) {
  $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();
  $router->get('/', [
    'as' => $locale . 'api.ievent.categories.index',
    'uses' => 'BirthdayApiController@index',
    'middleware' => ['auth:api']
  ]);
});
