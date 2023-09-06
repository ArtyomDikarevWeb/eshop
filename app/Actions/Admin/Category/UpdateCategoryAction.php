<?php

namespace App\Actions\Admin\Category;

use App\Models\Category;

class UpdateCategoryAction
{
    public function __invoke(Category $category, array $request): Category
    {
        $category->fill($request);
        $category->save();

        return $category;
    }
}