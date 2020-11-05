<?php

namespace App\Adapter;

use App\Entities\Interactions;
use App\Entities\InteractionsCollection;
use App\Entities\TicketCollection;
use App\Entities\Ticket as TicketEntity;
use Illuminate\Support\Facades\Redis;

class TicketRedisAdapter implements TicketAdapterInterface
{

    /**
     * @param $key
     * @return \stdClass
     */
    public function get($key)
    {
        $id = $key;

        if (!intval($id)) {
            $id = substr($key, strlen(env('REDIS_PREFIX')));
        }

        $data = Redis::get($id);
        return unserialize($data);
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
     * @return TicketCollection
     * @param array $ids
     */
    public function getAllData($ids = []): TicketCollection
    {
        $collection = new TicketCollection();
        $keys = Redis::keys('*');

        foreach ($keys as $key) {

            $id = $key;

            if (!intval($id)) {
                $id = substr($key, strlen(env('REDIS_PREFIX')));
            }

            if (!in_array($id, $ids)) {
                continue;
            }

            $data = $this->get($key);

            $ticket = new TicketEntity();

            $ticket->setTicketID($data->TicketID)
                ->setCategoryID($data->CategoryID)
                ->setCustomerID($data->CustomerID)
                ->setCustomerName($data->CustomerName)
                ->setCustomerEmail($data->CustomerEmail)
                ->setDateCreate($data->DateCreate)
                ->setDateUpdate($data->DateUpdate);

            $interactionsCollection = new InteractionsCollection();

            foreach ($data->Interactions as $interactionItem) {
                $interactions = new Interactions();

                $interactions->setSubject($interactionItem->Subject)
                    ->setMessage($interactionItem->Message)
                    ->setDateCreate($interactionItem->DateCreate)
                    ->setSender($interactionItem->Sender);

                $interactionsCollection->add($interactions);
            }

            $ticket->setInteractions($interactionsCollection);

            $collection->add($ticket);
        }

        return $collection;
    }

}
