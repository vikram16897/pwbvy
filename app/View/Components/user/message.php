<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class message extends Component
{
    /**
     * Create a new component instance.
     */
    public $success;
    public $error;
    public $alert;
    public function __construct($success, $error,$alert)
    {
        $this->success = $success;
        $this->error = $error;
        $this->alert = $alert;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.message');
    }
}
