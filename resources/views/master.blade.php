<!DOCTYPE html>

<style>

    body, h1, h2, p, ul, li {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
    }

    .hero {
        text-align: center;
        padding: 100px 0;
        background-image: url('hero-background.jpg'); /* Replace with your background image */
        background-size: cover;
        color: #fff;
    }

    .hero h1 {
        font-size: 36px;
        color: #333;

    }

    .hero p {
        font-size: 18px;
        margin-top: 20px;
        color: #333;
    }

    .cta-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #f5a623;
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        border-radius: 5px;
        margin-top: 20px;
    }

    .cta-button:hover {
        background-color: #e09600;
    }

    .products {
        text-align: center;
        padding: 40px 0;
    }

    .product {
        display: inline-block;
        margin: 20px;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 300px;
    }

    .product img {
        max-width: 100%;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .product h3 {
        font-size: 24px;
        margin-top: 10px;
    }

    .product p {
        font-size: 18px;
        margin-top: 10px;
    }

    .product a {
        display: inline-block;
        padding: 10px 20px;
        background-color: #333;
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        border-radius: 5px;
        margin-top: 20px;
    }

    .product a:hover {
        background-color: #555;
    }

    footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 10px 0;
    }

    .navbar {
        display: flex;
        justify-content: flex-end; /* Align buttons to the right */
        align-items: center;
        background-color: #333;
        color: #fff;
        padding: 10px 0;
    }

    .navbar a {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        padding: 10px 20px; /* Add padding here */
        transition: color 0.3s;
    }

    .navbar a:hover {
        color: #f5a623;
    }

    </style>
<html lang="en">
<head>
    <section class="navbar">
        <a href="/">Home</a>
        <a href="/watches">watches</a>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    </section>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Watchhub</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- dark mode --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- My Style --}}
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body class="dark-mode">
    <div class="content mx-5 my-4">
        @yield('content')
    </div>
</body>
</html>
