<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\CreateProductAction;
use App\Actions\Admin\UpdateProductAction;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::query()->paginate(15);

        return view('admin.product.index', ['products' => $products]);
    }

    public function show(Product $product): View
    {
        return view ('admin.product.show', ['product' => $product]);
    }

    public function edit(Product $product): View
    {
        return view('admin.product.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request, UpdateProductAction $action): RedirectResponse
    {
        $updatedProduct = $action($product, $request);

        return redirect()->route('products.edit', $updatedProduct);
    }

    public function create(): View
    {
        return view('admin.product.create');
    }

    public function store(Request $request, CreateProductAction $action): RedirectResponse
    {
        $action($request);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}