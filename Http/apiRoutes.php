<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/ievent/v1'], function (Router $router) {

  // Categories Routes
  require('ApiRoutes/categoryRoutes.php');

  // Event Routes
  require('ApiRoutes/eventRoutes.php');

  // Organizer Routes
  require('ApiRoutes/organizerRoutes.php');

  // Birthdays
  require ('ApiRoutes/birthdayRoutes.php');
});
