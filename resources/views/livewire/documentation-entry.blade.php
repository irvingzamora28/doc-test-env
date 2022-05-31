<div class="overflow-hidden content-sectionsd" id="content-introduccions">
    <h2 id="introduccion">{{ $entry['title'] }}</h2>
    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
    <pre class="code-definition">
        <code class="json hljs">
Base URL

https://xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx/api/

        </code>
    </pre>

    <p>
        <label for="url" class="text-gray-700">
            URL
        </label>
        <input type="text" id="url"
            class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            name="url" placeholder="API URL" value="{{ $entry['url'] }}" />

        {!! nl2br(e($entry['description'])) !!}
        <br>
        <button type="button" wire:click="sendHttp"
            class="py-2 px-2  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-1/4 float-right transition ease-in duration-200 text-center text-base shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
            Enviar Prueba
        </button>

        <h5> DATOS A ENVIAR </h5>
        <pre class="pre-code-example mt-6">

            <code class="json code-example hljs">
{{ $entry['code'] }}
            </code>
        </pre>

        <h5> RESPUESTA </h5>
        <pre class="pre-code-example mt-6">

            <code class="json code-example hljs">
{{ $entry['code'] }}
            </code>
        </pre>

    </p>

</div>
