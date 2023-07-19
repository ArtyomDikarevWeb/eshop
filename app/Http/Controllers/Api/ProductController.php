<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Product\IndexResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductController extends Controller
{
    public function index(): JsonResource
    {
        $products = Product::query()->limit(10)->get();

        return IndexResource::collection($products);
    }
}
