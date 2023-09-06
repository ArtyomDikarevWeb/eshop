<?php

namespace App\Actions\Admin\Category;

use App\Models\Category;

class StoreCategoryAction
{
    public function __invoke(array $request): bool
    {
        unset($request['_token'], $request['_method']);
        Category::create($request);

        return true;
    }
}