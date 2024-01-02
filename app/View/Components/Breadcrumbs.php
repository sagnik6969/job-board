<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumbs extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $links
    ) {
    }

    // When the component is created without --view flag the attributes (eg :links) are passed to
    // the constructor not directly to the view (which is the case of we use --view flag)
    // we have to receive the attributes in the constructor (like the above) to use then inside
    // the component

    // one mode thing => the attributes which are not specified in the constructor will be 
    // added to $attributes in the component in this example (class="mb-4")

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcrumbs');
    }
}
