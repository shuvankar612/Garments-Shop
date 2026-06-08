<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card p-4 shadow">

        <h1 class="text-primary mb-4">
        Edit Product:
        </h1>

        <form action="{{ route('products.update', $product->id) }}"
        method="POST"
        enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                Category:
                </label>

                <select name="category_id" class="form-control">

                    @foreach($categories as $category)

                        <option value="{{ $category->id }}"
                            {{ $product->category_id == $category->id ? 'selected' : '' }}>

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
            value="{{ $product->name }}">    

            </div>

            <div class="mb-3">
            <label class="form-label">
            Product Price:
            </label>

            <input type="number"
            name="price"
            class="form-control"
            value="{{ $product->price }}">

            </div>

            <div class="mb-3">
            <label class="form-label">
            Current Image:
            </label>    

            <br>

            <img src="{{ asset('products/'.$product->image) }}"
            width="150"
            class="mb-3 rounded">

            </div>

            <div class="mb-3">
            <label class="form-label">
            New Image:
            </label>

            <input type="file"
            name="image"
            class="form-control">
            </div>

            <button type="submit"
            class="btn btn-success">
            Update Product:
            </button>

        </form>

    </div>

</div>

</body>
</html>