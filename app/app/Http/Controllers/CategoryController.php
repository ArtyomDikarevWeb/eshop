<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::query()->paginate(15);

        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function show(Category $category): View
    {
        return view('admin.categories.show', ['category' => $category]);
    }

    public function edit(Category $category): View
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Category $category, UpdateCategoryRequest $request, CategoryService $service): View
    {
        $updatedCategory = $service->update($category, $request);

        return view('admin.categories.edit', ['category' => $updatedCategory]);
    }

    public function create(): View
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request, CategoryService $service): RedirectResponse
    {
        $result = $service->store($request);

        return response()->redirectTo(route('categories.index'));
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return response()->redirectTo(route('categories.index'));
    }
}
