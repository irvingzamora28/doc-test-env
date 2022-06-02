<div class="content-menu">
    <ul>
        @foreach ($menu as $item)
            @livewire('documentation-menu-item', ['item' => $item[array_key_first($item)]], key($loop->index))
        @endforeach

        <span>
            <li class="menu-item" wire:click="$emit('showConfiguration')">

                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                    Configuración
                </a>
            </li>
            <hr>
        </span>



    </ul>
</div>
