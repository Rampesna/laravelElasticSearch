<?php

namespace App\DataTransferObjects\ProductService;

use App\Http\Requests\Api\ProductController\ShowRequest;

class ShowDTO
{
    private $id;

    public function __construct(ShowRequest $request)
    {
        $this->id = $request->id;
    }

    public function getId()
    {
        return $this->id;
    }
}
