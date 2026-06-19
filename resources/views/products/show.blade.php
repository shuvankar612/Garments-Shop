<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

```
<title>Product Details - {{ $product->name }}</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
        color: #333;
    }

    .product-card {
        background: #ffffff;
        border: none;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    .product-image-container {
        background-color: #f1f3f5;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 400px;
        border-radius: 12px;
        overflow: hidden;
    }

    .product-image {
        max-width: 100%;
        max-height: 400px;
        object-fit: cover;
    }

    .badge-category {
        background-color: #e9ecef;
        color: #495057;
        font-weight: 500;
        font-size: 0.85rem;
        padding: 6px 16px;
        border-radius: 50px;
        display: inline-block;
    }

    .product-price {
        font-size: 2rem;
        font-weight: 700;
        color: #198754;
        margin: 20px 0;
    }

    .meta-label {
        font-weight: 600;
        color: #6c757d;
        width: 120px;
        display: inline-block;
    }

    .meta-value {
        color: #212529;
    }

    .btn-back {
        background-color: #212529;
        color: #fff;
        font-weight: 500;
        padding: 10px 24px;
        border-radius: 8px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
    }

    .btn-back:hover {
        background-color: #424649;
        color: #fff;
        transform: translateY(-2px);
    }
</style>
```

</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

```
        <div class="product-card p-4 p-md-5">
            <div class="row g-4 align-items-center">

                <!-- Product Image -->
                <div class="col-md-5">
                    <div class="product-image-container shadow-sm">
                        <img src="{{ asset('products/'.$product->image) }}"
                             class="product-image"
                             alt="{{ $product->name }}">
                    </div>
                </div>

                <!-- Product Details -->
                <div class="col-md-7 ps-md-4">

                    <span class="badge-category mb-3">
                        📁 {{ $product->category->name ?? 'No Category' }}
                    </span>

                    <h1 class="fw-bold mb-3">
                        {{ $product->name }}
                    </h1>

                    <div class="product-price">
                        ₹{{ number_format($product->price, 2) }}
                    </div>

                    <hr class="text-muted my-4">

                    <div class="mb-3">
                        <p class="mb-2">
                            <span class="meta-label">Size:</span>
                            <span class="meta-value fw-medium">{{ $product->size }}</span>
                        </p>

                        <p class="mb-2">
                            <span class="meta-label">Color:</span>
                            <span class="meta-value">{{ $product->color }}</span>
                        </p>
                    </div>

                    <div class="mt-4">
                        <h5 class="fw-bold mb-2 text-dark">
                            Description
                        </h5>

                        <p class="text-muted lh-base">
                            {{ $product->description }}
                        </p>
                    </div>

                    <div class="mt-5">
                        <a href="{{ route('products.index') }}" class="btn-back shadow-sm">
                            ← Back To Products
                        </a>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
```

</div>

<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
