<!DOCTYPE html>
<html>
<head>
    <title>Careers List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>

<body>

<div class="container mt-5">

    <h2>Careers List</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('careers.create') }}" class="btn btn-primary mb-3">
        Add Career
    </a>

    <table id="careerTable" class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>SL</th>
                <th>Job Title</th>
                <th>Department</th>
                <th>Location</th>
                <th>Experience</th>
                <th>Vacancy</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data will load via AJAX -->
        </tbody>
    </table>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function () {
    $('#careerTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('careers.index') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'job_title', name: 'job_title' },
            { data: 'department', name: 'department' },
            { data: 'location', name: 'location' },
            { data: 'experience', name: 'experience' },
            { data: 'vacancy', name: 'vacancy' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>

</body>
</html>