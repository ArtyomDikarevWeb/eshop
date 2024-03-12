<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OfferResource;
use App\Models\Offer;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::query()->limit(10)->get();

        return OfferResource::collection($offers->load('product'));
    }
}
