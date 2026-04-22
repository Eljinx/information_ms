<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DataTable extends Component
{
    public function __construct(
        public string $id = 'data-table',
        public string $route = '',
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.layout.data-table');
    }
}
