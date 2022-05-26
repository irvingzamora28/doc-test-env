<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\DocumentationMenuItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DocumentationMenuItemTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(DocumentationMenuItem::class);

        $component->assertStatus(200);
    }
}
