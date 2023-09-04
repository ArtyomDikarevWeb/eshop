<?php

namespace App\Actions\Admin\Offer;

use App\Models\Offer;

class StoreOfferAction
{
    public function __invoke(array $request): bool
    {
        unset($request['_token'], $request['_method']);
        Offer::create($request);

        return true;
    }
}