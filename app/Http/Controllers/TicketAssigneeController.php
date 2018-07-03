<?php namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use App\Events\TicketUpdated;
use App\Services\Ticketing\TicketRepository;

class TicketAssigneeController extends Controller
{
    /**
     * TicketRepository instance.
     *
     * @var TicketRepository
     */
    private $tickets;

    /**
     * Laravel request instance.
     *
     * @var Request
     */
    private $request;

    /**
     * TicketAssigneeController constructor.
     *
     * @param TicketRepository $tickets
     * @param Request $request
     */
    public function __construct(TicketRepository $tickets, Request $request)
    {
        $this->tickets = $tickets;
        $this->request   = $request;
    }

    /**
     * Assign ticket(s) to specified agent.
     */
    public function change()
    {
        $originalTickets = $this->tickets->find($this->request->get('tickets'));

        $this->authorize('update', Ticket::class);

        $this->validate($this->request, [
            'tickets'   => 'required|array|min:1',
            'tickets.*' => 'required|integer',
        ]);

        $this->tickets->assignToAgent(
            $this->request->get('tickets'),
            $this->request->get('user_id')
        );

        $updatedTickets = $this->tickets->find($this->request->get('tickets'));

        //fire ticket updated event for each updated ticket
        foreach($originalTickets as $k => $ticket) {
            event(new TicketUpdated($updatedTickets[$k], $originalTickets[$k]));
        }
    }
}
