<div class="content-menu">
    <ul>
        @foreach ($menu as $item)
            @livewire('documentation-menu-item', ['item' => $item[array_key_first($item)]], key($item[array_key_first($item)]['target']))
        @endforeach
    </ul>
</div>
