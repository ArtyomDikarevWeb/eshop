<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FavouritesResource;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class FavouritesController extends Controller
{
    public function index(User $user): JsonResource
    {
        $user->load('favourites');

        return FavouritesResource::collection($user->favourites);
    }

    public function add(User $user, Offer $offer)
    {
    }

    public function remove(User $user, Offer $offer)
    {
    }
}
