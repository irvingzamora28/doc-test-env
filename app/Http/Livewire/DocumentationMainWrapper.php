<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DocumentationMainWrapper extends Component
{
    public $showConfiguration = false;

    public function mount(array $menu, bool $showConfiguration)
    {
        $this->menu = $menu;
        $this->showConfiguration = $showConfiguration;
    }

    protected $listeners = ["showConfiguration"    => "showConfiguration", "hideConfiguration"    => "hideConfiguration"];

    public function render()
    {
        return view('livewire.documentation-main-wrapper');
    }

    public function showConfiguration()
    {
        $this->showConfiguration = true;
    }
    
    public function hideConfiguration()
    {
        $this->showConfiguration = false;
    }
}
