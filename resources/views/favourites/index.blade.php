<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shoes you love') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap">
            @foreach ($favourites as $favourite)
            <a href="{{ route('shoe.details', $favourite->shoe->id) }}">
                <div class="p-6 text-gray-900 bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col w-1/5">
                    <img src="data:image/png;base64, {{ $favourite->shoe->shoeImage }}" alt="shoe Image" class="max-w-full">
                    <a> {{ $favourite->shoe->shoeName }}</a>
                    <a>Price: ${{ $favourite->shoe->shoePrice }}</a>
                    <form action="{{ route('userFav.remove', $favourite->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-secondary-button type="submit">
                            {{ __('remove') }}
                        </x-secondary-button>
                    </form>
                </div>
            </a>

            <div class="p-6 text-gray-900">
                {{ __("") }}
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
