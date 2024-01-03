<?php

namespace App\View\Components;

use App\Models\Offer;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OfferEdit extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Offer $offer
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.offer-edit');
    }
}
