<?php

namespace App\Entities;

use Illuminate\Support\Collection;

class TicketCollection extends Collection
{

    /**
     * @param mixed $item
     * @return Collection
     */
    public function add($item)
    {
        return parent::add($item);
    }

}
