<!DOCTYPE html>
<html>
<head>
    <title>Running Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>

<body>

<div class="container mt-5">

    <h2 class="mb-4">Running Projects</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('running-projects.create') }}" class="btn btn-primary mb-3">
        Add Project
    </a>

    <table id="projectsTable" class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>SL</th>
                <th>Title</th>
                <th>Location</th>
                <th>Image</th>
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
    $('#projectsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('running-projects.index') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'title', name: 'title' },
            { data: 'location', name: 'location' },
            { data: 'image', name: 'image', orderable: false, searchable: false },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        initComplete: function () {
            var api = this.api();
            var container = $(api.table().container());

            // ১. সার্চ ইনপুটে id, name এবং autocomplete="off" সেট করা
            container.find('input[type="search"]')
                .attr({
                    'id': 'projectsTable_search',
                    'name': 'projectsTable_search',
                    'autocomplete': 'off'
                });

            // ২. 'Show entries' সিলেক্ট ফিল্ডেও id ও name নিশ্চিত করা
            container.find('select')
                .attr({
                    'id': 'projectsTable_length_select',
                    'name': 'projectsTable_length_select'
                });
        }
    });
});
</script>

</body>
</html>