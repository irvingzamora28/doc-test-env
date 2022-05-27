<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DocumentationEntry extends Component
{

    public $entry = [];

    public function mount(array $entry)
    {
        $this->entry = $entry;
    }

    public function render()
    {
        return view('livewire.documentation-entry');
    }
}
