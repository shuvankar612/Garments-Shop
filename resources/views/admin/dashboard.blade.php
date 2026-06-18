<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

    <style>

        body{
            background:#f5f5f5;
        }

        .dashboard-card{
            border:none;
            border-radius:15px;
            transition:0.3s;
        }

        .dashboard-card:hover{
            transform:translateY(-5px);
        }

    </style>

</head>

<body>

<div class="container mt-5">

    <h1 class="text-center text-primary mb-5">
    Admin Dashboard:
    </h1>

    <div class="row g-4">

        <div class="col-md-3">

            <div class="card shadow p-4 dashboard-card">

                <h4>Total Products:</h4>

                <h1 class="text-primary">
                {{ $totalProducts }}
                </h1>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card shadow p-4 dashboard-card">

                <h4>Total Categories:</h4>

                <h1 class="text-success">
                {{ $totalCategories }}
                </h1>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card shadow p-4 dashboard-card">

                <h4>Total Orders:</h4>

                <h1 class="text-warning">
                {{ $totalOrders }}
                </h1>

            </div>

        </div>

    </div>

    <div class="mt-5">

        <a href="{{ route('products.index') }}"
        class="btn btn-primary">
        Manage Products:
        </a>

        <a href="{{ route('categories.index') }}"
        class="btn btn-success">
        Manage Categories:
        </a>

        <a href="{{ route('cart') }}"
        class="btn btn-dark">
        View Cart:
        </a>

        <a href="{{ route('orders.index') }}"
        class="btn btn-warning">
        Manage Orders:
        </a>

    </div>

</div>

</body>
</html>