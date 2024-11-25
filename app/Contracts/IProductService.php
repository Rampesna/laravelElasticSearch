<?php

namespace App\Contracts;

use App\Core\ServiceResponse;
use App\DataTransferObjects\ProductService\IndexDTO;
use App\DataTransferObjects\ProductService\SearchDTO;
use App\DataTransferObjects\ProductService\CreateDTO;
use App\DataTransferObjects\ProductService\ShowDTO;
use App\DataTransferObjects\ProductService\UpdateDTO;
use App\DataTransferObjects\ProductService\DeleteDTO;

interface IProductService
{
    public function index(IndexDTO $dto): ServiceResponse;

    public function search(SearchDTO $dto): ServiceResponse;

    public function create(CreateDTO $dto): ServiceResponse;

    public function show(ShowDTO $dto): ServiceResponse;

    public function update(UpdateDTO $dto): ServiceResponse;

    public function delete(DeleteDTO $dto): ServiceResponse;
}
