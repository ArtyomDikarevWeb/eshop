<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Offer\IndexResource;
use App\Models\Offer;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::query()->limit(10)->get();

        return IndexResource::collection($offers->load('product'));
    }
}
