<?php

namespace App\Actions\Admin\Offer;

use App\Models\Offer;

class StoreOfferAction
{
    public function __invoke(array $request): bool
    {
        Offer::create($request);

        return true;
    }
}
