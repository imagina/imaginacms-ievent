<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/ievent'], function (Router $router) {
    $router->bind('category', function ($id) {
        return app('Modules\Ievent\Repositories\CategoryRepository')->find($id);
    });
    $router->get('categories', [
        'as' => 'admin.ievent.category.index',
        'uses' => 'CategoryController@index',
        'middleware' => 'can:ievent.categories.index'
    ]);
    $router->get('categories/create', [
        'as' => 'admin.ievent.category.create',
        'uses' => 'CategoryController@create',
        'middleware' => 'can:ievent.categories.create'
    ]);
    $router->post('categories', [
        'as' => 'admin.ievent.category.store',
        'uses' => 'CategoryController@store',
        'middleware' => 'can:ievent.categories.create'
    ]);
    $router->get('categories/{category}/edit', [
        'as' => 'admin.ievent.category.edit',
        'uses' => 'CategoryController@edit',
        'middleware' => 'can:ievent.categories.edit'
    ]);
    $router->put('categories/{category}', [
        'as' => 'admin.ievent.category.update',
        'uses' => 'CategoryController@update',
        'middleware' => 'can:ievent.categories.edit'
    ]);
    $router->delete('categories/{category}', [
        'as' => 'admin.ievent.category.destroy',
        'uses' => 'CategoryController@destroy',
        'middleware' => 'can:ievent.categories.destroy'
    ]);
    $router->bind('organizer', function ($id) {
        return app('Modules\Ievent\Repositories\OrganizerRepository')->find($id);
    });
    $router->get('organizers', [
        'as' => 'admin.ievent.organizer.index',
        'uses' => 'OrganizerController@index',
        'middleware' => 'can:ievent.organizers.index'
    ]);
    $router->get('organizers/create', [
        'as' => 'admin.ievent.organizer.create',
        'uses' => 'OrganizerController@create',
        'middleware' => 'can:ievent.organizers.create'
    ]);
    $router->post('organizers', [
        'as' => 'admin.ievent.organizer.store',
        'uses' => 'OrganizerController@store',
        'middleware' => 'can:ievent.organizers.create'
    ]);
    $router->get('organizers/{organizer}/edit', [
        'as' => 'admin.ievent.organizer.edit',
        'uses' => 'OrganizerController@edit',
        'middleware' => 'can:ievent.organizers.edit'
    ]);
    $router->put('organizers/{organizer}', [
        'as' => 'admin.ievent.organizer.update',
        'uses' => 'OrganizerController@update',
        'middleware' => 'can:ievent.organizers.edit'
    ]);
    $router->delete('organizers/{organizer}', [
        'as' => 'admin.ievent.organizer.destroy',
        'uses' => 'OrganizerController@destroy',
        'middleware' => 'can:ievent.organizers.destroy'
    ]);
    $router->bind('event', function ($id) {
        return app('Modules\Ievent\Repositories\EventRepository')->find($id);
    });
    $router->get('events', [
        'as' => 'admin.ievent.event.index',
        'uses' => 'EventController@index',
        'middleware' => 'can:ievent.events.index'
    ]);
    $router->get('events/create', [
        'as' => 'admin.ievent.event.create',
        'uses' => 'EventController@create',
        'middleware' => 'can:ievent.events.create'
    ]);
    $router->post('events', [
        'as' => 'admin.ievent.event.store',
        'uses' => 'EventController@store',
        'middleware' => 'can:ievent.events.create'
    ]);
    $router->get('events/{event}/edit', [
        'as' => 'admin.ievent.event.edit',
        'uses' => 'EventController@edit',
        'middleware' => 'can:ievent.events.edit'
    ]);
    $router->put('events/{event}', [
        'as' => 'admin.ievent.event.update',
        'uses' => 'EventController@update',
        'middleware' => 'can:ievent.events.edit'
    ]);
    $router->delete('events/{event}', [
        'as' => 'admin.ievent.event.destroy',
        'uses' => 'EventController@destroy',
        'middleware' => 'can:ievent.events.destroy'
    ]);
    $router->bind('ticket', function ($id) {
        return app('Modules\Ievent\Repositories\TicketRepository')->find($id);
    });
    $router->get('tickets', [
        'as' => 'admin.ievent.ticket.index',
        'uses' => 'TicketController@index',
        'middleware' => 'can:ievent.tickets.index'
    ]);
    $router->get('tickets/create', [
        'as' => 'admin.ievent.ticket.create',
        'uses' => 'TicketController@create',
        'middleware' => 'can:ievent.tickets.create'
    ]);
    $router->post('tickets', [
        'as' => 'admin.ievent.ticket.store',
        'uses' => 'TicketController@store',
        'middleware' => 'can:ievent.tickets.create'
    ]);
    $router->get('tickets/{ticket}/edit', [
        'as' => 'admin.ievent.ticket.edit',
        'uses' => 'TicketController@edit',
        'middleware' => 'can:ievent.tickets.edit'
    ]);
    $router->put('tickets/{ticket}', [
        'as' => 'admin.ievent.ticket.update',
        'uses' => 'TicketController@update',
        'middleware' => 'can:ievent.tickets.edit'
    ]);
    $router->delete('tickets/{ticket}', [
        'as' => 'admin.ievent.ticket.destroy',
        'uses' => 'TicketController@destroy',
        'middleware' => 'can:ievent.tickets.destroy'
    ]);
// append




});
