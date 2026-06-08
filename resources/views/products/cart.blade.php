<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">
</head>

<body style="background:#f5f5f5;">

<div class="container mt-5">

    <h1 class="mb-4 text-primary">
    Shopping Cart:
    </h1>

    @if(session('success'))
        <div class="alert alert-success">
        {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered bg-white">

        <thead>
            <tr>
                <th>Image:</th>
                <th>Name:</th>
                <th>Price:</th>
                <th>Quantity:</th>
                <th>Subtotal:</th>
                <th>Action:</th>
            </tr>
        </thead>

        <tbody>

        @php $total = 0; @endphp

        @foreach($cartItems as $item)

        @php
        $subtotal = $item->price * $item->quantity;
        $total += $subtotal;
        @endphp

        <tr>

            <td>
            <img src="{{ asset('products/'.$item->image) }}"
            width="80">
            </td>

            <td>
            {{ $item->product_name }}
            </td>

            <td>
            ₹{{ $item->price }}
            </td>

            <td>

            <a href="{{ route('cart.decrease',$item->id) }}"
            class="btn btn-warning btn-sm">
            -
            </a>

            <span class="mx-2">
            {{ $item->quantity }}
            </span>

            <a href="{{ route('cart.increase',$item->id) }}"
            class="btn btn-success btn-sm">
            +

            </a>

            </td>

            <td>
            ₹{{ $subtotal }}
            </td>

            <td>
                <a href="{{ route('cart.remove', $item->id) }}"
                class="btn btn-danger btn-sm">
                Remove:
                </a>
            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

    <h3 class="text-success">
    Total: ₹{{ $total }}
    </h3>

    <a href="{{ route('cart.clear') }}"
    class="btn btn-danger me-2">
    Clear Cart:
    </a>

    <div class="mt-4">
        <a href="{{ route('checkout') }}"
        class="btn btn-success">
        Proceed To Checkout:
        </a>
    </div>

</div>

</body>
</html>