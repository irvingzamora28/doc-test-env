<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DocumentationEntryInput extends Component
{

    public $input = [];
    public $value = "";
    public $fieldType = "";
    public $multipleValue = [];

    public function mount(array $input)
    {
        $this->input = $input;
        $this->value = array_values($input)[0]["value"];
        $this->fieldType = array_values($input)[0]["field_type"];
        if ($this->fieldType == "radio" || $this->fieldType == "select") {
            $this->multipleValue = json_decode(array_values($input)[0]["value"], true); 
        }
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
