<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\Admin\Offer\StoreOfferRequest;
use App\Http\Requests\Admin\Offer\UpdateOfferRequest;
use App\Models\Offer;

class OfferService
{
    public function store(StoreOfferRequest $request): bool
    {
        Offer::query()->create($request->validated());

        return true;
    }

    public function update(Offer $offer, UpdateOfferRequest $request): Offer
    {
        $offer->fill($request->validated());
        $offer->save();

        return $offer;
    }
}
