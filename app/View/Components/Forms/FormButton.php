<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormButton extends Component
{
    public function __construct(
        public string $text = 'Submit',
        public string $variant = 'primary',
        public bool $fullWidth = true,
        public string $type = 'submit',
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.forms.form-button');
    }
}
