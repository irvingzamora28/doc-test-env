<span>
    <li class="scroll-to-link {{ $item['active'] ? 'active' : '' }}" wire:click='$emitUp("active")'
        data-target='{{ $item['target'] }}'>
        <a>{{ $item['label'] }}</a>
    </li>
    <hr>
</span>
