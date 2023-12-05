<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        <div class="flex flex-col items-center justify-center mt-4 text-center">
            <div class="shrink-0 flex items-center">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
            </div>
            <hr>
            <h1 style="font-weight:bold; font-size: 40px;">Your Order Confirmation</h1>
            <p>Thank you for your purchase at <strong>ShoeHub</strong> We are currently getting your order ready.</p>
            <br>
            <img src="https://media.discordapp.net/attachments/879024310319210598/1181581223416573983/image.png?ex=65819444&is=656f1f44&hm=ca4cf7b3f8e2f77847c6ddd33c466043201f8e1cf36d529daa9c46d567e54968&=&format=webp&quality=lossless&width=528&height=702" alt="Thank you for the purchase.">
            <br>

        </div>

        <div class="px-6">
            <p>Here are the details of your order:</p>
            <div style="padding-left:10px; padding-right:10px">
                <ul>
                    @foreach($cartItems as $item)
                        <li><strong>{{ $item->shoe->shoeName }}</strong> - ${{ $item->shoe->shoePrice }}</li>
                    @endforeach
                </ul>
                <hr>
                <p>Total: ${{ $total }}</p>
            </div>
        </div>
    </body>
</html>
