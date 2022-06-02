<div class="p-2 w-full">
    <div class="relative">
        <label for="name" class="leading-7 text-sm text-gray-600">{{ array_keys($input)[0] }}</label>
        @if ($fieldType == 'input')
            <input type="text" id="{{ array_keys($input)[0] }}"
                wire:change="updateInput('{{ array_keys($input)[0] }}', $event.target.value)"
                value="{{ $value }}" name="{{ array_keys($input)[0] }}"
                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        @endif

        @if ($fieldType == 'radio')
            @foreach ($multipleValue as $item)
                <div class="form-check">
                    <input
                        class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                        type="radio" name="{{ array_keys($input)[0] }}" id="{{ array_keys($input)[0] }}"
                        value="{{ $item['value'] }}"
                        wire:change="updateInput('{{ array_keys($input)[0] }}', $event.target.value)"
                        {{ $loop->index == 0 ? 'checked=checked' : '' }}>
                    <label class="form-check-label inline-block text-gray-800" for="{{ array_keys($input)[0] }}">
                        {{ $item['name'] }}
                    </label>
                </div>
            @endforeach
        @endif

        @if ($fieldType == 'select')
            <div class="mb-3 xl:w-96">
                <select
                    class="form-select appearance-none
              block
              w-full
              px-3
              py-1.5
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding bg-no-repeat
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    aria-label="Default select example"
                    wire:change="updateInput('{{ array_keys($input)[0] }}', $event.target.value)"
                    >
                    <option value="0">Seleccionar opción</option>
                    @foreach ($multipleValue as $item)
                        <option value="{{ $item['value'] }}" {{ $loop->index == 0 ? 'selected="selected"' : '' }}>{{ $item['name'] }}</option>
                    @endforeach
                </select>
            </div>
        @endif
    </div>
</div>
