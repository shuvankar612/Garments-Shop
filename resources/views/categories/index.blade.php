<!DOCTYPE html>
<html>

<head>

    <title>All Categories</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background:#f5f5f5;">

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

    <div class="d-flex justify-content-between mb-4">

        <h1 class="text-primary">
        All Categories:
        </h1>

        <a href="{{ route('categories.create') }}"
        class="btn btn-primary">
        Add Category:
        </a>

    </div>

    @foreach($categories as $category)

    <div class="card p-3 shadow mb-3">

        <a href="{{ route('categories.products', $category->id) }}"
           class="text-decoration-none text-dark">

            <h4>
            {{ $category->name }}
            </h4>

        </a>

        <div class="mt-2">

            <a href="{{ route('categories.show', $category->id) }}"
            class="btn btn-info btn-sm">
            View:
            </a>

            <a href="{{ route('categories.edit', $category->id) }}"
            class="btn btn-warning btn-sm">
            Edit:
            </a>

            <form action="{{ route('categories.destroy', $category->id) }}"
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

    @endforeach

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>