<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TicketCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $items = $this->collection->all();

        $response = [];

        /** @var \App\Entities\Ticket $item */
        foreach ($items as $item) {
            $interactions = [];

            /** @var \App\Entities\Interactions $interaction */
            foreach ($item->getInteractions()->toArray() as $interaction) {
                $interactions[] = [
                    'Subject' => $interaction->getSubject(),
                    'Message' => $interaction->getMessage(),
                    'DateCreate' => $interaction->getDateCreate(),
                    'Sender' => $interaction->getSender(),
                ];
            }

            $response[] = [
                'TicketID' => $item->getTicketID(),
                'CategoryID' => $item->getCategoryID(),
                'CustomerID' => $item->getCustomerID(),
                'CustomerEmail' => $item->getCustomerEmail(),
                'DateCreate' => $item->getDateCreate(),
                'DateUpdate' => $item->getDateUpdate(),
                'Interactions' => $interactions,
            ];
        }

        return $response;
    }
}
