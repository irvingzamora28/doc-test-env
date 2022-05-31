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
    <div class="left-menu">
        <div class="content-logo">
            <!--<img  src="images/logo.png" />-->
        </div>
        @livewire('documentation-menu', ['menu' => $menu])
    </div>
    <div class="content-page">
        <div class="content-code"></div>
        <div class="content">
            <section class="text-gray-600 body-font overflow-hidden">
                <div class="container px-2 py-2 mx-auto">
                    <div class="flex flex-wrap -m-12">
                        <div class="pl-12 pr-2 md:w-1/2 flex flex-col items-center self-center">
                            <h2 class="sm:text-2xl text-xl title-font self-start font-medium text-gray-800 mt-16 mb-4">
                                Roof party
                                normcore before they sold out, cornhole vape</h2>
                            <p class="leading-relaxed mb-8">Live-edge letterpress cliche, salvia fanny pack humblebrag
                                narwhal portland. VHS man braid palo santo hoodie brunch trust fund. Bitters hashtag
                                waistcoat fashion axe chia unicorn. Plaid fixie chambray 90's, slow-carb etsy tumeric.
                                Cray pug you probably haven't heard of them hexagon kickstarter craft beer pork chic.
                            </p>
                            <div
                                class="flex flex-wrap pb-4 mb-4 border-b-2 border-gray-100 mt-auto w-full">
                                <div class="w-full py-2">
                                    <div class="relative">
                                        <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                        <input type="text" id="name" name="name"
                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="py-2">
                                    <span class="inline-block py-1 px-2 self-start rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">Datos a enviar</span>

                                </div>

<pre class="pre-code-example flex w-full">
<code class="json code-example">
{
    "success": false,
    "error" : {
        "code": 12,
        "message" : "Campo edad invalido, ingresar un número texto texto texto texto texto"
    }
}
</code>
</pre>
                                &nbsp;&nbsp;

                                <div class="flex w-full py-2 justify-end">
                                    <button type="button" wire:click="sendHttp" class="py-2 px-2  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-1/4 float-right transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg "> Enviar Prueba
                                    </button>
                                </div>
                            </div>
                            
                            
                        </div>

                        <div class="p-12 md:w-1/2 flex flex-col">

                            <pre class="code-definition mt-8">
                            <code class="json hljs">
Base URL

https://xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx/api/
                    
                            </code>
                        </pre>
                        </div>

                        

                    </div>
                </div>
            </section>
            @foreach ($menu as $item)
                @livewire('documentation-entry', ['entry' => $item['entry']])
            @endforeach

            <div class="overflow-hidden content-section" id="content-registrar-cliente">
                <h2 id="registrar-cliente">Registrar Cliente</h2>
                # Body
                POST https://xxx/register-customer \
                <pre class="code-definition"><code class="json">
{
    "dni": "1234567890",
    "name": "Pedro",
    "last_name": "Perez",
    "password": {
        "value": "832ruhasd893",
        "encrypted": true,
        "type": "base64"
    },
    "email": {
        "value": "pedroperez@gmail.com".
        "verified": true,
    },
    "phone": {
        "value": 19874894489,
        "verified": true,
    },
    "profile_image": {
        "type": "jpg",
        "url": "https://www.$"%·"$&%/",
        "timelife": 2342,
        "date_create": "2022-05-03 10:00:00"
        "timezone": "UTC"
    },
    "categories": [2,4],
}
                </code>
            </pre>
                <p>
                    Petición POST:<br>
                    <code class="higlighted">https://xxx/register-customer</code>
                </p>
                <br>
                <pre class="code-definition">
DATOS A ENVIAR
<br>
                <code class="json">
Respuesta Success:
{
    "success": true,
    "customer_id": 1,
    "action": "CREATE"
}
{
    "success": true,
    "customer_id": 2,
    "action": "UPDATE"
}

Respuesta Error:
{
    "success": false,
    "error" : {
    "code": 12,
    "message" : "Campo edad invalido, ingresar un número"
    }
}
        
                </code>
            </pre>
                <h4>DEFINICIÓN</h4>
                <p>
                    La marca debere especificar los campos que se requieren para el registro de usuario.
                    Jelou por defecto tiene una lista de campos predeterminados, de igual manera, la marca puede añadir
                    campos personalizados, solo debe proporcionar el nombre del campo y las validaciones. <br>
                    Al enviarse los datos de un cliente, queda a criterio de la marca como verificar si el cliente ya se
                    encuentra registrado en su base de datos y la actualización de los datos, lo exigido de parte de
                    jelou es retornar el ID del usuario registrado, el cual posteriormente sera utilizado para procesar
                    una venta.
                </p>
                <br>
                <pre class="pre-code-example">

                        <code class="json code-example">
{
    "success": false,
    "error" : {
        "code": 12,
        "message" : "Campo edad invalido, ingresar un número"
    }
}
</code>
</pre>

            </div>
        </div>
        <script src="{{ mix('/js/app.min.js') }}"></script>
        @livewireScripts
</body>

</html>
