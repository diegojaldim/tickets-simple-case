<?php

namespace App\Service;

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
     * @return mixed
     */
    public function getAllData()
    {
        return $this->repository->getAllData();
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->repository->set($key, $value);
    }

}
