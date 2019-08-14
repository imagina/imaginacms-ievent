<?php

namespace Modules\Ievent\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterIeventSidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('ievent::ievents.title.ievents'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('ievent::categories.title.categories'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.ievent.category.create');
                    $item->route('admin.ievent.category.index');
                    $item->authorize(
                        $this->auth->hasAccess('ievent.categories.index')
                    );
                });
                $item->item(trans('ievent::organizers.title.organizers'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.ievent.organizer.create');
                    $item->route('admin.ievent.organizer.index');
                    $item->authorize(
                        $this->auth->hasAccess('ievent.organizers.index')
                    );
                });
                $item->item(trans('ievent::events.title.events'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.ievent.event.create');
                    $item->route('admin.ievent.event.index');
                    $item->authorize(
                        $this->auth->hasAccess('ievent.events.index')
                    );
                });
                $item->item(trans('ievent::tickets.title.tickets'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.ievent.ticket.create');
                    $item->route('admin.ievent.ticket.index');
                    $item->authorize(
                        $this->auth->hasAccess('ievent.tickets.index')
                    );
                });
// append




            });
        });

        return $menu;
    }
}
