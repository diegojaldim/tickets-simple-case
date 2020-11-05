<?php

namespace App\Models;

use App\Adapter\TicketAdapterInterface;
use App\Entities\TicketCollection;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    /**
     * @var TicketAdapterInterface
     */
    protected $adapter;

    /**
     * Ticket constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    /**
     * @param $adapter
     */
    public function setAdapter(TicketAdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return TicketAdapterInterface
     */
    public function getAdapter()
    {
        return $this->adapter;
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->adapter->set($key,$value);
    }

    /**
     * @return TicketCollection
     * @param array $ids
     */
    public function getAllData($ids = []): TicketCollection
    {
        return $this->adapter->getAllData($ids);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->adapter->get($id);
    }

}
