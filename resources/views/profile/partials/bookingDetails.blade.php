{{-- Welcome Message --}}
<div class="modern-booking-header">
    <div class="booking-welcome">
        <h2 class="booking-title">
            <i class="fas fa-suitcase-rolling me-2"></i>
            My Travel Bookings
        </h2>
        <p class="booking-subtitle">Kelola dan lihat detail perjalanan wisata Anda</p>
    </div>
    <div class="booking-stats">
        <div class="stat-card">
            <div class="stat-number">{{ $bookings->count() }}</div>
            <div class="stat-label">Total Bookings</div>
        </div>
    </div>
</div>

{{-- Modern Bookings Table --}}
<div class="modern-bookings-container">
    <div class="table-responsive">
        <table class="modern-bookings-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tour Package</th>
                    <th>Travel Date</th>
                    <th>Duration</th>
                    <th>Travelers</th>
                    <th>Pick Up Location</th>
                    <th>Status</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($bookings as $booking)
                <tr class="booking-row">
                    <td>
                        <div class="booking-id">#{{ str_pad($booking->id, 3, '0', STR_PAD_LEFT) }}</div>
                    </td>
                    <td>
                        <div class="package-info">
                            <div class="package-name">{{ $booking->package->package_name }}</div>
                            <div class="package-type">{{ $booking->package->tour_type }}</div>
                        </div>
                    </td>
                    <td>
                        <div class="travel-date">
                            <i class="fas fa-calendar me-2"></i>
                            {{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}
                        </div>
                    </td>
                    <td>
                        <div class="duration">
                            <i class="fas fa-clock me-2"></i>
                            {{ $booking->package->duration }} Hari
                        </div>
                    </td>
                    <td>
                        <div class="travelers-info">
                            <div class="traveler-count">
                                <i class="fas fa-users me-2"></i>
                                {{ $booking->number_of_adult + $booking->number_of_child }} orang
                            </div>
                            <div class="traveler-breakdown">
                                {{ $booking->number_of_adult }} dewasa, {{ $booking->number_of_child }} anak
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="pickup-location">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            {{ $booking->pick_up_location }}
                        </div>
                    </td>
                    <td>
                        <div class="status-container">
                            @if ($booking->reservation_status == "pending")
                                <span class="status-badge status-pending">
                                    <i class="fas fa-clock me-1"></i>
                                    Pending
                                </span>
                            @elseif ($booking->reservation_status == "Conform")
                                <span class="status-badge status-confirmed">
                                    <i class="fas fa-check-circle me-1"></i>
                                    Confirmed
                                </span>
                            @elseif ($booking->reservation_status == "Reject")
                                <span class="status-badge status-rejected">
                                    <i class="fas fa-times-circle me-1"></i>
                                    Rejected
                                </span>
                            @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



  

<style>
/* Modern Booking Header */
.modern-booking-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 2px solid #f0f0f0;
}

.booking-welcome {
    flex: 1;
}

.booking-title {
    font-size: 2rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
}

.booking-title i {
    color: #667eea;
}

.booking-subtitle {
    color: #6c757d;
    font-size: 1.1rem;
    margin: 0;
}

.booking-stats {
    display: flex;
    gap: 1rem;
}

.stat-card {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    padding: 1.5rem;
    border-radius: 15px;
    text-align: center;
    min-width: 120px;
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.25rem;
}

.stat-label {
    font-size: 0.9rem;
    opacity: 0.9;
}

/* Modern Bookings Container */
.modern-bookings-container {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    border: 1px solid #e9ecef;
}

.modern-bookings-table {
    width: 100%;
    border-collapse: collapse;
    margin: 0;
}

.modern-bookings-table thead {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
}

.modern-bookings-table th {
    padding: 1.5rem 1rem;
    font-weight: 600;
    color: #2c3e50;
    text-align: left;
    border-bottom: 2px solid #dee2e6;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.modern-bookings-table tbody tr {
    transition: all 0.3s ease;
    border-bottom: 1px solid #f0f0f0;
}

.modern-bookings-table tbody tr:hover {
    background: rgba(102, 126, 234, 0.05);
    transform: translateY(-1px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.modern-bookings-table td {
    padding: 1.5rem 1rem;
    vertical-align: middle;
}

/* Booking ID */
.booking-id {
    font-weight: 700;
    color: #667eea;
    font-size: 1rem;
}

/* Package Info */
.package-info {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.package-name {
    font-weight: 600;
    color: #2c3e50;
    font-size: 1rem;
}

.package-type {
    font-size: 0.85rem;
    color: #6c757d;
    background: rgba(102, 126, 234, 0.1);
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    display: inline-block;
    width: fit-content;
}

/* Travel Date & Duration */
.travel-date, .duration {
    display: flex;
    align-items: center;
    color: #495057;
    font-weight: 500;
}

.travel-date i, .duration i {
    color: #667eea;
}

/* Travelers Info */
.travelers-info {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.traveler-count {
    display: flex;
    align-items: center;
    font-weight: 600;
    color: #2c3e50;
}

.traveler-count i {
    color: #28a745;
}

.traveler-breakdown {
    font-size: 0.85rem;
    color: #6c757d;
}

/* Pickup Location */
.pickup-location {
    display: flex;
    align-items: center;
    color: #495057;
    font-weight: 500;
}

.pickup-location i {
    color: #dc3545;
}

/* Status Badges */
.status-container {
    display: flex;
    justify-content: center;
}

.status-badge {
    display: inline-flex;
    align-items: center;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    text-transform: capitalize;
}

.status-pending {
    background: rgba(255, 193, 7, 0.2);
    color: #856404;
    border: 1px solid rgba(255, 193, 7, 0.3);
}

.status-confirmed {
    background: rgba(40, 167, 69, 0.2);
    color: #155724;
    border: 1px solid rgba(40, 167, 69, 0.3);
}

.status-rejected {
    background: rgba(220, 53, 69, 0.2);
    color: #721c24;
    border: 1px solid rgba(220, 53, 69, 0.3);
}

/* Responsive Design */
@media (max-width: 1200px) {
    .modern-bookings-table {
        font-size: 0.9rem;
    }
    
    .modern-bookings-table th,
    .modern-bookings-table td {
        padding: 1rem 0.75rem;
    }
}

@media (max-width: 992px) {
    .modern-booking-header {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
    
    .booking-stats {
        justify-content: center;
    }
    
    .modern-bookings-table {
        font-size: 0.85rem;
    }
    
    .package-name {
        font-size: 0.9rem;
    }
    
    .travelers-info,
    .package-info {
        gap: 0.1rem;
    }
}

@media (max-width: 768px) {
    .table-responsive {
        overflow-x: auto;
    }
    
    .modern-bookings-table {
        min-width: 700px;
    }
    
    .modern-bookings-table th,
    .modern-bookings-table td {
        padding: 0.75rem 0.5rem;
    }
    
    .stat-card {
        padding: 1rem;
        min-width: 100px;
    }
    
    .stat-number {
        font-size: 1.5rem;
    }
}
</style>