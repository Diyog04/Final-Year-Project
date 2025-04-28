<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - VenueSathi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .back-button {
    display: inline-block;
    padding: 8px 16px 8px 28px; /* More padding on left for the arrow */
    background-color: #f0f0f0;
    color: #333;
    text-decoration: none;
    font-family: Arial, sans-serif;
    font-size: 14px;
    border-radius: 4px;
    border: 1px solid #ccc;
    position: relative;
    transition: all 0.2s ease;
    cursor: pointer;
}

.back-button:hover {
    background-color: #e0e0e0;
    border-color: #aaa;
}

.back-button:active {
    background-color: #d0d0d0;
    transform: translateY(1px);
}



/* Optional: Add some margin if needed */
.back-button-container {
    margin: 10px 0;
}
        .booking-card {
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 1) !important;

        }
        
        .booking-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .btn-khalti {
            background-color: #5C2D91;
            border: none;
            font-weight: 500;
        }
        
        .btn-khalti:hover {
            background-color: #4a2474;
            transform: translateY(-2px);
        }
        
        .booking-details {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 0 15px;
        }
        
        .card-title {
            color: #2c3e50;
            min-height: 3rem;
        }

        .btn-khalti {
    background-color: #5A2A82;
    color: white;
    font-weight: 500;
    border-radius: 8px;
    padding: 10px 20px;
    border: none;
    transition: background-color 0.3s ease;
}

.btn-khalti:hover {
    background-color: #4a1f6a;
}
    </style>
</head>
    <body>
<div class="container my-5">
    
    <div class="container my-5">
        <div class="back-button-container">
            <a href="{{ url()->previous() }}" class="back-button">
                <i class="fas fa-arrow-left" style="position: absolute; left: 10px; top: 8px;"></i>
                Back
            </a>
        </div>
    
        <h2 class="mb-4">Recent Payments</h2>
    
        @if($payments->count())
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @foreach($payments as $payment)
                    <div class="col">
                        <div class="card booking-card p-3">
                            <div class="card-body">
                                <h5 class="card-title">Order ID: {{ $payment->purchase_order_id }}</h5>
                                <p class="card-text mb-1"><strong>Amount:</strong> Rs. {{ $payment->amount }}</p>
                                <p class="card-text mb-1"><strong>Status:</strong> <span class="badge bg-success">{{ ucfirst($payment->status) }}</span></p>
                                <p class="card-text"><strong>Transaction ID:</strong> {{ $payment->transaction_id ?? 'N/A' }}</p>
                                <small class="text-muted">Paid on: {{ $payment->created_at->format('M d, Y H:i') }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No payment records found.</p>
        @endif
    </div>
   
    </div>
</div>
