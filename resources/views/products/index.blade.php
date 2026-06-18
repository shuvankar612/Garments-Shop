<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Products</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background: #f5f5f5;
        }

        .product-image{
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .product-card{
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: 0.3s;
        }

        .product-card:hover{
            transform: translateY(-5px);
        }

    </style>

</head>

<body>

<div class="container mt-5">

    @if(session('success'))

<div class="alert alert-success alert-dismissible fade show">

    {{ session('success') }}

    <button type="button"
    class="btn-close"
    data-bs-dismiss="alert">
    </button>

</div>

@endif

    <div class="d-flex justify-content-between align-items-center mb-5">

        <h1 class="text-primary">
        All Products:
        </h1>

        <form action="{{ route('products.index') }}"
        method="GET"
        class="d-flex">

            <input type="text"
            name="search"
            class="form-control me-2"
            placeholder="Search products">

            <button type="submit"
            class="btn btn-dark">
            Search:
            </button>

        </form>

        <div>

            <a href="{{ route('cart') }}"
            class="btn btn-dark">
            Cart:
            </a>

            <a href="{{ route('products.create') }}"
            class="btn btn-primary">
            Add Product:
            </a>

        </div>

    </div>

    <div class="row">

        @foreach ($products as $product)

        <div class="col-md-4">

            <div class="card shadow mb-4 product-card">

                <img src="{{ asset('products/'.$product->image) }}"
                class="card-img-top product-image">

                <div class="card-body">

                    <h4>
                    {{ $product->name }}
                    </h4>

                    <p class="text-secondary">
                    Category:
                    {{ optional($product->category)->name ?? 'No Category' }}
                    </p>

                    <p class="text-success">
                    ₹{{ $product->price }}
                    </p>

                    <a href="{{ route('products.show', $product->id) }}"
                    class="btn btn-info btn-sm">
                    View:
                    </a>

                    <a href="{{ route('add.to.cart', $product->id) }}"
                    class="btn btn-success btn-sm">
                    Add To Cart:
                    </a>

                    <a href="{{ route('products.edit', $product->id) }}"
                    class="btn btn-warning btn-sm">
                    Edit:
                    </a>

                    <form action="{{ route('products.destroy', $product->id) }}"
                    method="POST"
                    class="d-inline">

                        @csrf

                        @method('DELETE')

                        <button type="submit"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure?')">
                        Delete:
                        </button>

                    </form>

                </div>

            </div>

        </div>

        @endforeach

        <div class="mt-4 d-flex justify-content-center">
        {{ $products->links() }}
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>