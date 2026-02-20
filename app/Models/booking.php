<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class booking extends Model
{
    use HasFactory;

    // DB table name
    protected $table = 'bookings';

    protected $fillable = [
        'user_id',    
        'package_id',   
        'date',
        'number_of_adult',
        'number_of_child',
        'pick_up_location',
        'pick_up_location_details',
        'total_fee',
        'reservation_status',
        'invoice_status',
        'payment_status',
        'payment_receipt',
        'payment_receipt_image',
    ];


    public function user()
    {
        return $this->belongsTo(related: User::class); // Belongs to the User model
    }

    public function package()
    {
        return $this->belongsTo(TravelPackage::class, 'package_id'); // Belongs to the TravelPackage model
    }

    public function payment()
    {
        return $this->hasOne(Payment::class); // Has one payment
    }

    //for get two table data
    public function scopeWithUserAndPackage($query)
    {
        return $query->with('user', 'package'); // Eager load user and package
    }

}