<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cleartype" content="on">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.8.0/highlight.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,500|Source+Code+Pro:300" rel="stylesheet">
    <script>
        hljs.initHighlightingOnLoad();
    </script>
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>

    <link rel="stylesheet" href="{{ mix('/css/doc-template.min.css') }}" />
    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <header class="text-gray-600 body-font sticky top-0 z-50 bg-slate-50">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white p-2 bg-blue-500 rounded-full"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="ml-3 text-xl">LOGO</span>
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            </nav>
            <button
                class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Salir
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </header>

    <div class="left-menu mt-4 bg-blue-300">
        <div class="content-logo">
        </div>
        @livewire('documentation-menu', ['menu' => $menu])
    </div>
    @livewire('documentation-main-wrapper', ['menu' => $menu, 'showConfiguration' => $showConfiguration])
    
    <script src="{{ mix('/js/app.min.js') }}"></script>
    @livewireScripts
</body>

</html>
