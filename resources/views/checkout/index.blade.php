<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
        <div class="w-2/3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mt-4">
                <form action="" method="POST">
                    @csrf
                    <div>
                        <x-input-label for="shipping_address" :value="__('Shipping Address')" />
                        <x-text-input id="shipping_address" class="block mt-1 w-full" type="text" name="shipping_address" required />
                    </div>
                    <div>
                        <x-input-label for="postal_code" :value="__('Postal Code')" />
                        <x-text-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code" required />
                    </div>
                    <div>
                        <x-input-label for="city" :value="__('City')" />
                        <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" required />
                    </div>
                    <div>
                        <x-input-label for="province" :value="__('Province')" />
                        <x-text-input id="province" class="block mt-1 w-full" type="text" name="province" required />
                    </div>
                    <div>
                        <x-input-label for="country" :value="__('Country')" />
                        <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" required />
                    </div>

                    <x-primary-button type="submit" class="mt-4">
                        {{ __('Continue') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
        <div class="w-1/3">
            <div class="p-6 text-gray-900">
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
                    </div>
                </div>
                @foreach($cartItems as $item)
                <a href="{{ route('shoe.details', $item->shoe->id) }}">
                    <div class="p-6 text-gray-900 bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-row w h--fullscreen/4 my-4 relative" style="height: 15vh;">
                        <img src="data:image/png;base64, {{ $item->shoe->shoeImage }}" alt="shoe Image" class="max-w-full h-full mx-4">
                        <div class="flex flex-col mx-4">
                            <div>
                                <a> {{ $item->shoe->shoeName }}</a><br>
                                <a>Size: {{ $item->shoe->shoeSize }}</a><br>
                                <a>Price: ${{ $item->shoe->shoePrice }}</a>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
