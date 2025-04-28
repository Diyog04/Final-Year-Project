@include('admin/headlayout') {{-- Assuming you have an admin layout --}}
<style>
    .badge{
        background-color: black
    }
</style>
<div id="layoutSidenav_content">
    <main>
<div class="container">
    <h1>Bookings Management</h1>
    
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
    <div class="table-responsive">
        <table class="table table-striped">
            
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Customer Phone</th>
                    <th>Booking Date</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Booking Date</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->product->title2 ?? 'N/A' }}</td> {{-- Assuming product has a 'name' field --}}
                        <td>{{ $booking->customer_name }}</td>
                        <td>{{ $booking->customer_email }}</td>
                        <td>{{ $booking->customer_phone }}</td>
                        <td>{{ $booking->booking_date }}</td>
                        <td>{{ number_format($booking->total_price, 2) }}</td>
                        <td>
                            @if($booking->status === 'pending')
                                <form action="{{ route('bookings.update-status', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                        <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Accept</option>
                                        <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Reject</option>
                                    </select>
                                </form>
                            @else
                                <span class="badge bg-{{ $booking->status === 'confirmed' ? 'success' : 'danger' }}">
                                    {{ ucfirst($booking->status) }}
                                    @if($booking->status !== 'pending')
                                        <i class="fas fa-check ms-1"></i>
                                    @endif
                                </span>
                            @endif
                        </td>
                        <td>{{ $booking->created_at->format('d/m/Y H:i') }}</td>
                       
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">No bookings found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
    </main>
    @include('admin/footerlayout') {{-- Assuming you have an admin footer layout --}}