<h1>Your Order Confirmation</h1>

<p>Thank you for your purchase. Here are the details of your order:</p>

<ul>
    @foreach($cartItems as $item)
        <li>{{ $item->shoeName }} - ${{ $item->shoePrice }}</li>
    @endforeach
</ul>

<p>Total: ${{ $total }}</p>
