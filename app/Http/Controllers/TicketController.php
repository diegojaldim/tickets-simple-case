<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketCollection;
use App\Service\Ticket as TicketService;

class TicketController extends Controller
{

    /**
     * @var TicketService
     */
    protected $ticketService;

    /**
     * TicketController constructor.
     * @param TicketService $ticketService
     */
    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    /**
     * @return TicketCollection
     */
    public function getAllData()
    {
        return new TicketCollection($this->ticketService->getAllData());
    }

}
