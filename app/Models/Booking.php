<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'voucher_id',
        'voucher_code',
        'discount_amount',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'booking_date' => 'date',
        'discount_amount' => 'float',
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
     * Get the voucher applied to this booking.
     */
    public function voucher(): BelongsTo
    {
        return $this->belongsTo(Voucher::class);
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
     * Get original total price of booking (before discount)
     */
    public function getOriginalPriceAttribute(): float
    {
        return $this->services->sum('pivot.price');
    }

    /**
     * Get total price of booking (after discount)
     */
    public function getTotalPriceAttribute(): float
    {
        return max(0.0, $this->original_price - ($this->discount_amount ?? 0));
    }

    /**
     * Format original price for display
     */
    public function getFormattedOriginalPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->original_price, 0, ',', '.');
    }

    /**
     * Format discount price for display
     */
    public function getFormattedDiscountAttribute(): string
    {
        return 'Rp ' . number_format($this->discount_amount ?? 0, 0, ',', '.');
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
