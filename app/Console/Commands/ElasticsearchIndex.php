<?php

namespace App\Console\Commands;

use App\Search\TicketSearch;
use App\Service\Ticket;
use Illuminate\Console\Command;
use App\Service\Ticket as TicketService;

class ElasticsearchIndex extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elasticsearch:index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Elasticsearch index';

    /**
     * @var TicketService
     */
    protected $ticketService;

    /**
     * @var TicketSearch
     */
    protected $ticketSearch;

    /**
     * Create a new command instance.
     * @param TicketService $ticketService
     * @param TicketSearch $ticketSearch
     *
     * @return void
     */
    public function __construct(TicketService $ticketService, TicketSearch $ticketSearch)
    {
        parent::__construct();
        $this->ticketService = $ticketService;
        $this->ticketSearch = $ticketSearch;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo 'Elasticsearch indexing...' . PHP_EOL;

        $ticketCollection = $this->ticketService->getAllData();

        $i = 0;
        /** @var \App\Entities\Ticket $ticketItem */
        foreach ($ticketCollection as $ticketItem) {
            $dateCreate = new \DateTime($ticketItem->getDateCreate());
            $dateUpdate = new \DateTime($ticketItem->getDateUpdate());

            $this->ticketSearch->setId($ticketItem->getTicketID());

            $this->ticketSearch->setDateCreate(
                $dateCreate->format(TicketSearch::DATE_FORMAT)
            );

            $this->ticketSearch->setDateUpdate(
                $dateUpdate->format(TicketSearch::DATE_FORMAT)
            );

            $this->ticketSearch->setPriority($i);

            $this->ticketSearch->indexDocument();
            $i++;
        }

        echo sprintf('%s documents has indexed in Elasticsearch', $i). PHP_EOL;

        return 0;
    }
}
