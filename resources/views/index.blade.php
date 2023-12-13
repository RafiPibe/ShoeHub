<!DOCTYPE html>
<html lang="en">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- JavaScript -->
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- End JavaScript -->

    <!-- CSS -->
    <link rel="stylesheet" href="/style.css">
    <!-- End CSS -->

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
            <div class="chat p-6">
                <!-- Header -->
                <div class="top">
                    <img style="width:100px" src="https://media.discordapp.net/attachments/346653262830764043/1184495105751654420/n913ghbcy2861.png?ex=658c2e08&is=6579b908&hm=7b80b195866cd9290be1af35570eb4c15b7742e1a3e9e9ca0c59c7ba940b0680&=&format=webp&quality=lossless&width=382&height=382" alt="Avatar">
                    <div>
                    <p>Admin</p>
                    </div>
                </div>
                <!-- End Header -->

                <!-- Chat -->
                {{-- <div class="messages">
                    @include('receive', ['message' => "Hi! How can I help you?"])
                </div> --}}
                <!-- End Chat -->

                <!-- Footer -->
                <div class="bottom">
                    <form>
                    <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
                    <button type="submit"></button>
                    </form>
                </div>
                <!-- End Footer -->
            </div>
        </div>
    </body>

    <script>
    const pusher  = new Pusher('{{config('broadcasting.connections.pusher.key')}}', {cluster: 'ap1'});
    const channel = pusher.subscribe('public');

    //Receive messages
    channel.bind('chat', function (data) {
        $.post("/receive", {
        _token:  '{{csrf_token()}}',
        message: data.message,
        })
        .done(function (res) {
        $(".messages > .message").last().after(res);
        $(document).scrollTop($(document).height());
        });
    });

    //Broadcast messages
    $("form").submit(function (event) {
        event.preventDefault();

        $.ajax({
        url:     "/broadcast",
        method:  'POST',
        headers: {
            'X-Socket-Id': pusher.connection.socket_id
        },
        data:    {
            _token:  '{{csrf_token()}}',
            message: $("form #message").val(),
        }
        }).done(function (res) {
        $(".messages > .message").last().after(res);
        $("form #message").val('');
        $(document).scrollTop($(document).height());
        });
    });

    </script>
</html>
