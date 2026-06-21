<!DOCTYPE html>
<html>
<head>
<title>Add Career</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

<h2>Add Career:</h2>

<form action="{{ route('careers.store') }}"
      method="POST">

    @csrf

    <div class="mb-3">
        <label>Job Title:</label>

        <input type="text"
        name="job_title"
        class="form-control">
    </div>

    <div class="mb-3">
        <label>Department:</label>

        <input type="text"
        name="department"
        class="form-control">
    </div>

    <div class="mb-3">
        <label>Location:</label>

        <input type="text"
        name="location"
        class="form-control">
    </div>

    <div class="mb-3">
        <label>Experience:</label>

        <input type="text"
        name="experience"
        class="form-control">
    </div>

    <div class="mb-3">
        <label>Vacancy:</label>

        <input type="number"
        name="vacancy"
        class="form-control">
    </div>

    <div class="mb-3">
        <label>Description:</label>

        <textarea name="description"
        rows="5"
        class="form-control"></textarea>
    </div>

    <button class="btn btn-success">
    Save Career
    </button>

    <a href="{{ route('careers.index') }}"
    class="btn btn-secondary">
    Back
    </a>

</form>

</div>

</body>
</html>
