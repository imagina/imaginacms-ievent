<?php

namespace Modules\Ievent\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Ievent\Events\Handlers\RegisterIeventSidebar;

class IeventServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterIeventSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('categories', array_dot(trans('ievent::categories')));
            $event->load('organizers', array_dot(trans('ievent::organizers')));
            $event->load('events', array_dot(trans('ievent::events')));
            $event->load('tickets', array_dot(trans('ievent::tickets')));
            // append translations




        });
    }

    public function boot()
    {
        $this->publishConfig('ievent', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Ievent\Repositories\CategoryRepository',
            function () {
                $repository = new \Modules\Ievent\Repositories\Eloquent\EloquentCategoryRepository(new \Modules\Ievent\Entities\Category());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Ievent\Repositories\Cache\CacheCategoryDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Ievent\Repositories\OrganizerRepository',
            function () {
                $repository = new \Modules\Ievent\Repositories\Eloquent\EloquentOrganizerRepository(new \Modules\Ievent\Entities\Organizer());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Ievent\Repositories\Cache\CacheOrganizerDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Ievent\Repositories\EventRepository',
            function () {
                $repository = new \Modules\Ievent\Repositories\Eloquent\EloquentEventRepository(new \Modules\Ievent\Entities\Event());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Ievent\Repositories\Cache\CacheEventDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Ievent\Repositories\TicketRepository',
            function () {
                $repository = new \Modules\Ievent\Repositories\Eloquent\EloquentTicketRepository(new \Modules\Ievent\Entities\Ticket());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Ievent\Repositories\Cache\CacheTicketDecorator($repository);
            }
        );
// add bindings




    }
}
