<?php

namespace App\Providers;

use App\Core\ElasticSearchBuilder;
use Illuminate\Support\ServiceProvider;

class ElasticsearchServiceProvider extends ServiceProvider
{
    public function register()
    {
        $elasticsearchBuilder = new ElasticSearchBuilder;
        $this->app->singleton('elasticsearch', function () use ($elasticsearchBuilder) {
            return $elasticsearchBuilder->getClient();
        });
    }
}
