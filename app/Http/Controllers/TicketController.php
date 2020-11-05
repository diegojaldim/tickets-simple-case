<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketCollection;
use App\Search\TicketSearch;
use App\Service\Ticket as TicketService;
use Illuminate\Http\Request;

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
     * @param Request $request
     * @return TicketCollection
     */
    public function getAllData(Request $request)
    {
        $sort = $request->get('sort') ?? TicketSearch::SORT_DEFAULT;
        $page = $request->get('page') ?? 1;

        $params = [
            'body' => [
                'from' => TicketSearch::page($page),
                'size' => TicketSearch::SIZE,
            ],
            'sort' => [
                $sort
            ]
        ];

        $response = $this->ticketSearch->search($params);

        return new TicketCollection($response);
    }

}
