<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormCard extends Component
{
    public function __construct(
        public string $title = '',
        public string $subtitle = '',
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.forms.form-card');
    }
}
