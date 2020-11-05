<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketCollection;
use App\Search\TicketSearch;
use App\Service\Ticket as TicketService;

class TicketController extends Controller
{

    /**
     * @var TicketService
     */
    protected $ticketService;

    /**
     * @var TicketSearch
     */
    protected $ticketSearch;

    /**
     * TicketController constructor.
     * @param TicketService $ticketService
     * @param TicketSearch $ticketSearch
     */
    public function __construct(TicketService $ticketService, TicketSearch $ticketSearch)
    {
        $this->ticketService = $ticketService;
        $this->ticketSearch = $ticketSearch;
    }

    /**
     * @return TicketCollection
     */
    public function getAllData()
    {
        $params = [
            'body' => [
                "from" => 0,
                "size" => 10,
            ],
            'sort' => [
                'DateCreate:asc'
            ]
        ];

        $response = $this->ticketSearch->search($params);

        return new TicketCollection($response);
    }

}
