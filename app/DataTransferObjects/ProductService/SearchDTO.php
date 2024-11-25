<?php

namespace App\DataTransferObjects\ProductService;

use App\Http\Requests\Api\ProductController\SearchRequest;

class SearchDTO
{
    private $query;

    public function __construct(SearchRequest $request)
    {
        $this->query = $request->q;
    }

    public function getQuery()
    {
        return $this->query;
    }
}
