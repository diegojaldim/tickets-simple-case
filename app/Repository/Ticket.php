<?php

namespace App\Repository;

use App\Adapter\TicketRedisAdapter;
use App\Entities\TicketCollection;
use App\Models\Ticket as TicketModel;

class Ticket
{

    /**
     * @var TicketModel
     */
    protected $ticketModel;

    /**
     * Ticket constructor.
     * @param TicketModel $ticketModel
     */
    public function __construct(TicketModel $ticketModel)
    {
        $this->ticketModel = $ticketModel;
        $this->ticketModel->setAdapter(
            new TicketRedisAdapter()
        );
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->ticketModel->set($key, $value);
    }

    /**
     * @return TicketCollection
     * @param array $ids
     */
    public function getAllData($ids = []): TicketCollection
    {
        return $this->ticketModel->getAllData($ids);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->ticketModel->getById($id);
    }

}
