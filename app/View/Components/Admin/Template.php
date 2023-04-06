<?php

namespace App\View\Components\Admin;

use App\Models\User;
use Closure;
use Illuminate\Auth\GenericUser;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Template extends Component
{
    /**
     * @var string
     */
    public string $title;

    /**
     * @var User|GenericUser|null
     */
    public User|GenericUser|null $user;

    /**
     * Create a new component instance.
     */
    public function __construct(string $title)
    {
        $this->title = $title;

        $this->user = Auth::user();
        $this->user->load('roles');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.template');
    }
}
