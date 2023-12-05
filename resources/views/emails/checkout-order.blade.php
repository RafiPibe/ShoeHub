<h1>Your Order Confirmation</h1>

<p>Thank you for your purchase at ShoeHub. We are currently getting your order ready</p>
<p>Here are the details of your order:</p>

<ul>
    @foreach($cartItems as $item)
        <li>{{ $item->shoe->shoeName }} - ${{ $item->shoe->shoePrice }}</li>
    @endforeach
</ul>

<p>Total: ${{ $total }}</p>
