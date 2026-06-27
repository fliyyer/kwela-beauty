<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\User;
use App\Models\Voucher;
use App\Models\Booking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VoucherTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create an admin user for testing CRUD
        $this->admin = User::factory()->create([
            'is_admin' => true,
        ]);
    }

    /**
     * Test admin can access voucher list and CRUD.
     */
    public function test_admin_can_manage_vouchers(): void
    {
        $this->actingAs($this->admin);

        // 1. Create Voucher
        $response = $this->post(route('admin.vouchers.store'), [
            'code' => 'TESTVOUCHER',
            'type' => 'percent',
            'value' => 15,
            'min_booking_amount' => 50000,
            'expires_at' => now()->addDays(5)->format('Y-m-d'),
            'usage_limit' => 10,
        ]);

        $response->assertRedirect(route('admin.vouchers.index'));
        $this->assertDatabaseHas('vouchers', [
            'code' => 'TESTVOUCHER',
            'value' => 15.00,
        ]);

        $voucher = Voucher::where('code', 'TESTVOUCHER')->first();

        // 2. Edit Voucher
        $response = $this->put(route('admin.vouchers.update', $voucher->id), [
            'code' => 'TESTVOUCHER2',
            'type' => 'fixed',
            'value' => 20000,
            'min_booking_amount' => 100000,
            'usage_limit' => 5,
        ]);

        $response->assertRedirect(route('admin.vouchers.index'));
        $this->assertDatabaseHas('vouchers', [
            'code' => 'TESTVOUCHER2',
            'type' => 'fixed',
            'value' => 20000.00,
        ]);

        // 3. Delete Voucher
        $response = $this->delete(route('admin.vouchers.destroy', $voucher->id));
        $response->assertRedirect(route('admin.vouchers.index'));
        $this->assertDatabaseMissing('vouchers', [
            'code' => 'TESTVOUCHER2',
        ]);
    }

    /**
     * Test apply voucher AJAX validation.
     */
    public function test_apply_voucher_validation(): void
    {
        $service1 = Service::create([
            'name' => 'Hair Treatment',
            'price' => 60000,
            'status' => 'active',
        ]);

        $service2 = Service::create([
            'name' => 'Nail Spa',
            'price' => 50000,
            'status' => 'active',
        ]);

        // Create Voucher percent
        $voucherPercent = Voucher::create([
            'code' => 'PERCENT10',
            'type' => 'percent',
            'value' => 10,
            'min_booking_amount' => 100000,
            'is_active' => true,
        ]);

        // 1. Apply voucher when min booking amount not met (60k < 100k)
        $response = $this->postJson(route('booking.applyVoucher'), [
            'voucher_code' => 'PERCENT10',
            'service_ids' => [$service1->id],
        ]);

        $response->assertOk();
        $response->assertJson([
            'valid' => false,
        ]);

        // 2. Apply voucher when min booking amount is met (60k + 50k = 110k >= 100k)
        $response = $this->postJson(route('booking.applyVoucher'), [
            'voucher_code' => 'PERCENT10',
            'service_ids' => [$service1->id, $service2->id],
        ]);

        $response->assertOk();
        $response->assertJson([
            'valid' => true,
            'voucher_code' => 'PERCENT10',
            'discount_amount' => 11000, // 10% of 110,000
            'final_total' => 99000,
        ]);
    }

    /**
     * Test booking creation with voucher applies discount.
     */
    public function test_booking_store_applies_voucher_discount(): void
    {
        $service = Service::create([
            'name' => 'Facial Ritual',
            'price' => 150000,
            'status' => 'active',
        ]);

        $voucher = Voucher::create([
            'code' => 'PROMO50K',
            'type' => 'fixed',
            'value' => 50000,
            'min_booking_amount' => 100000,
            'is_active' => true,
        ]);

        $response = $this->post(route('booking.store'), [
            'customer_name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '08123456789',
            'booking_date' => now()->addDays(2)->format('Y-m-d'),
            'booking_time' => '10:00',
            'services' => [$service->id],
            'notes' => 'No notes',
            'voucher_code' => 'PROMO50K',
        ]);

        $response->assertRedirect(route('booking.success'));

        $this->assertDatabaseHas('bookings', [
            'customer_name' => 'John Doe',
            'voucher_code' => 'PROMO50K',
            'discount_amount' => 50000.00,
        ]);

        $booking = Booking::where('customer_name', 'John Doe')->first();
        $this->assertEquals(150000.00, $booking->original_price);
        $this->assertEquals(100000.00, $booking->total_price);

        // Verify voucher usage count incremented
        $this->assertEquals(1, $voucher->fresh()->usage_count);
    }
}
