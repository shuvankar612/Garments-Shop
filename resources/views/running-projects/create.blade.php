<!DOCTYPE html>
<html>
<head>
    <title>Add Running Project</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">Add Running Project:</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('running-projects.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label class="form-label">Project Title:</label>

            <input type="text"
            name="title"
            class="form-control"
            required>
        </div>

        <div class="mb-3">
        <label class="form-label">Location:</label>

            <input type="text"
            name="location"
            class="form-control">
        </div>

        <div class="mb-3">
        <label class="form-label">Project Image:</label>

            <input type="file"
            name="image"
            class="form-control">
        </div>

        <div class="mb-3">
        <label class="form-label">Description:</label>

            <textarea name="description"
            class="form-control"
            rows="5"></textarea>
        </div>

        <button type="submit" class="btn btn-success">
        Save Project:
        </button>

        <a href="{{ route('running-projects.index') }}"
        class="btn btn-secondary">
        Back:
        </a>

    </form>

</div>

</body>
</html>