<?php

namespace Modules\Ievent\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ievent\Entities\Organizer;
use Modules\Ievent\Http\Requests\CreateOrganizerRequest;
use Modules\Ievent\Http\Requests\UpdateOrganizerRequest;
use Modules\Ievent\Repositories\OrganizerRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class OrganizerController extends AdminBaseController
{
    /**
     * @var OrganizerRepository
     */
    private $organizer;

    public function __construct(OrganizerRepository $organizer)
    {
        parent::__construct();

        $this->organizer = $organizer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$organizers = $this->organizer->all();

        return view('ievent::admin.organizers.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('ievent::admin.organizers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateOrganizerRequest $request
     * @return Response
     */
    public function store(CreateOrganizerRequest $request)
    {
        $this->organizer->create($request->all());

        return redirect()->route('admin.ievent.organizer.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('ievent::organizers.title.organizers')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Organizer $organizer
     * @return Response
     */
    public function edit(Organizer $organizer)
    {
        return view('ievent::admin.organizers.edit', compact('organizer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Organizer $organizer
     * @param  UpdateOrganizerRequest $request
     * @return Response
     */
    public function update(Organizer $organizer, UpdateOrganizerRequest $request)
    {
        $this->organizer->update($organizer, $request->all());

        return redirect()->route('admin.ievent.organizer.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('ievent::organizers.title.organizers')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Organizer $organizer
     * @return Response
     */
    public function destroy(Organizer $organizer)
    {
        $this->organizer->destroy($organizer);

        return redirect()->route('admin.ievent.organizer.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('ievent::organizers.title.organizers')]));
    }
}
