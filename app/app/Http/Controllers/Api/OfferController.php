<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OfferResource;
use App\Models\Offer;
use Illuminate\Http\Resources\Json\JsonResource;
use Knuckles\Scribe\Attributes\Endpoint;
use Knuckles\Scribe\Attributes\Group;
use Knuckles\Scribe\Attributes\ResponseFromApiResource;

#[Group('Catalog')]
class OfferController extends Controller
{
    #[Endpoint('List of offers')]
    #[ResponseFromApiResource(OfferResource::class, Offer::class, 200, collection: true, with: ['product'], paginate: 20)]
    public function index(): JsonResource
    {
        $offers = Offer::with(['product'])->paginate(20);

        return OfferResource::collection($offers);
    }

    #[Endpoint('Offer\'s page')]
    #[ResponseFromApiResource(OfferResource::class, Offer::class, 200, with: ['product'])]
    public function show(Offer $offer): JsonResource
    {
        return OfferResource::make($offer->load(['product']));
    }
}
