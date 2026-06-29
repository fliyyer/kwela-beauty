<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'discount_type',
        'discount_value',
        'image',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'float',
        'discount_value' => 'float',
    ];

    /**
     * Get the bookings for this service.
     */
    public function bookings(): BelongsToMany
    {
        return $this->belongsToMany(Booking::class, 'booking_services')
                    ->withPivot('price')
                    ->withTimestamps();
    }

    /**
     * Scope a query to only include active services.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Check if the service has an active discount
     */
    public function getHasDiscountAttribute(): bool
    {
        return !empty($this->discount_type) && $this->discount_value > 0;
    }

    /**
     * Get the calculated price after discount
     */
    public function getDiscountedPriceAttribute(): float
    {
        if (!$this->has_discount) {
            return $this->price;
        }

        if ($this->discount_type === 'percentage') {
            return max(0.0, $this->price - ($this->price * ($this->discount_value / 100)));
        }

        // Fixed/nominal discount
        return max(0.0, $this->price - $this->discount_value);
    }

    /**
     * Get formatted original price
     */
    public function getFormattedOriginalPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    /**
     * Get formatted discounted price
     */
    public function getFormattedDiscountedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->discounted_price, 0, ',', '.');
    }

    /**
     * Alias for backward compatibility or default display
     */
    public function getFormattedPriceAttribute(): string
    {
        return $this->getFormattedOriginalPriceAttribute();
    }

    /**
     * Get discount label (e.g., "10% OFF" or "Rp 10.000 OFF")
     */
    public function getDiscountLabelAttribute(): string
    {
        if (!$this->has_discount) {
            return '';
        }

        if ($this->discount_type === 'percentage') {
            return $this->discount_value . '% OFF';
        }

        return 'Rp ' . number_format($this->discount_value, 0, ',', '.') . ' OFF';
    }
}
