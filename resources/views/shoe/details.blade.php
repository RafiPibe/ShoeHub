<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Shoe Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex">
                <img src="data:image/png;base64, {{ $shoe->shoeImage }}" alt="shoe Image" class="max-w-full sm:rounded-lg flex">
                <div class="ml-4">
                    <h3> {{ $shoe->shoeName }}</h3>
                    <h3>Size: {{ $shoe->shoeSize }}</h3>
                    <h3>Price: ${{ $shoe->shoePrice}}</h3>
                    <div class="mt-4">
                        <x-secondary-button>
                            {{ __('Favourite') }}
                        </x-secondary-button>
                        <form action="{{ route('userCart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="shoeId" value="{{ $shoe->id }}">
                            <x-primary-button class="ml-4">
                                {{ __('Add to Cart') }}
                            </x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
