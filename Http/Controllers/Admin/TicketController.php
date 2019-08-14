<?php

namespace Modules\Ievent\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ievent\Entities\Ticket;
use Modules\Ievent\Http\Requests\CreateTicketRequest;
use Modules\Ievent\Http\Requests\UpdateTicketRequest;
use Modules\Ievent\Repositories\TicketRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class TicketController extends AdminBaseController
{
    /**
     * @var TicketRepository
     */
    private $ticket;

    public function __construct(TicketRepository $ticket)
    {
        parent::__construct();

        $this->ticket = $ticket;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$tickets = $this->ticket->all();

        return view('ievent::admin.tickets.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('ievent::admin.tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateTicketRequest $request
     * @return Response
     */
    public function store(CreateTicketRequest $request)
    {
        $this->ticket->create($request->all());

        return redirect()->route('admin.ievent.ticket.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('ievent::tickets.title.tickets')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Ticket $ticket
     * @return Response
     */
    public function edit(Ticket $ticket)
    {
        return view('ievent::admin.tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Ticket $ticket
     * @param  UpdateTicketRequest $request
     * @return Response
     */
    public function update(Ticket $ticket, UpdateTicketRequest $request)
    {
        $this->ticket->update($ticket, $request->all());

        return redirect()->route('admin.ievent.ticket.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('ievent::tickets.title.tickets')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Ticket $ticket
     * @return Response
     */
    public function destroy(Ticket $ticket)
    {
        $this->ticket->destroy($ticket);

        return redirect()->route('admin.ievent.ticket.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('ievent::tickets.title.tickets')]));
    }
}
