<?php

namespace App\Console\Commands;

use App\Core\ElasticSearchBuilder;
use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Console\Command;

class CreateElasticsearchIndex extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elasticsearch:create-index {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an Elasticsearch index';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $indexName = $this->argument('name');

        try {
            app('elasticsearch')->indices()->create([
                'index' => $indexName,
                'body' => [
                    'mappings' => [
                        'properties' => [
                            'id' => ['type' => 'integer'],
                            'name' => ['type' => 'text'],
                            'description' => ['type' => 'text'],
                            'price' => ['type' => 'float'],
                            'created_at' => ['type' => 'date'],
                            'updated_at' => ['type' => 'date'],
                        ],
                    ],
                ],
            ]);

            $this->info("Index '{$indexName}' created successfully.");
        } catch (\Exception $e) {
            $this->error("Error creating index: " . $e->getMessage());
        }
    }
}
