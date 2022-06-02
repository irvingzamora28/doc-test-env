<div class="content-page">
    <div class="content {{!$showConfiguration ? 'flex' : 'hidden'}}">
        @foreach ($menu as $item)
            @livewire('documentation-entry', ['entry' => $item[array_key_first($item)]['entry'], 'target' => $item[array_key_first($item)]['target'], 'active' => $item[array_key_first($item)]['active']], key($loop->index))
        @endforeach
    </div>

    @livewire('documentation-configuration', ['showConfiguration' => $showConfiguration])

</div>