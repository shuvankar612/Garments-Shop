<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

    <body style="background:#f4f4f4;">

    <div class="container mt-5">

        <div class="card shadow-lg border-0 p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h1 class="text-primary">
                Add Product:
                </h1>

                <a href="{{ route('products.index') }}"
                class="btn btn-dark">
                All Products:
                </a>

            </div>

            @if ($errors->any())

<div class="alert alert-danger">

    <ul>

        @foreach ($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

            <form action="{{ route('products.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                <label class="form-label">
                Select Category:
                </label>            

                <select name="category_id" class="form-control">

                @foreach($categories as $category)

                <option value="{{ $category->id }}">
                {{ $category->name }}
                </option>

                @endforeach

                </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                    Product Name:
                    </label>

                    <input type="text"
                    name="name"
                    class="form-control"
                    placeholder="Enter product name">    

                </div>

                <div class="mb-3">

                    <label class="form-label">
                    Product Price:
                    </label>

                    <input type="number"
                    name="price"
                    class="form-control"
                    placeholder="Enter product price">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                    Product Image:
                    </label>

                    <input type="file"
                    name="image"
                    class="form-control"
                    placeholder="Enter product image">

                </div>

                <button type="submit"
                class="btn btn-success w-100">
                Save Product:
                </button>

            </form>

        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>