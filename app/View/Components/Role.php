<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Role as RoleModel;

class Role extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public RoleModel $role,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.role');
    }
}
