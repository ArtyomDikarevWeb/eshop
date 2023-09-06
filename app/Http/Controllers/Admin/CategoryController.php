<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Category\StoreCategoryAction;
use App\Actions\Admin\Category\UpdateCategoryAction;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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

    public function update(Category $category, Request $request, UpdateCategoryAction $action): View
    {
        $updatedCategory = $action($category, $request);

        return view('admin.categories.edit', ['category' => $updatedCategory]);
    }

    public function create(): View
    {
        return view('admin.categories.create');
    }

    public function store(Request $request, StoreCategoryAction $action): RedirectResponse
    {
        $action($request->all());

        return response()->redirectTo(route('categories.index'));
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return response()->redirectTo(route('categories.index'));
    }
}