<?php

namespace App\View\Components;

use App\Models\Notaris;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NotarisCard extends Component
{
    public Notaris $notaris;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(notaris $notaris = null)
    {
        $this->notaris = $notaris;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|string|Closure
    {
        return view('components.notaris-card');
    }
}
