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
</head>

<body>
    <div class="left-menu">
        <div class="content-logo">
            <!--<img  src="images/logo.png" />-->
        </div>
        <div class="content-menu">
            <ul>
                <li class="scroll-to-link active" data-target="introduccion">
                    <a>Introducción</a>
                </li>
                <hr>
                <li class="scroll-to-link" data-target="registrar-cliente">
                    <a>Registrar Cliente</a>
                </li>
                <li class="scroll-to-link" data-target="registrar-orden">
                    <a>Registrar Orden</a>
                </li>

                <hr>
                <li class="scroll-to-link" data-target="diccionario-errores">
                    <a>Diccionario de errores</a>
                </li>
                <hr>
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
    </div>
    <div class="content-page">
        <div class="content-code"></div>
        <div class="content">
            <div class="overflow-hidden content-section" id="content-introduccion">
                <h2 id="introduccion">Introducción</h2>
                <pre>
                    <code class="json">
Base URL

https://xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx/api/

                    </code>
                        </pre>
                <p>
                    Api Jelou Mom, permite a las marcas una conexión directa con la plataforma de ventas, mediante una
                    serie de pasos:
                <ul>
                    <li>
                        Creación de la marca en el dashboard de Jelou:
                        <ul>
                            <li>
                                <p class="introducction">
                                    Definir si la marca requiere verificación de número de teléfono y solicitar
                                    contraseña al usuario.
                                </p>
                            </li>
                            <li>
                                <p class="introducction">
                                    Creación de token para la conexión con el api de la marca.
                                </p>
                            </li>
                        </ul>
                    </li>
                    <li>
                        Agregar urls de los webhook o servicios para conectarse con la marca::
                        <ul>
                            <li>
                                <p class="introducction">
                                    Enviar mensaje con el código de verificación de usuario.
                                </p>
                            </li>
                            <li>
                                <p class="introducction">
                                    Registrar un cliente.
                                </p>
                            </li>
                            <li>
                                <p class="introducction">
                                    Registrar una venta.
                                </p>
                            </li>
                        </ul>
                    </li>

                    <li>
                        Configuración de campos personalizados para la marca:
                        <ul>
                            <li>
                                <p class="introducction">
                                    La marca deberá entregar un documento donde debe especificar el nombre de los campos
                                    y el tipo, de igual manera las validaciones respectivas.
                                </p>
                            </li>
                        </ul>
                    </li>
                </ul>
                </p>
                <p>
                    Todos los request contrendan en el encabezado Authorization: Bearer 2: EL TOKEN A UTILIZAR SE LE
                    ASIGNARA A LA MARCA
                </p>
            </div>

            <div class="overflow-hidden content-section" id="content-registrar-cliente">
                <h2 id="registrar-cliente">Registrar Cliente</h2>
                # Body
                POST https://xxx/register-customer \
                <pre><code class="json">
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
                <pre>
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
                <div class="row">
                    <input type="text" name="url_brand">
                </div>
            </div>
        </div>
        <script src="{{ mix('/js/app.min.js') }}"></script>
</body>

</html>
