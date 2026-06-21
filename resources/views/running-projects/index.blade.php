<!DOCTYPE html>
<html>
<head>
<title>Running Projects</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet"
href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

</head>

<body>

<div class="container mt-5">


<h2 class="mb-4">Running Projects</h2>

@if(session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div>
@endif

<a href="{{ route('running-projects.create') }}"
   class="btn btn-primary mb-3">
   Add Project:
</a>

<table id="projectsTable"
class="table table-bordered">

    <thead>
        <tr>
            <th>ID:</th>
            <th>Image:</th>
            <th>Title:</th>
            <th>Location:</th>
            <th>Status:</th>
            <th>Action:</th>
        </tr>
    </thead>

    <tbody>

    @foreach($projects as $project)

        <tr>

            <td>{{ $project->id }}</td>

            <td>

                @if($project->image)

                    <img src="{{ asset('running-projects/'.$project->image) }}"
                    width="80">

                @else

                    No Image

                @endif

            </td>

            <td>{{ $project->title }}</td>

            <td>{{ $project->location }}</td>

            <td>

                @if($project->status)

                    <span class="badge bg-success">
                    Active:
                    </span>

                @else

                    <span class="badge bg-danger">
                    Inactive:
                    </span>

                @endif

            </td>

            <td>

                <a href="{{ route('running-projects.edit',$project->id) }}"
                   class="btn btn-warning btn-sm">
                   Edit:
                </a>

                <form action="{{ route('running-projects.destroy',$project->id) }}"
                      method="POST"
                      style="display:inline">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete this project?')">
                            Delete:
                    </button>

                </form>

            </td>

        </tr>

    @endforeach

    </tbody>

</table>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function () {
    $('#projectsTable').DataTable();
});
</script>

</body>
</html>
