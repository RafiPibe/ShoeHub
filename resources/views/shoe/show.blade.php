<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Our Shoe Collection') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap py-6">
    <x-dropdown align="left" width="48">
        <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 border border-black text-sm leading-4 font-medium rounded-md text-black dark:text-black bg-white hover:text-black focus:outline-none transition ease-in-out duration-150">
                <div>{{ __('Filter by Size') }}</div>
                <svg class="h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a1 1 0 01-.707-.293l-7-7a1 1 0 011.414-1.414L10 15.586l6.293-6.293a1 1 0 111.414 1.414l-7 7A1 1 0 0110 18z" clip-rule="evenodd" />
                </svg>
            </button>
        </x-slot>
        <x-slot name="content">
            <div class="py-1 bg-white">
                <a href="{{ route('shoe.show', ['size' => 'all']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">All</a>
                @foreach(range(30, 50) as $size)
                    <a href="{{ route('shoe.show', ['size' => $size]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ $size }}</a>
                @endforeach
            </div>
        </x-slot>
    </x-dropdown>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap">
            @forelse ($shoe as $shoe)
                <a href="{{ route('shoe.details', $shoe->id) }}">
                    <div class="p-6 text-gray-900 bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col w-1/5 mb-4">
                        <img src="data:image/png;base64, {{ $shoe->shoeImage }}" alt="shoe Image" class="max-w-full">
                        <a> {{ $shoe->shoeName }}</a>
                        <a>Size: EU{{ $shoe->shoeSize}}</a>
                        <a>Price: ${{ $shoe->shoePrice }}</a>
                    </div>
                </a>

                <div class="p-6 text-gray-900">
                    {{ __("") }}
                </div>

                @empty
                    <div class="p-6 text-gray-900 bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-row w-full h-screen/4 my-4 relative" style="height: 9vh;">
                        <p>Sorry there aren't any shoes of that size available</p>
                    </div>
            @endforelse
        </div>
    </div>

</x-app-layout>
