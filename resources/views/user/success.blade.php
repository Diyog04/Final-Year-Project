<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Booking Successful!</h1>
        <p>{{ session('message') }}</p>
        <a href="{{ route('user.success') }}" class="btn btn-primary">Make Another Booking</a>
    </div>
</body>
</html>