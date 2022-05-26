<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DocumentationMenu extends Component
{
    public $menu = [
        ["target" => "introduccion", "label" => "Introducción", "active" => true],
        ["target" => "registrar-cliente", "label" => "Registrar Cliente", "active" => false]
    ];

    protected $listeners = ["active"    => "setActive"];

    public function render()
    {
        return view('livewire.documentation-menu');
    }

    public function setActive()
    {
        $this->emit('child-event');
    }
}
