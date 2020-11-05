<?php


namespace App\Search;


use Elasticsearch\ClientBuilder;

abstract class AbstractSearch
{

    /**
     * @var \Elasticsearch\Client
     */
    protected $client;

    /**
     * AbstractSearch constructor.
     */
    public function __construct()
    {
        $hosts = [
            'host'      => env('ELASTICSEARCH_HOST'),
            'port'      => env('ELASTICSEARCH_PORT'),
            'scheme'    => env('ELASTICSEARCH_SCHEME'),
            'user'      => env('ELASTICSEARCH_USER'),
            'pass'      => env('ELASTICSEARCH_PASS'),
        ];

        $this->client = ClientBuilder::create()
            ->setHosts([$hosts])
            ->build();
    }

    /**
     * @return \Elasticsearch\Client
     */
    public function getAdapter()
    {
        return $this->client;
    }

}
