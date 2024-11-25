<?php

namespace App\DataTransferObjects\ProductService;

use App\Http\Requests\Api\ProductController\UpdateRequest;

class UpdateDTO
{
    private $id;
    private $name;
    private $description;
    private $price;

    public function __construct(UpdateRequest $request)
    {
        $this->id = $request->id;
        $this->name = $request->name;
        $this->description = $request->description;
        $this->price = $request->price;
    }

    public function getId()
    {
        return $this->id;
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
