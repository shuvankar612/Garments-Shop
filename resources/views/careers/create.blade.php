<!DOCTYPE html>
<html>
<head>
    <title>Add Career</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2 class="mb-4">Add Career:</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('careers.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label for="job_title" class="form-label">Job Title:</label>
            <input type="text"
                   id="job_title"
                   name="job_title"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label for="department" class="form-label">Department:</label>
            <input type="text"
                   id="department"
                   name="department"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location:</label>
            <input type="text"
                   id="location"
                   name="location"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label for="experience" class="form-label">Experience:</label>
            <input type="text"
                   id="experience"
                   name="experience"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label for="vacancy" class="form-label">Vacancy:</label>
            <input type="number"
                   id="vacancy"
                   name="vacancy"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea id="description"
                      name="description"
                      rows="5"
                      class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">
            Save Career
        </button>

        <a href="{{ route('careers.index') }}" class="btn btn-secondary">
            Back
        </a>

    </form>

</div>

</body>
</html>