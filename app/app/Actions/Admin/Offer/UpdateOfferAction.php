<?php

namespace App\Actions\Admin\Offer;

use App\Models\Offer;

class UpdateOfferAction
{
    public function __invoke(Offer $offer, array $request): Offer
    {
        $offer->fill($request);
        $offer->save();

        return $offer;
    }
}