<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

    <body style="background:#f4f4f4;">

    <div class="container mt-5">

        <div class="card shadow-lg border-0 p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h1 class="text-primary">
                Add Category:
                </h1>

                <a href="{{ route('categories.index') }}"
                class="btn btn-dark">
                All Categories:
                </a>

            </div>

            <form action="{{ route('categories.store') }}"
            method="POST">

                @csrf

                <div class="mb-3">

                <label class="form-label">
                Category Name:
                </label>

                <input type="text"
                name="name"
                class="form-control"
                placeholder="Enter category name"
                required>

                </div>

                <button type="submit"
                class="btn btn-success w-100">
                Save Category:
                </button>

            </form>

        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>