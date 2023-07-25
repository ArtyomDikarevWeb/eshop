<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Contracts\View\View;

class OfferController extends Controller
{
    public function index(): View
    {
        $offers = Offer::query()->paginate(15);

        return view('admin.offers.index');
    }
}
