<?php

namespace App\Repository;

use App\Adapter\TicketRedisAdapter;
use App\Models\Ticket as TicketModel;

class Ticket
{

    /**
     * @var TicketModel
     */
    protected $ticket;

    /**
     * Ticket constructor.
     * @param TicketModel $ticket
     */
    public function __construct(TicketModel $ticket)
    {
        $this->ticket = $ticket;
        $this->ticket->setAdapter(
            new TicketRedisAdapter()
        );
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->ticket->set($key, $value);
    }

    /**
     * @return mixed
     */
    public function getAllData()
    {
        return $this->ticket->getAllData();
    }

}
