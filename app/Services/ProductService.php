<?php

namespace App\Services;

use App\Contracts\IProductService;
use App\Core\ElasticSearchBuilder;
use App\Core\ServiceResponse;
use App\DataTransferObjects\ProductService\DeleteDTO;
use App\DataTransferObjects\ProductService\IndexDTO;
use App\DataTransferObjects\ProductService\SearchDTO;
use App\DataTransferObjects\ProductService\ShowDTO;
use App\DataTransferObjects\ProductService\CreateDTO;
use App\DataTransferObjects\ProductService\UpdateDTO;
use App\Models\Product;

class ProductService implements IProductService
{
    public function index(IndexDTO $dto): ServiceResponse
    {
        $products = Product::skip($dto->getPageIndex() * $dto->getPageSize())->take($dto->getPageSize())->get();

        return new ServiceResponse(
            data: $products,
            message: 'Products fetched successfully',
            statusCode: 200,
            isSuccess: true
        );
    }

    public function search(SearchDTO $dto): ServiceResponse
    {
        $response = app('elasticsearch')->search([
            'index' => 'products',
            'body' => [
                'query' => [
                    'multi_match' => [
                        'query' => $dto->getQuery(),
                        'fields' => ['name', 'description'],
                    ],
                ],
            ],
        ]);

        $products = collect($response['hits']['hits'])->pluck('_source');

        return new ServiceResponse(
            data: $products,
            message: 'Products fetched successfully',
            statusCode: 200,
            isSuccess: true
        );
    }

    public function create(CreateDTO $dto): ServiceResponse
    {
        $product = Product::create([
            'name' => $dto->getName(),
            'price' => $dto->getPrice(),
            'description' => $dto->getDescription(),
        ]);

        return new ServiceResponse(
            data: $product,
            message: 'Product created successfully',
            statusCode: 201,
            isSuccess: true
        );
    }

    public function show(ShowDTO $dto): ServiceResponse
    {
        $product = Product::find($dto->getId());

        if (!$product) {
            return new ServiceResponse(
                data: null,
                message: 'Product not found',
                statusCode: 404,
                isSuccess: false
            );
        }

        return new ServiceResponse(
            data: $product,
            message: 'Product fetched successfully',
            statusCode: 200,
            isSuccess: true
        );
    }

    public function update(UpdateDTO $dto): ServiceResponse
    {
        $product = Product::find($dto->getId());

        if (!$product) {
            return new ServiceResponse(
                data: null,
                message: 'Product not found',
                statusCode: 404,
                isSuccess: false
            );
        }

        $product->update([
            'name' => $dto->getName(),
            'price' => $dto->getPrice(),
            'description' => $dto->getDescription(),
        ]);

        return new ServiceResponse(
            data: $product,
            message: 'Product updated successfully',
            statusCode: 200,
            isSuccess: true
        );
    }

    public function delete(DeleteDTO $dto): ServiceResponse
    {
        $product = Product::find($dto->getId());

        if (!$product) {
            return new ServiceResponse(
                data: null,
                message: 'Product not found',
                statusCode: 404,
                isSuccess: false
            );
        }

        $product->delete();

        return new ServiceResponse(
            data: null,
            message: 'Product deleted successfully',
            statusCode: 200,
            isSuccess: true
        );
    }

}
