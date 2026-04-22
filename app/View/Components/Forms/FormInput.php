<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormInput extends Component
{
    public function __construct(
        public string $label = '',
        public string $name = '',
        public string $type = 'text',
        public string $placeholder = '',
        public ?string $value = null,
        public bool $required = false,
        public bool $autofocus = false,
        public string $autocomplete = '',
        public ?string $hint = null,
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.forms.form-input');
    }
}
