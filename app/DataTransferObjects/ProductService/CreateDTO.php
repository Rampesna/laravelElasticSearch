<?php

namespace App\DataTransferObjects\ProductService;

use App\Http\Requests\Api\ProductController\CreateRequest;

class CreateDTO
{
    private $name;
    private $description;
    private $price;

    public function __construct(CreateRequest $request)
    {
        $this->name = $request->name;
        $this->description = $request->description;
        $this->price = $request->price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }
}
