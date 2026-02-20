<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'order_id',
        'transaction_id',
        'gross_amount',
        'payment_type',
        'transaction_status',
        'fraud_status',
        'transaction_time',
        'midtrans_response',
    ];

    protected $casts = [
        'midtrans_response' => 'array',
        'transaction_time' => 'datetime',
        'gross_amount' => 'decimal:2',
    ];

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
}