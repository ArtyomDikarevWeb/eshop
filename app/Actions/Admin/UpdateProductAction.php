<?php

namespace App\Actions\Admin;

use App\Models\Product;
use Illuminate\Http\Request;

class UpdateProductAction
{
    public function __invoke(Product $product, Request $request)
    {
        $product->fill($request->all());
        $product->save();

        return $product;
    }
}