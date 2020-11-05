<?php

namespace App\Service;

use App\Entities\TicketCollection;
use App\Repository\Ticket as TicketRepository;


class Ticket
{

    /**
     * @var TicketRepository
     */
    protected $repository;

    /**
     * Ticket constructor.
     * @param TicketRepository $repository
     */
    public function __construct(TicketRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return TicketCollection
     * @param array $ids
     */
    public function getAllData($ids = []): TicketCollection
    {
        return $this->repository->getAllData($ids);
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->repository->set($key, $value);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->repository->getById($id);
    }

}
