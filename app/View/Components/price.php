<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class price extends Component
{
    public float $value;

    public function __construct(?string $value)
    {
        $this->value = $value ? (float) $value : 0;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.price');
    }
}
