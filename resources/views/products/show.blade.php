<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Details</title>
    <link href="https://jsdelivr.net" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">

        <div class="card p-4 shadow">

            <img src="{{asset('products/'.$product->image)}}"
            class="img-fluid rounded mb-4"
            width="300px" height="300px" alt="{{$product->name}}">

            <h2>{{$product->name}}</h2>

            <p class="text-secondary">
            Category: {{ $product->category->name ?? 'No Category' }}
            </p>
            
            <p>
            <strong>Description:</strong>
            {{ $product->description }}
            </p>

            <p>
            <strong>Size:</strong>
            {{ $product->size }}
            </p>

            <p>
            <strong>Color:</strong>
            {{ $product->color }}
            </p>

            <h4 class="text-success">
            ₹{{$product->price}}
            </h4>

            <a href="{{ route('products.index') }}"
            class="btn btn-dark mt-3">
            Back To Products:
            </a>

        </div>

    </div>

    <script src="https://jsdelivr.net"></script>
    
</body>
</html>
