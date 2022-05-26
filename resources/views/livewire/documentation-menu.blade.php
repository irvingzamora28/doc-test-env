<div class="content-menu">
    <ul>
        @foreach ($menu as $item)
            @livewire('documentation-menu-item', ['item' => $item], key($item['target']))
        @endforeach
        <li class="scroll-to-link">
            <a class="nav-link" href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                style="text-decoration: none">Cerrar sesion
            </a>
            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                @if (config('adminlte.logout_method'))
                    {{ method_field(config('adminlte.logout_method')) }}
                @endif
                {{ csrf_field() }}
            </form>
        </li>

    </ul>
</div>
