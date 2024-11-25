<?php

namespace App\Core;

use Elastic\Elasticsearch\ClientBuilder;

class ElasticSearchBuilder
{
    private $client;

    public function __construct()
    {
        $this->client =
            ClientBuilder::create()
                ->setHosts(["https://" . env('ELASTICSEARCH_USER') . ":" . env('ELASTICSEARCH_PASS') . "@" . env('ELASTICSEARCH_HOST') . ":" . env('ELASTICSEARCH_PORT')])
                ->setSSLVerification(false)
                ->build();
    }

    public function getClient()
    {
        return $this->client;
    }
}
