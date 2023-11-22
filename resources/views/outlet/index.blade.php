<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Outlet Informations') }}
        </h2>
        <div class="d-flex mx-5 my-5 justify-content-center text-xs dark:text-gray-200">
            <a href="/mines/create" class="btn btn-info mx-5" style="max-width: 18rem;">+Add Outlet</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($outlet as $outlet)
                <div class="p-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex flex-col">
                    <a>Outlet Name: {{ $outlet->outletName }}</a>
                    <a>Outlet Location: {{ $outlet->outletLocation }}</a>
                    <a>Outlet Owner: {{ $outlet->outletOwner }}</a>
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("") }}
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
