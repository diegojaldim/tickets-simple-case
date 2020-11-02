<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Service\Ticket as TicketService;

class TicketSeeder extends Seeder
{

    /**
     * @var TicketService
     */
    protected $service;

    public function __construct(TicketService $service)
    {
        $this->service = $service;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = file_get_contents('storage/tickets.json');

        $content = json_decode($file);

        foreach ($content as $item) {
            if (!isset($item->TicketID)) {
                continue;
            }

            $this->service->set($item->TicketID, $item);
        }

        echo 'OK!' . PHP_EOL;
    }

}
