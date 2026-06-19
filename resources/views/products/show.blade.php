<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - {{ $product->name }}</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    body{
        font-family: 'Poppins', sans-serif;
        background:#f8f9fa;
    }

    .product-card{
        background:#fff;
        border:none;
        border-radius:20px;
        box-shadow:0 10px 25px rgba(0,0,0,0.08);
        overflow:hidden;
    }

    .product-image-container{
        background:#f1f3f5;
        border-radius:15px;
        padding:20px;
        text-align:center;
    }

    .product-image{
        width:100%;
        max-height:400px;
        object-fit:cover;
        border-radius:12px;
    }

    .badge-category{
        background:#e9ecef;
        color:#495057;
        padding:8px 18px;
        border-radius:50px;
        font-size:14px;
        font-weight:500;
        display:inline-block;
    }

    .product-price{
        font-size:32px;
        font-weight:700;
        color:#198754;
    }

    .meta-label{
        font-weight:600;
        color:#6c757d;
        width:120px;
        display:inline-block;
    }

    .btn-back{
        background:#212529;
        color:white;
        text-decoration:none;
        padding:10px 20px;
        border-radius:8px;
        transition:0.3s;
    }

    .btn-back:hover{
        background:#343a40;
        color:white;
    }
</style>
</head>

<body>

<div class="container py-5">


<div class="row justify-content-center">

    <div class="col-lg-10">

        <div class="product-card p-4 p-md-5">

            <div class="row align-items-center">

                <!-- Product Image -->
                <div class="col-md-5 mb-4 mb-md-0">

                    <div class="product-image-container">

                        <img src="{{ asset('products/'.$product->image) }}"
                             alt="{{ $product->name }}"
                             class="product-image">

                    </div>

                </div>

                <!-- Product Details -->
                <div class="col-md-7">

                    <span class="badge-category mb-3">
                        📁 {{ optional($product->category)->name ?? 'No Category' }}
                    </span>

                    <h1 class="fw-bold mt-3">
                        {{ $product->name }}
                    </h1>

                    <div class="product-price mt-3">
                        ₹{{ number_format($product->price, 2) }}
                    </div>

                    <hr>

                    <p>
                        <span class="meta-label">Size:</span>
                        <span>{{ $product->size }}</span>
                    </p>

                    <p>
                        <span class="meta-label">Color:</span>
                        <span>{{ $product->color }}</span>
                    </p>

                    <div class="mt-4">

                        <h5 class="fw-bold">
                            Description
                        </h5>

                        <p class="text-muted">
                            {{ $product->description }}
                        </p>

                    </div>

                    <div class="mt-4">

                        <a href="{{ route('products.index') }}"
                           class="btn-back">
                            ← Back To Products
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
