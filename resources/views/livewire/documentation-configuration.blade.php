<section class="text-gray-600 body-font relative {{ !$showConfiguration ? 'flex' : 'hidden' }}">
    <div class="container px-2 py-2 flex w-full">
            <form wire:submit.prevent="submit" class="w-full">
            <div class=" bg-white rounded-lg p-8 flex flex-col w-full mt-10 md:mt-0 relative z-10 shadow-md">
                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Configuración</h2>
                <p class="leading-relaxed mb-5 text-gray-600">Configuración de las URL y token de API de la marca
                </p>
                <div class="relative mb-4">
                    <label for="token" class="leading-7 text-sm text-gray-600">Token</label>
                    <input type="text" id="token" name="token" wire:model="brandToken"
                        class="w-full bg-white rounded border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4">
                    <label for="url_user" class="leading-7 text-sm text-gray-600">URL Crear Usuario</label>
                    <input type="text" id="url_user" name="url_user" wire:model="brandUrlUser"
                        class="w-full bg-white rounded border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4">
                    <label for="url_sale" class="leading-7 text-sm text-gray-600">URL Crear Venta</label>
                    <input type="text" id="url_sale" name="url_sale" wire:model="brandUrlSale"
                        class="w-full bg-white rounded border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <button type="submit"
                    class="text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg">Guardar</button>
            </div>
        </form>
        </div>
</section>
