{{-- Modern Invoice Header --}}
<div class="modern-invoice-header">
    <div class="invoice-welcome">
        <h2 class="invoice-title">
            <i class="fas fa-file-invoice-dollar me-2"></i>
            Payment & Invoices
        </h2>
        <p class="invoice-subtitle">Kelola pembayaran dan tagihan perjalanan wisata Anda</p>
    </div>
    <div class="invoice-stats">
        <div class="stat-card pending">
            <div class="stat-number">{{ $bookings->where('payment_status', 'pending')->count() }}</div>
            <div class="stat-label">Pending Payment</div>
        </div>
        <div class="stat-card success">
            <div class="stat-number">{{ $bookings->where('payment_status', 'Success')->count() }}</div>
            <div class="stat-label">Paid</div>
        </div>
    </div>
</div>

{{-- Modern Invoice Table --}}
<div class="modern-invoice-container">
    <div class="table-responsive">
        <table class="modern-invoice-table">
            <thead>
                <tr>
                    <th>Invoice ID</th>
                    <th>Tour Package</th>
                    <th>Travel Date</th>
                    <th>Amount</th>
                    <th>Booking Status</th>
                    <th>Payment Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($bookings as $booking)
                <tr class="invoice-row">
                    <td>
                        <div class="invoice-id">
                            <i class="fas fa-receipt me-2"></i>
                            #INV-{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}
                        </div>
                    </td>
                    <td>
                        <div class="package-info">
                            <div class="package-name">{{ $booking->package->package_name }}</div>
                            <div class="package-duration">{{ $booking->package->duration }} Hari</div>
                        </div>
                    </td>
                    <td>
                        <div class="travel-date">
                            <i class="fas fa-calendar me-2"></i>
                            {{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}
                        </div>
                    </td>
                    <td>
                        <div class="amount-info">
                            <div class="amount">Rp {{ number_format($booking->total_fee, 0, ',', '.') }}</div>
                            <div class="amount-detail">{{ $booking->number_of_adult + $booking->number_of_child }} travelers</div>
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
                        </div>
                    </td>
                    <td>
                        <div class="payment-status-container">
                            @if ($booking->payment_status == "pending")
                                <span class="status-badge payment-pending">
                                    <i class="fas fa-clock me-1"></i>
                                    Pending Payment
                                </span>
                            @elseif ($booking->payment_status == "Success")
                                <span class="status-badge payment-success">
                                    <i class="fas fa-check-circle me-1"></i>
                                    Paid
                                </span>
                            @elseif ($booking->payment_status == "failed")
                                <span class="status-badge payment-failed">
                                    <i class="fas fa-times-circle me-1"></i>
                                    Payment Failed
                                </span>
                            @else
                                <span class="status-badge payment-other">
                                    {{ $booking->payment_status }}
                                </span>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="action-buttons">
                            @if ($booking->payment_status == "pending" || $booking->payment_status == "failed")
                                <a href="{{route('profile.showInvoiceDetails', $booking->id)}}" 
                                   class="btn-action btn-pay-now" 
                                   title="Pay Now">
                                    <i class="fas fa-credit-card me-1"></i>
                                    Pay Now
                                </a>
                            @else
                                <a href="{{route('profile.showInvoiceDetails', $booking->id)}}" 
                                   class="btn-action btn-view" 
                                   title="View Invoice Details">
                                    <i class="fas fa-eye me-1"></i>
                                    View Invoice
                                </a>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



  
<style>
/* Modern Invoice Header */
.modern-invoice-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 2px solid #f0f0f0;
}

.invoice-welcome {
    flex: 1;
}

.invoice-title {
    font-size: 2rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
}

.invoice-title i {
    color: #28a745;
}

.invoice-subtitle {
    color: #6c757d;
    font-size: 1.1rem;
    margin: 0;
}

.invoice-stats {
    display: flex;
    gap: 1rem;
}

