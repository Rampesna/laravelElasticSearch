<?php

namespace App\DataTransferObjects\ProductService;

use App\Http\Requests\Api\ProductController\IndexRequest;

class IndexDTO
{
    private $pageIndex;
    private $pageSize;

    public function __construct(IndexRequest $request)
    {
        $this->pageIndex = $request->pageIndex;
        $this->pageSize = $request->pageSize;
    }

    public function getPageIndex()
    {
        return $this->pageIndex;
    }

    public function getPageSize()
    {
        return $this->pageSize;
    }
}
