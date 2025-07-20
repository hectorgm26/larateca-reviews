<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BookCard extends Component
{
    /**
     * Create a new component instance.
     */

    // Para usar variables en el componente, se deben incluir en el constructor como propiedades de la clase.
    public function __construct(public $book, public $showDescription = false)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.book-card');
    }
}
