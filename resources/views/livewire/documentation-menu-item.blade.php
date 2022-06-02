<span>
    <li class="menu-item {{ $item['active'] ? 'active' : '' }}" wire:click="$emitUp('active', '{{$item['target']}}', '{{$item['active'] }}')"
        data-target='{{ $item['target'] }}'>
        <a>{{ $item['label'] }}</a>
    </li>
    <hr>
</span>