.stat-card {
    padding: 1.5rem;
    border-radius: 15px;
    text-align: center;
    min-width: 120px;
    color: white;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.stat-card.pending {
    background: linear-gradient(135deg, #ffc107, #ff8f00);
}

.stat-card.success {
    background: linear-gradient(135deg, #28a745, #20c997);
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

/* Modern Invoice Container */
.modern-invoice-container {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    border: 1px solid #e9ecef;
}

.modern-invoice-table {
    width: 100%;
    border-collapse: collapse;
    margin: 0;
}

.modern-invoice-table thead {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
}

.modern-invoice-table th {
    padding: 1.5rem 1rem;
    font-weight: 600;
    color: #2c3e50;
    text-align: left;
    border-bottom: 2px solid #dee2e6;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.modern-invoice-table tbody tr {
    transition: all 0.3s ease;
    border-bottom: 1px solid #f0f0f0;
}

.modern-invoice-table tbody tr:hover {
    background: rgba(40, 167, 69, 0.05);
    transform: translateY(-1px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.modern-invoice-table td {
    padding: 1.5rem 1rem;
    vertical-align: middle;
}

/* Invoice ID */
.invoice-id {
    font-weight: 700;
    color: #28a745;
    font-size: 1rem;
    display: flex;
    align-items: center;
}

.invoice-id i {
    color: #28a745;
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

.package-duration {
    font-size: 0.85rem;
    color: #6c757d;
    background: rgba(40, 167, 69, 0.1);
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    display: inline-block;
    width: fit-content;
}

/* Travel Date */
.travel-date {
    display: flex;
    align-items: center;
    color: #495057;
    font-weight: 500;
}

.travel-date i {
    color: #667eea;
}

/* Amount Info */
.amount-info {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.amount {
    font-weight: 700;
    color: #28a745;
    font-size: 1.1rem;
}

.amount-detail {
    font-size: 0.85rem;
    color: #6c757d;
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

.payment-pending {
    background: rgba(255, 193, 7, 0.2);
    color: #856404;
    border: 1px solid rgba(255, 193, 7, 0.3);
}

.payment-success {
    background: rgba(40, 167, 69, 0.2);
    color: #155724;
    border: 1px solid rgba(40, 167, 69, 0.3);
}

.payment-failed {
    background: rgba(220, 53, 69, 0.2);
    color: #721c24;
    border: 1px solid rgba(220, 53, 69, 0.3);
}

.payment-other {
    background: rgba(108, 117, 125, 0.2);
    color: #495057;
    border: 1px solid rgba(108, 117, 125, 0.3);
}

/* Payment Status Container */
.payment-status-container {
    display: flex;
    justify-content: center;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 0.5rem;
    justify-content: center;
}

.btn-action {
    display: inline-flex;
    align-items: center;
    padding: 0.75rem 1.25rem;
    border-radius: 12px;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
}

.btn-pay-now {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
}

.btn-pay-now:hover {
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(40, 167, 69, 0.4);
    text-decoration: none;
}

.btn-view {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
}

.btn-view:hover {
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    text-decoration: none;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .modern-invoice-table {
        font-size: 0.9rem;
    }
    
    .modern-invoice-table th,
    .modern-invoice-table td {
        padding: 1rem 0.75rem;
    }
}

@media (max-width: 992px) {
    .modern-invoice-header {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
    
    .invoice-stats {
        justify-content: center;
    }
    
    .modern-invoice-table {
        font-size: 0.85rem;
    }
    
    .package-name {
        font-size: 0.9rem;
    }
    
    .btn-payment {
        padding: 0.5rem 1rem;
        font-size: 0.85rem;
    }
}

@media (max-width: 768px) {
    .table-responsive {
        overflow-x: auto;
    }
    
    .modern-invoice-table {
        min-width: 900px;
    }
    
    .modern-invoice-table th,
    .modern-invoice-table td {
        padding: 0.75rem 0.5rem;
    }
    
    .stat-card {
        padding: 1rem;
        min-width: 100px;
    }
    
    .stat-number {
        font-size: 1.5rem;
    }
    
    .payment-dropdown {
        min-width: 250px;
    }
}
</style>