<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Offer\StoreOfferRequest;
use App\Http\Requests\Admin\Offer\UpdateOfferRequest;
use App\Models\Offer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Actions\Admin\Offer\UpdateOfferAction;
use App\Actions\Admin\Offer\StoreOfferAction;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class OfferController extends Controller
{
    public function index(): View
    {
        $offers = Offer::query()->paginate(15);

        return view('admin.offers.index', ['offers' => $offers]);
    }

    public function show(Offer $offer): View
    {
        return view('admin.offers.show', ['offer' => $offer]);
    }

    public function edit(Offer $offer): View
    {
        return view('admin.offers.edit', ['offer' => $offer]);
    }

    public function create(): View
    {
        $categories = Category::all();

        return view('admin.offers.create', ['categories' => $categories]);
    }

    public function store(StoreOfferRequest $request, StoreOfferAction $action): RedirectResponse
    {
        $action($request->validated());

        return response()->redirectTo(route('offers.index'));
    }

    public function update(Offer $offer, UpdateOfferRequest $request, UpdateOfferAction $action): View
    {
        $updatedOffer = $action($offer, $request->validated());

        return view('admin.offers.edit', ['offer' => $updatedOffer]);
    }

    public function destroy(Offer $offer): RedirectResponse
    {
        $offer->delete();

        return response()->redirectTo(route('offers.index'));
    }
}
