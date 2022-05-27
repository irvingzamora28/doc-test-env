<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DocumentationMenu extends Component
{
    public $menu = [];

    public function mount(array $menu)
    {
        $this->menu = $menu;
    }

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
