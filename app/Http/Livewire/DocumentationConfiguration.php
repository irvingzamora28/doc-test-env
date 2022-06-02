<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DocumentationConfiguration extends Component
{

    public $showConfiguration = true;

    public function mount(bool $showConfiguration)
    {
        $this->showConfiguration = $showConfiguration;
    }

    public function render()
    {
        return view('livewire.documentation-configuration');
    }

    
}
