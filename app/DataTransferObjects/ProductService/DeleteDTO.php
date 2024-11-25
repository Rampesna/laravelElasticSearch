<?php

namespace App\DataTransferObjects\ProductService;

use App\Http\Requests\Api\ProductController\DeleteRequest;

class DeleteDTO
{
    private $id;

    public function __construct(DeleteRequest $request)
    {
        $this->id = $request->id;
    }

    public function getId()
    {
        return $this->id;
    }
}
