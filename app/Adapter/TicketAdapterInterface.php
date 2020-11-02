<?php

namespace App\Adapter;

use App\Entities\TicketCollection;

interface TicketAdapterInterface
{

    public function get($key);

    public function set($key, $value);

    public function getAllData(): TicketCollection;

}
