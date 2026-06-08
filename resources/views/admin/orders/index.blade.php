<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<style>

    body{
        background:#f5f5f5;
    }

    .card{
        border:none;
        border-radius:15px;
    }

    .table th{
        background:#0d6efd;
        color:white;
    }

    .page-title{
        font-weight:bold;
    }
    
</style>

</head>

<body>

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

<div class="card shadow p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="text-primary page-title">
        Manage Orders:
        </h1>

        <a href="{{ route('admin.dashboard') }}"
        class="btn btn-primary">
        Dashboard:
        </a>

    </div>

    <table class="table table-bordered table-hover align-middle">

        <thead>
            <tr>
                <th>ID:</th>
                <th>Customer:</th>
                <th>Email:</th>
                <th>Phone:</th>
                <th>Address:</th>
                <th>Total Amount:</th>
                <th>Status:</th>
            </tr>
        </thead>

        <tbody>

        @forelse($orders as $order)

            <tr>

                <td>{{ $order->id }}</td>

                <td>{{ $order->customer_name }}</td>

                <td>{{ $order->email }}</td>

                <td>{{ $order->phone }}</td>

                <td>{{ $order->address }}</td>

                <td>
                    <strong class="text-success">
                    ₹{{ $order->total_amount }}
                    </strong>
                </td>

                <td>

                    <form action="{{ route('orders.status',$order->id) }}"
                    method="POST">

                        @csrf

                        <select name="status"
                        class="form-select"
                        onchange="this.form.submit()">

                        <option value="Pending"
                        {{ $order->status=='Pending' ? 'selected' : '' }}>
                        Pending:
                        </option>

                        <option value="Processing"
                        {{ $order->status=='Processing' ? 'selected' : '' }}>
                        Processing:
                        </option>

                        <option value="Delivered"
                        {{ $order->status=='Delivered' ? 'selected' : '' }}>
                        Delivered:
                        </option>

                        </select>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
            <td colspan="7" class="text-center text-danger">
            No Orders Found:
            </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

</div>

</body>
</html>
