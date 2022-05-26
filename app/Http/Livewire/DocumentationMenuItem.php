<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DocumentationMenuItem extends Component
{
    public array $item;

    public function mount(array $item)
    {
        $this->item = $item;

    }
    protected $listeners = ['child-event' => '$refresh'];

    public function hydrate()
    {
        $this->item["active"] = !$this->item["active"];
    }

    public function render()
    {
        return view('livewire.documentation-menu-item');
    }
}
