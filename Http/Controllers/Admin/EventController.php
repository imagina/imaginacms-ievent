<?php

namespace Modules\Ievent\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ievent\Entities\Event;
use Modules\Ievent\Http\Requests\CreateEventRequest;
use Modules\Ievent\Http\Requests\UpdateEventRequest;
use Modules\Ievent\Repositories\EventRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Ievent\Repositories\CategoryRepository;
use Modules\Ievent\Entities\Status;
use Modules\User\Repositories\RoleRepository;
use Modules\User\Repositories\UserRepository;

class EventController extends AdminBaseController
{
    /**
     * @var EventRepository
     */
    private $event;
    /**
     * @var CategoryRepository
     */
    private $category;
     /**
     * @var Status
     */
    private $status;
     /**
     * @var Role
     */
    private $role;

    /**
     * @var Role
     */
    private $user;

    public function __construct(
        EventRepository $event,
        CategoryRepository $category,
        Status $status,
        RoleRepository $role,
        UserRepository $user
    )
    {
        parent::__construct();

        $this->event = $event;
        $this->category = $category;
        $this->status = $status;
        $this->role = $role;
        $this->user=$user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $events = $this->event->all();
        return view('ievent::admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->category->all();
        $status = $this->status->lists();
        $users= $this->user->all();
        return view('ievent::admin.events.create',compact('categories','status','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateEventRequest $request
     * @return Response
     */
    public function store(CreateEventRequest $request)
    {
        $this->event->create($request->all());

        return redirect()->route('admin.ievent.event.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('ievent::events.title.events')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Event $event
     * @return Response
     */
    public function edit(Event $event)
    {
        return view('ievent::admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Event $event
     * @param  UpdateEventRequest $request
     * @return Response
     */
    public function update(Event $event, UpdateEventRequest $request)
    {
        $this->event->update($event, $request->all());

        return redirect()->route('admin.ievent.event.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('ievent::events.title.events')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Event $event
     * @return Response
     */
    public function destroy(Event $event)
    {
        $this->event->destroy($event);

        return redirect()->route('admin.ievent.event.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('ievent::events.title.events')]));
    }
}
