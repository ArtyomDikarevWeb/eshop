<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\User as UserModel;

class User extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public UserModel $user
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user');
    }
}
