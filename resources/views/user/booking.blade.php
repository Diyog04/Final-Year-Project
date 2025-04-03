<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Booking Form</h1>
        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            <!-- Product Selection -->
            <div class="mb-3">
                <label for="product_id" class="form-label">Select Product</label>
                <select class="form-control" id="product_id" name="product_id" required>
                    <option value="">Select a product</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ isset($productId) && $productId == $product->id ? 'selected' : '' }}>
                            {{ $product->name }} - ${{ $product->price }}
                        </option>
                    @endforeach
                </select>
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
        
            <!-- Total Price -->
            <div class="mb-3">
                <label for="total_price" class="form-label">Total Price</label>
                <input type="number" class="form-control" id="total_price" name="total_price" step="0.01" required>
            </div>
        
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit Booking</button>
        </form>
    </div>
</body>
</html>