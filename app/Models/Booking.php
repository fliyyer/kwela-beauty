<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_name',
        'email',
        'phone',
        'booking_date',
        'booking_time',
        'status',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'booking_date' => 'date',
    ];

    /**
     * Get the services for this booking.
     */
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'booking_services')
                    ->withPivot('price')
                    ->withTimestamps();
    }

    /**
     * Scope a query to only include bookings with a specific status.
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope a query to only include bookings for today.
     */
    public function scopeToday($query)
    {
        return $query->where('booking_date', now()->toDateString());
    }

    /**
     * Get total price of booking
     */
    public function getTotalPriceAttribute(): float
    {
        return $this->services->sum('pivot.price');
    }

    /**
     * Format total price for display
     */
    public function getFormattedTotalAttribute(): string
    {
        return 'Rp ' . number_format($this->total_price, 0, ',', '.');
    }

    /**
     * Get status badge color
     */
    public function getStatusBadgeClassAttribute(): string
    {
        return match($this->status) {
            'pending' => 'bg-yellow-100 text-yellow-800',
            'confirmed' => 'bg-blue-100 text-blue-800',
            'completed' => 'bg-green-100 text-green-800',
            'cancelled' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }
}
