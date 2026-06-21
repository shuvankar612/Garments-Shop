<!DOCTYPE html>
<html>
<head>
<title>Careers List</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet"
href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>

<div class="container mt-5">

<h2>Careers List:</h2>

@if(session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div>
@endif

<a href="{{ route('careers.create') }}"
   class="btn btn-primary mb-3">
    Add Career:
</a>

<table id="careerTable"
class="table table-bordered">

    <thead>
    <tr>
        <th>ID:</th>
        <th>Job Title:</th>
        <th>Department:</th>
        <th>Location:</th>
        <th>Experience:</th>
        <th>Vacancy:</th>
        <th>Status:</th>
        <th>Action:</th>
    </tr>
    </thead>

    <tbody>

    @foreach($careers as $career)

    <tr>

        <td>{{ $career->id }}</td>
        <td>{{ $career->job_title }}</td>
        <td>{{ $career->department }}</td>
        <td>{{ $career->location }}</td>
        <td>{{ $career->experience }}</td>
        <td>{{ $career->vacancy }}</td>

        <td>
            @if($career->status)
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

            <a href="{{ route('careers.edit',$career->id) }}"
            class="btn btn-warning btn-sm">
            Edit:
            </a>

            <form action="{{ route('careers.destroy',$career->id) }}"
            method="POST"
            style="display:inline">

                @csrf
                @method('DELETE')

                <button type="submit"
                class="btn btn-danger btn-sm"
                onclick="return confirm('Delete this career?')">
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
    $('#careerTable').DataTable();
});
</script>

</body>
</html>
