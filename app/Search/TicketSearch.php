<?php

namespace App\Search;

use App\Entities\TicketCollection;
use App\Service\Ticket as TicketService;

class TicketSearch extends AbstractSearch
{

    /**
     * @const string
     */
    const INDEX = 'tickets';

    /**
     * @const string
     */
    const DATE_FORMAT = 'Y-m-d\TH:i:s\Z';

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $DateCreate;

    /**
     * @var string
     */
    protected $DateUpdate;

    /**
     * @var string
     */
    protected $Priority;

    /**
     * @var TicketService
     */
    protected $ticketService;

    public function __construct(TicketService $ticketService)
    {
        parent::__construct();
        $this->ticketService = $ticketService;
    }

    public function indexDocument()
    {
        $params = [
            'index' => self::INDEX,
            'id' => $this->id,
            'body' => [
                'DateCreate' => $this->DateCreate,
                'DateUpdate' => $this->DateUpdate,
                'Priority' => $this->Priority,
            ]
        ];

        $this->getAdapter()->index($params);
    }

    /**
     * @param array $params
     * @return TicketCollection
     */
    public function search(array $params)
    {
        $params['index'] = self::INDEX;
        $responseSearch = $this->getAdapter()->search($params);

        $response = new Response($responseSearch);

        $ids = [];
        foreach ($response->getHits() as $hit) {
            $ids[] = $hit['_id'];
        }

        $collection = $this->ticketService->getAllData($ids);

        return $collection;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDateCreate(): string
    {
        return $this->DateCreate;
    }

    /**
     * @param string $DateCreate
     */
    public function setDateCreate(string $DateCreate): void
    {
        $this->DateCreate = $DateCreate;
    }

    /**
     * @return string
     */
    public function getDateUpdate(): string
    {
        return $this->DateUpdate;
    }

    /**
     * @param string $DateUpdate
     */
    public function setDateUpdate(string $DateUpdate): void
    {
        $this->DateUpdate = $DateUpdate;
    }

    /**
     * @return string
     */
    public function getPriority(): string
    {
        return $this->Priority;
    }

    /**
     * @param string $Priority
     */
    public function setPriority(string $Priority): void
    {
        $this->Priority = $Priority;
    }

}
