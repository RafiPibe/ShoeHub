@props(['value'])

<div {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300']) }}>
    <select {{ $attributes->merge(['class' => 'block mt-1 w-full bg-gray-800']) }}>
        {{ $slot }}
    </select>
</div>
