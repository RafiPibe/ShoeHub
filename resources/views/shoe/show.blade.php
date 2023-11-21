<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Our Precious Shoe Collections') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($shoe as $shoe)
                <div class="p-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex flex-col">
                    <a>Shoe Name: {{ $shoe->shoeName }}</a>
                    <a>Size: {{ $shoe->shoeSize }}</a>
                    <img src="data:image/png;base64, {{ $shoe->shoeImage }}" alt="shoe Image" class="max-w-xs">
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("") }}
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
