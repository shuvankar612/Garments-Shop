<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">
</head>

<body style="background:#f5f5f5;">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow p-4">

                <h1 class="text-primary mb-4">
                Checkout Page:
                </h1>

                <form method="POST" action="{{ route('order.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">
                        Full Name:
                        </label>

                        <input
                            type="text"
                            name="customer_name"
                            class="form-control"
                            placeholder="Enter your name"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                        Email Address:
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="Enter your email"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                        Phone Number:
                        </label>

                        <input
                            type="text"
                            name="phone"
                            class="form-control"
                            placeholder="Enter your phone number"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                        Delivery Address:
                        </label>

                        <textarea
                            name="address"
                            class="form-control"
                            rows="4"
                            placeholder="Enter delivery address"
                            required></textarea>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-success w-100">
                        Place Order:
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>