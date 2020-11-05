<?php

namespace App\Helpers;

use App\Entities\Ticket;

class EvaluateTicketPriority
{

    /**
     * @const int
     */
    const PRIORITY_HIGH = 2;

    /**
     * @const int
     */
    const PRIORITY_NORMAL = 1;

    /**
     * @const int
     */
    const DAYS_TO_HIGH_PRIORITY = 1000;

    /**
     * @const int
     */
    const INTERACTIONS_TO_HIGH_PRIORITY = 3;

    /**
     * @param Ticket $ticket
     * @return int
     * @throws \Exception
     */
    public static function evaluate(Ticket $ticket)
    {
        $interactions = $ticket->getInteractions()->count();

        $dateNow = new \DateTime();
        $dateUpdate = new \DateTime($ticket->getDateUpdate());

        $interval = $dateNow->diff($dateUpdate);

        if ($interval->days >= self::DAYS_TO_HIGH_PRIORITY && $interactions >= self::INTERACTIONS_TO_HIGH_PRIORITY) {
            return self::PRIORITY_HIGH;
        }

        return self::PRIORITY_NORMAL;
    }

}