<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Shopping Cart') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
        <div class="w-2/3">
                @forelse($cartItems as $item)
                <a href="{{ route('shoe.details', $item->shoe->id) }}">
                    <div class="p-6 text-gray-900 bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-row w-full h-screen/4 my-4 relative" style="height: 20vh;">
                        <img src="data:image/png;base64, {{ $item->shoe->shoeImage }}" alt="shoe Image" class="max-w-full h-full mx-4">
                        <div class="flex flex-col mx-4">
                            <div>
                                <a> {{ $item->shoe->shoeName }}</a><br>
                                <a>Size: {{ $item->shoe->shoeSize }}</a><br>
                                <a>Price: ${{ $item->shoe->shoePrice }}</a>
                            </div>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="absolute bottom-4 right-4">
                                @csrf
                                @method('DELETE')
                                <x-secondary-button type="submit">
                                    {{ __('Remove item from cart') }}
                                </x-secondary-button>
                            </form>
                        </div>
                    </div>
                </a>
                @empty
                    <div class="p-6 text-gray-900 bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-row w-full h-screen/4 my-4 relative" style="height: 9vh;">
                        <p>Your cart is empty</p>
                    </div>
                @endforelse
        </div>
        <div class="w-1/3">
            <div class="p-4 text-gray-900">
                <div class="p-6 text-gray-900 bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Summary') }}
                    </h2>
                    @foreach($cartItems as $item)
                        <div>
                            <p>{{ $item->shoe->shoeName }} - ${{ $item->shoe->shoePrice }}</p>
                        </div>
                    @endforeach
                    <br>
                    <hr style="border-top: 1px solid #000;">
                    <div>
                        <p>Total: ${{ $total }}</p><br>
                        @if(count($cartItems) > 0)
                            <form action="{{ route('checkout') }}" method="GET">
                                @csrf
                                <x-primary-button type="submit">
                                    {{ __('Proceed to Checkout') }}
                                </x-primary-button>
                            </form>
                        @else
                            <p>Your cart is empty</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
