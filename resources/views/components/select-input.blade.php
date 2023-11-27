@props(['value'])

<div {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    <select {{ $attributes->merge(['class' => 'block mt-1 w-full bg-white-800']) }}>
        {{ $slot }}
    </select>
</div>
