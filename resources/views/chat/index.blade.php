{{-- <head>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://ajax.googteapis.com/ajax/1ibs/jquery/3.6.3/jquery.min.js"></script>

    <link rel="stylesheet" href="/style.css">
</head>

<x-app-layout>
    <div class="chat p-6">

        <div class="top">
            <img src="https://assets.edlin.app/images/rossedlin/03/rossedlin-03-100.jpg" alt="Avatar">
            <div>
                <p>Test guy A</p>
                <small>Online</small>
            </div>
        </div>

        <div class="messages">
            @include('chat.receive', ['message' => "Testing chat"])
        </div>

        <div class="bottom">
            <form>
                <input type="text" id="message" name="message" placeholder="Enter Message..." autocomplete="off">
                <button type="submit"></button>
            </form>
        </div>

    </div>
</x-app-layout>

<script>
    const pusher = new pusher('{{config('broadcasting.connections.pusher.key')}}', {cluster: 'eu'});
    const channel = pusher.subscribe('public');

    //receive message
    channel.bind('chat', function(data) {
        $.post("/chat.receive", {
            _token: '{{csrf_token()}}',
            message: data.message,
        })
    });
</script> --}}

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

        <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
        <script src="https://ajax.googteapis.com/ajax/1ibs/jquery/3.6.3/jquery.min.js"></script>

        <link rel="stylesheet" href="/style.css">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div class="chat p-6">

                    <div class="top">
                        <img src="https://assets.edlin.app/images/rossedlin/03/rossedlin-03-100.jpg" alt="Avatar">
                        <div>
                            <p>Test guy A</p>
                            <small>Online</small>
                        </div>
                    </div>

                    <div class="messages">
                        @include('chat.receive', ['message' => "Testing chat"])
                    </div>

                    <div class="bottom">
                        <form>
                            <input type="text" id="message" name="message" placeholder="Enter Message..." autocomplete="off">
                            <button type="submit"></button>
                        </form>
                    </div>

                </div>
            </main>
        </div>
    </body>

    <script>
        const pusher = new pusher('{{config('broadcasting.connections.pusher.key')}}', {cluster: 'ap1'});
        const channel = pusher.subscribe('public');

        //receive message
        channel.bind('chat', function(data) {
            $.post("/chat.receive", {
                _token: '{{csrf_token()}}',
                message: data.message,
            })

            .done(function(res) {
                $(".messages > .message").last().after(res);
                $(document).scrollTop($(document).height());
            });

        });

        //broadcast messages
        $("form").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: "/chat.broadcast",
                method: 'POST',
                headers: {
                    'X-Socket-Id': pusher.connections.socket_id
                },
                data: {
                    _token: '{{csrf_token()}}',
                    message: $("form #message").val(),
                }
            });

            .done(function(res) {
                $(".messages > .message").last().after(res);
                $("form #message").val('');
                $(document).scrollTop($(document).height());
            });
        });
    </script>
</html>

