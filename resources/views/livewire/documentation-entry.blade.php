<section class="text-gray-600 body-font " id="{{$target}}" {{$active ? 'flex' : 'hidden'}}>
    <div class="container px-2 py-2 mx-auto">
        <div class="flex flex-wrap -m-12">
            <div class="pl-12 pr-2 md:w-1/2 flex flex-col items-center self-center" style="top: -480px; position: relative;"">
                <h2 class="sm:text-2xl text-xl title-font self-start font-medium text-gray-800 mt-16 mb-4">{{ $entry['title'] }}</h2>
                <p class="leading-relaxed mb-8">{!! nl2br(e($entry['description'])) !!} </p>
                <div
                    class="flex flex-wrap pb-4 mb-4 border-b-2 border-gray-100 mt-auto w-full">
                    <div class="w-full py-2">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                            <h2>{{$error}}</h2>
                            <input type="text" id="name" name="name" value="{{ $entry['url'] }}"
                                class="w-full px-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="flex w-full py-2 justify-end">
                        <button type="button" wire:click="sendHttp" class="py-2 px-2  bg-blue-500 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-1/3 float-right transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg "> Enviar Prueba
                        </button>
                    </div>
                    <div class="flex py-2">
                        <span class="flex py-1 px-2 text-center self-center rounded bg-blue-50 text-blue-500 text-xs font-medium tracking-widest">Datos a enviar</span>
                        <div class="flex ml-aut">
                            <button type="button" wire:click="toggleForm" class="rounded-md bg-blue-500 text-white leading-normal uppercase shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-7 h-7">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download"
                                class="w-3 mx-auto" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </svg>
                            </button>
                          </div>
                          
                    </div>

                    <div class="{{$showEditForm ? 'flex' : 'hidden'}} py-2">
                        <section class="text-gray-600 body-font relative border border-gray-200 p-6 rounded-lg shadow-md">
                            <div class="container mx-auto">
                              <div class="lg:w-full mx-auto">
                                <div class="flex flex-wrap -m-2">
                                    @foreach ($entry["inputs_info"] as $key => $input)
                                        @livewire('documentation-entry-input', ['input' => [$key => $input]], key($loop->index))
                                    @endforeach
                                       
                                  <div class="p-2 w-full">
                                    <button type="button" wire:click='saveFormInputs' class="py-2 px-2  bg-blue-500 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-1/4 float-right transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg"> Guardar
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </section>
                    </div>

<pre class="pre-code-example flex w-full">
<code class="json code-example w-full hljs">
{{ $entry['data'] }}
</code>
</pre>
                    &nbsp;&nbsp;

                    <div class="py-2">
                        <span class="inline-block py-1 px-2 self-start rounded bg-blue-50 text-blue-500 text-xs font-medium tracking-widest">Respuesta</span>
                    </div>

<pre class="pre-code-example w-full flex">
<code class="json code-example w-full hljs">
{{ $entry['response'] }}
</code>
</pre>
                    &nbsp;&nbsp;
                    
                </div>
                
                
            </div>

            <div class="p-12 md:w-1/2 flex flex-col bg-blue-300">

                <pre class="code-definition mt-8">
<h5 class="title-font text-lg font-medium text-gray-900 uppercase">Ejemplo datos a enviar</h5>
<h5 class="title-font text-md font-medium text-gray-900 uppercase">REGISTRAR UN CLIENTE</h5>
Los datos necesarios para registrar a un cliente, son los siguientes:
<code class="json hljs">
{{ $exampleDataSend }}
</code>

<h5 class="title-font text-lg font-medium text-gray-900 uppercase">Respuestas exitosas</h5>
<h5 class="title-font text-md font-medium text-gray-900 uppercase">REGISTRAR UN CLIENTE</h5>
Esta respuesta se genera al crear un cliente de manera exitosa
<code class="json hljs">
{
    "success": true,
    "customer_id": 1,
    "reg_date": "2022-05-06T18:53:47.000000Z",
    "action": "CREATE"
}
</code>
<h5 class="title-font text-md font-medium text-gray-900 uppercase">MODIFICAR DATOS DE UN CLIENTE</h5>
Esta respuesta se genera al modificar un cliente de 
manera exitosa (Los datos del cliente son modificados
cuando se intenta registrar un cliente que ya existe)
<code class="json hljs">
{
    "success": true,
    "customer_id": 2,
    "reg_date": "2022-05-06T18:56:42.000000Z",
    "action": "UPDATE"
}
</code>

<h5 class="title-font text-lg font-medium text-gray-900 uppercase">Errores</h5>
<h5 class="title-font text-md font-medium text-gray-900 uppercase">ERROR DE VALIDACIÓN AL REGISTRAR UN CLIENTE</h5>
Este error se muestra cuando existe un error de validación con los datos que fueron enviados.
<code class="json hljs">
{
    "success": false,
    "error" : {
        "code":12,
        "message" : "Campo edad invalido, ingresar un número"
    }
}
</code>
<h5 class="title-font text-md font-medium text-gray-900 uppercase">REGISTRAR UN CLIENTE</h5>
Este error se muestra cuando la ruta del api no existe.
<code class="json hljs">
{
    "success": false,
    "message": "Ruta HTTP no encontrada",
    "errors": "",
    "code": 50
}
</code>

<h5 class="title-font text-md font-medium text-gray-900 uppercase">ERROR GENERAL EN EL SERVIDOR</h5>
Este error se muestra cuando existe un error por parte del servidor.
<code class="json hljs">
{
    "success": false,
    "errors": "syntax error, unexpected 'else' (T_ELSE), expecting function (T_FUNCTION) or const (T_CONST)",
    "code": 90
}
</code>

            </pre>
            </div>

            

        </div>
    </div>
</section>