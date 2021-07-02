<!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
@props(['name' => 'name', 'ispassword' => false])
<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
           for="{{ $name }}"
    >
        {{ ucwords( $name ) }}
    </label>

    <input class="border border-gray-400 p-2 w-full"
           type="{{ $name }}"
           name="{{ $name }}"
           id="{{ $name }}"
           value="{{ $ispassword ? '' : old($name) }}"
           required
    />]
    @error({{ $name }})
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
