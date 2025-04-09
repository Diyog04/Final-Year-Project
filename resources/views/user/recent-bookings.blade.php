<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - VenueSathi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
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
    </style>
</head>
    <body>
<div class="container my-5">
    <h2 class="mb-4 text-center text-primary fw-bold">Recent Bookings</h2>
    
    <div class="row g-4">
        @foreach($bookings as $booking)
        <div class="col-md-6 col-lg-4">
            <div class="booking-card card h-100 shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <span class="badge bg-{{ 
                            $booking->status === 'confirmed' ? 'success' : 
                            ($booking->status === 'cancelled' ? 'danger' : 'warning') 
                        }} text-white rounded-pill px-3 py-2">
                            {{ ucfirst($booking->status) }}
                        </span>
                        <span class="text-muted">#{{ $booking->id }}</span>
                    </div>
                    
                    <h5 class="card-title fw-bold mb-3 text-truncate">{{ $booking->product->title2 }}</h5>
                    
                    <div class="booking-details mb-4">
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted">Total Price:</span>
                            <span class="fw-bold">Rs. {{ number_format($booking->total_price, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted">Booking Date:</span>
                            <span>{{ $booking->created_at->format('M d, Y') }}</span>
                        </div>
                        @if($booking->status === 'confirmed')
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted">Advance Due:</span>
                            <span class="fw-bold text-success">Rs. 25,000</span>
                        </div>
                        @endif
                    </div>
                    
                    <div class="text-center">
                        @if($booking->status === 'confirmed')
                            <form action="{{ route('payment.initiate', $booking->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-khalti px-4 py-2 rounded-pill">
                                    <i class="fas fa-wallet me-2"></i> Pay Advance
                                </button>
                                <p class="small text-muted mt-2">Advance amount: Rs. 25,000</p>
                            </form>
                        @elseif($booking->status === 'cancelled')
                            <button class="btn btn-outline-danger px-4 py-2 rounded-pill" disabled>
                                <i class="fas fa-times-circle me-2"></i> Cancelled
                            </button>
                        @elseif($booking->status === 'pending')
                            <button class="btn btn-outline-warning px-4 py-2 rounded-pill" disabled>
                                <i class="fas fa-clock me-2"></i> Pending Approval
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div><div class="container my-5">
    <h2 class="mb-4 text-center text-primary fw-bold">Recent Bookings</h2>
    
    <div class="row g-4">
        @foreach($bookings as $booking)
        <div class="col-md-6 col-lg-4">
            <div class="booking-card card h-100 shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <span class="badge bg-{{ 
                            $booking->status === 'confirmed' ? 'success' : 
                            ($booking->status === 'cancelled' ? 'danger' : 'warning') 
                        }} text-white rounded-pill px-3 py-2">
                            {{ ucfirst($booking->status) }}
                        </span>
                        <span class="text-muted">#{{ $booking->id }}</span>
                    </div>
                    
                    <h5 class="card-title fw-bold mb-3 text-truncate">{{ $booking->product->title2 }}</h5>
                    
                    <div class="booking-details mb-4">
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted">Total Price:</span>
                            <span class="fw-bold">Rs. {{ number_format($booking->total_price, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted">Booking Date:</span>
                            <span>{{ $booking->created_at->format('M d, Y') }}</span>
                        </div>
                        @if($booking->status === 'confirmed')
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted">Advance Due:</span>
                            <span class="fw-bold text-success">Rs. 25,000</span>
                        </div>
                        @endif
                    </div>
                    
                    <div class="text-center">
                        @if($booking->status === 'confirmed')
                            <form action="{{ route('payment.initiate', $booking->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-khalti px-4 py-2 rounded-pill">
                                    <i class="fas fa-wallet me-2"></i> Pay Advance
                                </button>
                                <p class="small text-muted mt-2">Advance amount: Rs. 25,000</p>
                            </form>
                        @elseif($booking->status === 'cancelled')
                            <button class="btn btn-outline-danger px-4 py-2 rounded-pill" disabled>
                                <i class="fas fa-times-circle me-2"></i> Cancelled
                            </button>
                        @elseif($booking->status === 'pending')
                            <button class="btn btn-outline-warning px-4 py-2 rounded-pill" disabled>
                                <i class="fas fa-clock me-2"></i> Pending Approval
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@push('scripts')
<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush

    </body>
</html>