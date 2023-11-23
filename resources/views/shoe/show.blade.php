<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Our Shoe Collection') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap">
            @foreach ($shoe as $shoe)
            <div class="p-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex flex-col w-1/3">
                    <img src="data:image/png;base64, {{ $shoe->shoeImage }}" alt="shoe Image" class="max-w-full">
                    <a> {{ $shoe->shoeName }}</a>
                    <a>Size: {{ $shoe->shoeSize }}</a>
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("") }}
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
