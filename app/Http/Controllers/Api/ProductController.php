<?php

namespace App\Http\Controllers\Api;

use App\Contracts\IProductService;
use App\Core\Controller;
use App\DataTransferObjects\ProductService\DeleteDTO;
use App\DataTransferObjects\ProductService\IndexDTO;
use App\DataTransferObjects\ProductService\SearchDTO;
use App\DataTransferObjects\ProductService\ShowDTO;
use App\DataTransferObjects\ProductService\CreateDTO;
use App\DataTransferObjects\ProductService\UpdateDTO;
use App\Http\Requests\Api\ProductController\DeleteRequest;
use App\Http\Requests\Api\ProductController\IndexRequest;
use App\Http\Requests\Api\ProductController\SearchRequest;
use App\Http\Requests\Api\ProductController\ShowRequest;
use App\Http\Requests\Api\ProductController\CreateRequest;
use App\Http\Requests\Api\ProductController\UpdateRequest;
use App\Core\HttpResponse;

class ProductController extends Controller
{
    use HttpResponse;

    private $productService;

    public function __construct(IProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(IndexRequest $request)
    {
        $response = $this->productService->index(new IndexDTO($request));

        return $this->httpResponse(
            message: $response->getMessage(),
            statusCode: $response->getStatusCode(),
            data: $response->getData(),
            isSuccess: $response->isSuccess()
        );
    }

    public function create(CreateRequest $request)
    {
        $response = $this->productService->create(new CreateDTO($request));

        return $this->httpResponse(
            message: $response->getMessage(),
            statusCode: $response->getStatusCode(),
            data: $response->getData(),
            isSuccess: $response->isSuccess()
        );
    }

    public function show(ShowRequest $request)
    {
        $response = $this->productService->show(new ShowDTO($request));

        return $this->httpResponse(
            message: $response->getMessage(),
            statusCode: $response->getStatusCode(),
            data: $response->getData(),
            isSuccess: $response->isSuccess()
        );
    }

    public function update(UpdateRequest $request)
    {
        $response = $this->productService->update(new UpdateDTO($request));

        return $this->httpResponse(
            message: $response->getMessage(),
            statusCode: $response->getStatusCode(),
            data: $response->getData(),
            isSuccess: $response->isSuccess()
        );
    }

    public function destroy(DeleteRequest $request)
    {
        $response = $this->productService->delete(new DeleteDTO($request));

        return $this->httpResponse(
            message: $response->getMessage(),
            statusCode: $response->getStatusCode(),
            data: $response->getData(),
            isSuccess: $response->isSuccess()
        );
    }

    public function search(SearchRequest $request)
    {
        $response = $this->productService->search(new SearchDTO($request));

        return $this->httpResponse(
            message: $response->getMessage(),
            statusCode: $response->getStatusCode(),
            data: $response->getData(),
            isSuccess: $response->isSuccess()
        );
    }
}
