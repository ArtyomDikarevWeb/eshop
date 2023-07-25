<?php

namespace App\Actions\Admin;

use Illuminate\Http\Request;
use App\Models\Product;

class CreateProductAction
{
    public function __invoke(Request $request)
    {
        Product::create($request->all());

        return true;
    }
}