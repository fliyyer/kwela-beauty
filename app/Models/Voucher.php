<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'type',
        'value',
        'min_booking_amount',
        'expires_at',
        'usage_limit',
        'usage_count',
        'is_active',
    ];

    protected $casts = [
        'value' => 'float',
        'min_booking_amount' => 'float',
        'expires_at' => 'date',
        'is_active' => 'boolean',
    ];

    /**
     * Scope a query to only include active vouchers.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include valid vouchers.
     */
    public function scopeValid($query)
    {
        return $query->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('expires_at')
                  ->orWhere('expires_at', '>=', Carbon::today());
            })
            ->where(function ($q) {
                $q->whereNull('usage_limit')
                  ->orWhereRaw('usage_count < usage_limit');
            });
    }

    /**
     * Check if the voucher is valid based on its expiry, active state, and usage limit.
     */
    public function isValid(): bool
    {
        if (!$this->is_active) {
            return false;
        }

        if ($this->expires_at && $this->expires_at->isPast() && !$this->expires_at->isToday()) {
            return false;
        }

        if ($this->usage_limit !== null && $this->usage_count >= $this->usage_limit) {
            return false;
        }

        return true;
    }

    /**
     * Check if the voucher is valid for a specific booking amount.
     */
    public function isValidForAmount($amount): bool
    {
        return $this->isValid() && ($amount >= $this->min_booking_amount);
    }

    /**
     * Calculate discount amount.
     */
    public function calculateDiscount($amount): float
    {
        if (!$this->isValidForAmount($amount)) {
            return 0.0;
        }

        $discount = 0.0;

        if ($this->type === 'percent') {
            $discount = ($this->value / 100) * $amount;
        } elseif ($this->type === 'fixed') {
            $discount = $this->value;
        }

        // The discount cannot be greater than the booking amount itself
        return min($discount, $amount);
    }

    /**
     * Format discount value for display.
     */
    public function getFormattedValueAttribute(): string
    {
        if ($this->type === 'percent') {
            return number_format($this->value, 0) . '%';
        }
        
        return 'Rp ' . number_format($this->value, 0, ',', '.');
    }

    /**
     * Format minimum booking amount for display.
     */
    public function getFormattedMinBookingAttribute(): string
    {
        return 'Rp ' . number_format($this->min_booking_amount, 0, ',', '.');
    }
}
