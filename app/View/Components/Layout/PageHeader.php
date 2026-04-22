<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageHeader extends Component
{
    public function __construct(
        public string $title = '',
        public string $subtitle = '',
        public string $badge = '',
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.layout.page-header');
    }
}
