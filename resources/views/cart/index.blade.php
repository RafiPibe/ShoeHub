<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Shopping Cart') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap">
            @forelse($cartItems as $item)
            <a href="{{ route('shoe.details', $item->shoe->id) }}">
                <div class="p-6 text-gray-900 bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col w-1/5">
                    <img src="data:image/png;base64, {{ $item->shoe->shoeImage }}" alt="shoe Image" class="max-w-full">
                    <a> {{ $item->shoe->shoeName }}</a>
                    <a>Size: {{ $item->shoe->shoeSize }}</a>
                </div>
            </a>

            <div class="p-6 text-gray-900">
                {{ $item->shoe->shoeDescription }}
            </div>
            @empty
                <p>Your cart is empty</p>
            @endforelse
        </div>
    </div> --}}

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
        <div class="w-3/4">
            @forelse($cartItems as $item)
            <a href="{{ route('shoe.details', $item->shoe->id) }}">
                <div class="p-6 text-gray-900 bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col w-1/4">
                    <img src="data:image/png;base64, {{ $item->shoe->shoeImage }}" alt="shoe Image" class="max-w-full">
                    <a> {{ $item->shoe->shoeName }}</a>
                    <a>Size: {{ $item->shoe->shoeSize }}</a>
                </div>
            </a>

            <div class="p-6 text-gray-900">
                {{ $item->shoe->shoeDescription }}
            </div>
            @empty
                <p>Your cart is empty</p>
            @endforelse
        </div>
        <div class="w-1/4">
            <div class="p-6 text-gray-900">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Summary') }}
                </h2>
                @foreach($cartItems as $item)
                    <div>
                        <p>{{ $item->shoe->shoeName }} - ${{ $item->shoe->shoePrice }}</p>
                    </div>
                @endforeach
                <div>
                    <p>Total: ${{ $total }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
