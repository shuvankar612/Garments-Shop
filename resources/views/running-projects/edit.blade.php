<!DOCTYPE html>
<html>
<head>
<title>Edit Running Project</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<h2>Edit Running Project</h2>

<form action="{{ route('running-projects.update',$runningProject->id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Project Title:</label>

        <input type="text"
        name="title"
        value="{{ $runningProject->title }}"
        class="form-control">
    </div>

    <div class="mb-3">
        <label>Location:</label>

        <input type="text"
        name="location"
        value="{{ $runningProject->location }}"
        class="form-control">
    </div>

    <div class="mb-3">

        <label>Current Image:</label>

        <br>

        @if($runningProject->image)

            <img src="{{ asset('products/'.$runningProject->image) }}"
            width="120">

        @endif

    </div>

    <div class="mb-3">

        <label>Change Image:</label>

        <input type="file"
        name="image"
        class="form-control">

    </div>

    <div class="mb-3">

        <label>Description:</label>

        <textarea name="description"
        class="form-control"
        rows="5">{{ $runningProject->description }}</textarea>

    </div>

    <button class="btn btn-success">
    Update Project:
    </button>

    <a href="{{ route('running-projects.index') }}"
       class="btn btn-secondary">
        Back:
    </a>

</form>

</div>

</body>
</html>
