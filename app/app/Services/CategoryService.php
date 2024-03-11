<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Models\Category;

class CategoryService
{
    public function store(StoreCategoryRequest $request): bool
    {
        Category::query()->create($request->validated());

        return true;
    }

    public function update(Category $category, UpdateCategoryRequest $request): Category
    {
        $category->fill($request->validated());
        $category->save();

        return $category;
    }
}
