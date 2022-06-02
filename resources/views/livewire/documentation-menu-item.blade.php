<span>
    <li class="menu-item {{ $item['active'] ? 'active' : '' }}" wire:click="$emitUp('active', '{{$item['target']}}', '{{$item['active'] }}')">
        <a>{{ $item['label'] }}</a>
    </li>
    <hr>
</span>
