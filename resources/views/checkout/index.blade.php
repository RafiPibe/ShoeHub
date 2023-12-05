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
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mt-4">
                <form action="" method="POST">
                    @csrf
                    <div>
                        <x-input-label for="payment_method" :value="__('Payment Method')" />
                        <select id="payment_method" name="payment_method" class="block mt-1 w-full" onchange="showPaymentFields()">
                            <option selected value="">-</option>
                            <option value="Dana">Dana</option>
                            <option value="Gopay">Gopay</option>
                            <option value="OVO">OVO</option>
                            <option value="Paypal">Paypal</option>
                            <option value="Credit Card">Credit Card</option>
                        </select>
                    </div>
                    <div class="mt-4" x-show="showPhoneNumber" id="phone_number_section"  style="display: none;">
                        <x-input-label for="phone_number" :value="__('Phone Number')" />
                        <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" required />
                    </div>
                    <div class="mt-4" x-show="showCreditCardFields" id="card_number_section" style="display: none;">
                        <x-input-label for="card_number" :value="__('Card Number')" />
                        <x-text-input id="card_number" class="block mt-1 w-full" type="text" name="card_number" required />
                    </div>
                    <div x-show="showCreditCardFields" id="expiry_date_section" style="display: none;">
                        <x-input-label for="expiry_date" :value="__('Expiry Date')" />
                        <x-text-input id="expiry_date" class="block mt-1 w-full" type="text" name="expiry_date" required />
                    </div>
                    <div x-show="showCreditCardFields" id="cvv_section" style="display: none;">
                        <x-input-label for="cvv" :value="__('CVV')" />
                        <x-text-input id="cvv" class="block mt-1 w-full" type="text" name="cvv" required />
                    </div>
                </form>

                    {{-- <x-primary-button type="submit" class="mt-4">
                        {{ __('Continue') }}
                    </x-primary-button> --}}
                <form method="POST" action="{{ route('send-email-on-continue') }}">
                    @csrf
                    <x-primary-button type="submit" class="mt-4">
                        {{ __('Continue') }}
                    </x-primary-button>
                </form>
            </div>
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
                        <p>Total: ${{ $total }}</p>
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
<script>
    function showPaymentFields()
    {
        let paymentMethod = document.getElementById('payment_method').value;
        let phoneSection = document.getElementById('phone_number_section');
        let cardSection = document.getElementById('card_number_section');
        let expirySection = document.getElementById('expiry_date_section');
        let cvvSection = document.getElementById('cvv_section');

        if (paymentMethod !== 'Credit Card') {
            phoneSection.style.display = 'block';
            cardSection.style.display = 'none';
            expirySection.style.display = 'none';
            cvvSection.style.display = 'none';
        } else {
            phoneSection.style.display = 'none';
            cardSection.style.display = 'block';
            expirySection.style.display = 'block';
            cvvSection.style.display = 'block';
        }
    }
</script>
