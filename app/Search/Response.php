<?php

namespace App\Search;


class Response
{

    /**
     * @var array
     */
    protected $hits;

    public function __construct(array $response)
    {
        $this->hits = $response['hits']['hits'] ?? [];
    }

    /**
     * @return array
     */
    public function getHits()
    {
        return $this->hits;
    }

    /**
     * @param mixed $hits
     */
    public function setHits(array $hits): void
    {
        $this->hits = $hits;
    }

}
