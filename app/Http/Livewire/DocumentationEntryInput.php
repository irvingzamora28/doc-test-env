<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DocumentationEntryInput extends Component
{

    public $input = [];
    public $value = "";

    public function mount(array $input)
    {
        $this->input = $input;
        $this->value = array_values($input)[0];
    }

    public function render()
    {
        return view('livewire.documentation-entry-input');
    }

    public function updateInput($key, $value)
    {
        $this->value = $value;
        $this->emitUp('inputUpdated', $key, $value);
    }
}
