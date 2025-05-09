<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .venue-title {
            color: #0d6efd;
            margin-bottom: 1.5rem;
        }
        .required-field::after {
            content: " *";
            color: red;
        }
    </style>
</head>
<body>
    <div class="form-container mt-5">
        <h1>Booking Form</h1>
        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            <!-- Product Selection -->
            <div class="venue-title mb-3">
                <!-- Visible product name display -->
                <h3>Selected Venue: {{ $product->title2 }}</h3>
                
                <!-- Hidden fields for form submission -->
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="product_name" value="{{ $product->title2 }}">
            </div>
            <!-- Customer Name -->
            <div class="mb-3">
                <label for="customer_name" class="form-label">Name</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
            </div>
        
            <!-- Customer Email -->
            <div class="mb-3">
                <label for="customer_email" class="form-label">Email</label>
                <input type="email" class="form-control" id="customer_email" name="customer_email" required>
            </div>
        
            <!-- Customer Phone -->
            <div class="mb-3">
                <label for="customer_phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="customer_phone" name="customer_phone" required>
            </div>

            <!-- Booking Date -->
            <div class="mb-3">
                <label for="customer_phone" class="form-label">Booking Date</label>
                <input type="date" class="form-control" id="booking_date" name="booking_date" required>
            </div>
        
            <!-- Total Price -->
            <div class="mb-3">
                <label for="total_price" class="form-label">Advance Amount: <strong class="text-danger">25,000</strong></label>
                <input type="hidden" class="form-control" id="total_price" value="25000" name="total_price" step="0.01" required>
            </div>
        
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Confirm Booking</button>
        </form>
    </div>
</body>
</html>


