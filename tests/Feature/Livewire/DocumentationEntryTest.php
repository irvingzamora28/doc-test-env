<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\DocumentationEntry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DocumentationEntryTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(DocumentationEntry::class);

        $component->assertStatus(200);
    }
}
