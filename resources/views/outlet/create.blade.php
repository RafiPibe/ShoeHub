<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Outlet Information Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="form-container">
                    <form action="{{ route('outlet.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-input-label for="name" :value="__('outlet Form')" />

                            {{-- outlet Name --}}
                            <div class="mt-4">
                                <x-input-label for="outletName" :value="__('outlet Name')" />
                                <x-text-input id="outletName" class="block mt-1 w-full" type="text" name="outletName" :value="old('outletName')" required autofocus autocomplete="outletName" />
                                <x-input-error :messages="$errors->get('outletName')" class="mt-2" />
                            </div>

                            {{-- outlet Location --}}
                            <div class="mt-4">
                                <x-input-label for="outletLocation" :value="__('outlet Location')" />
                                <x-text-input id="outletLocation" class="block mt-1 w-full" type="text" name="outletLocation" :value="old('outletLocation')" required autofocus autocomplete="outletLocation" />
                                <x-input-error :messages="$errors->get('outletLocation')" class="mt-2" />
                            </div>

                            {{-- outlet Staff --}}
                            <div class="mt-4">
                                <x-input-label for="outletStaff" :value="__('outlet Staff')" />
                                <x-text-input id="outletStaff" class="block mt-1 w-full" type="text" name="outletStaff" :value="old('outletStaff')" required autofocus autocomplete="outletStaff" />
                                <x-input-error :messages="$errors->get('outletStaff')" class="mt-2" />
                            </div>

                            <div class="flex justify-center mb-4">
                                <x-primary-button class="mx-auto">
                                    {{ __('Submit') }}
                                </x-primary-button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
