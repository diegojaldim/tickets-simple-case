<?php

namespace App\Adapter;

use Illuminate\Support\Facades\Redis;

class TicketRedisAdapter implements TicketAdapterInterface
{

    /**
     * @param $key
     */
    public function get($key)
    {
        Redis::get($key);
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        Redis::set($key, serialize($value));
    }

    /**
     * @return mixed
     */
    public function getAllData()
    {
        return Redis::keys('*');
    }

}
