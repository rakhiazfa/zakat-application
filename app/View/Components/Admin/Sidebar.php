<?php

namespace App\View\Components\Admin;

use App\Models\User;
use Closure;
use Illuminate\Auth\GenericUser;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * @var User|GenericUser|null
     */
    public User|GenericUser|null $user;

    /**
     * Create a new component instance.
     */
    public function __construct(User|GenericUser|null $user)
    {
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.sidebar');
    }
}
