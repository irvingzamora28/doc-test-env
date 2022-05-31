<div class="p-2 w-full">
    <div class="relative">
        <label for="name" class="leading-7 text-sm text-gray-600">{{ array_keys($input)[0] }}</label>
        <input type="text" id="name" value="{{ array_values($input)[0] }}" name="name"
            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
    </div>
</div>
