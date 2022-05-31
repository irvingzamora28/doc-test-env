<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DocumentationEntryInput extends Component
{

    public $input = [];

    public function mount(array $input)
    {
        $this->input = $input;
    }

    public function render()
    {
        return view('livewire.documentation-entry-input');
    }
}
