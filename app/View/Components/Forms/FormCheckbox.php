<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormCheckbox extends Component
{
    public function __construct(
        public string $label = '',
        public string $name = '',
        public bool $checked = false,
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.forms.form-checkbox');
    }
}
