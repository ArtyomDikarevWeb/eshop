<?php

namespace App\Actions\Admin\Category;

use App\Models\Category;

class StoreCategoryAction
{
    public function __invoke(array $request): bool
    {
        Category::create($request);

        return true;
    }
}
