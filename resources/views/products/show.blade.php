<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-5">

        <div class="card p-4 shadow">

            <img src="{{asset('products/'.$product->image)}}"
            class="img-fluid rounded mb-4"
            width="300px" height="300px">

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    
</body>
</html>
