<?php

namespace App\Adapter;


interface TicketAdapterInterface
{

    public function get($key);

    public function set($key, $value);

    public function getAllData();

}
