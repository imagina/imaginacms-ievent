<?php

return [
    'ievent.categories' => [
        'index' => 'ievent::categories.list resource',
        'create' => 'ievent::categories.create resource',
        'edit' => 'ievent::categories.edit resource',
        'destroy' => 'ievent::categories.destroy resource',
    ],
    'ievent.organizers' => [
        'index' => 'ievent::organizers.list resource',
        'create' => 'ievent::organizers.create resource',
        'edit' => 'ievent::organizers.edit resource',
        'destroy' => 'ievent::organizers.destroy resource',
    ],
    'ievent.events' => [
        'index' => 'ievent::events.list resource',
        'create' => 'ievent::events.create resource',
        'edit' => 'ievent::events.edit resource',
        'destroy' => 'ievent::events.destroy resource',
    ],
    'ievent.tickets' => [
        'index' => 'ievent::tickets.list resource',
        'create' => 'ievent::tickets.create resource',
        'edit' => 'ievent::tickets.edit resource',
        'destroy' => 'ievent::tickets.destroy resource',
    ],
// append




];
