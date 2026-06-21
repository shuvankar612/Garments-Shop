<!DOCTYPE html>
<html>
<head>
<title>Edit Career</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

<h2>Edit Career: {{ $career->job_title }}</h2>

<form action="{{ route('careers.update',$career->id) }}"
method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Job Title:</label>
        <input type="text"
        name="job_title"
        value="{{ $career->job_title }}"
        class="form-control">
    </div>

    <div class="mb-3">
        <label>Department:</label>
        <input type="text"
        name="department"
        value="{{ $career->department }}"
        class="form-control">
    </div>

    <div class="mb-3">
        <label>Location:</label>
        <input type="text"
        name="location"
        value="{{ $career->location }}"
        class="form-control">
    </div>

    <div class="mb-3">
        <label>Experience:</label>
        <input type="text"
        name="experience"
        value="{{ $career->experience }}"
        class="form-control">
    </div>

    <div class="mb-3">
        <label>Vacancy:</label>
        <input type="number"
        name="vacancy"
        value="{{ $career->vacancy }}"
        class="form-control">
    </div>

    <div class="mb-3">
        <label>Description:</label>

        <textarea name="description"
        rows="5"
        class="form-control">{{ $career->description }}</textarea>
    </div>

    <button class="btn btn-success">
    Update Career:
    </button>

    <a href="{{ route('careers.index') }}"
    class="btn btn-secondary">
    Back
    </a>

</form>

</div>

</body>
</html>
