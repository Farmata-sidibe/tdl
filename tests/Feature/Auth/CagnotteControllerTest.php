<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Liste;
use App\Models\Cagnotte;
use App\Models\Participant;
use App\Services\PayPalService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContributionNotification;
use Illuminate\Support\Facades\Auth;

class CagnotteControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $paypalService;
    protected $user;
    protected $liste;
    protected $cagnotte;

    public function setUp(): void
    {
        parent::setUp();

        // Mock PayPal Service
        $this->paypalService = $this->createMock(PayPalService::class);
        $this->app->instance(PayPalService::class, $this->paypalService);

        // Create test data
        $this->user = User::factory()->create([
            'paypal_email' => 'test@paypal.com'
        ]);

        $this->liste = Liste::factory()->create([
            'user_id' => $this->user->id,
            'uuid' => $this->faker->uuid
        ]);

        $this->cagnotte = Cagnotte::factory()->create([
            'liste_id' => $this->liste->id,
            'current_amount' => 0,
            'total_amount' => 1000
        ]);
    }

    public function test_index_displays_cagnotte_view()
    {
        Auth::login($this->user);

        $response = $this->get(route('cagnotte.cagnotte'));

        $response->assertStatus(200);
        $response->assertViewIs('cagnotte.cagnotte');
        $response->assertViewHas(['liste', 'cagnotte', 'user']);
    }

    public function test_show_by_slug_displays_correct_data()
    {
        $response = $this->get(route('liste.showBySlug', ['uuid' => $this->liste->uuid]));

        $response->assertStatus(200);
        $response->assertViewIs('liste.showBySlug');
        $response->assertViewHas(['liste', 'current_amount', 'total', 'percentage', 'historique']);
    }


    public function test_payment_success_updates_participant_and_cagnotte()
    {
        // Notification::fake();

        $participant = Participant::factory()->create([
            'cagnotte_id' => $this->cagnotte->id,
            'amount' => 98,
            'status' => 'pending'
        ]);

        // Mock PayPal payment execution
        $this->paypalService
            ->expects($this->once())

           ->method('executePayment')
            ->willReturn(true);

        $response = $this->get(route('payment.success', [
            'participantId' => $participant->id,
            'paymentId' => 'MOCK_PAYMENT_ID',
            'PayerID' => 'MOCK_PAYER_ID'
        ]));

        // Assert participant was updated
        $this->assertDatabaseHas('participants', [
            'id' => $participant->id,
            'status' => 'paid'
        ]);

        // Assert cagnotte amount was updated
        $this->assertDatabaseHas('cagnottes', [
            'id' => $this->cagnotte->id,
            'current_amount' => 98
        ]);

        // Assert notification was sent
        // Notification::assertSentTo(
        //     [$this->user],
        //     ContributionNotification::class
        // );

        $response->assertRedirect(route('liste.showBySlug', ['uuid' => $this->liste->uuid]));
    }

    public function test_payment_success_handles_admin_commission()
    {
        $participant = Participant::factory()->create([
            'cagnotte_id' => $this->cagnotte->id,
            'amount' => 98,
            'commission' => 2,
            'status' => 'pending'
        ]);

        // Mock PayPal payment execution
        $this->paypalService
            ->expects($this->once())
            ->method('executePayment')
            ->willReturn(true);

        $response = $this->get(route('payment.success', [
            'participantId' => $participant->id,
            'paymentId' => 'MOCK_PAYMENT_ID',
            'PayerID' => 'MOCK_PAYER_ID',
            'commission' => 'admin'
        ]));

        // Assert participant status wasn't changed for commission payment
        $this->assertDatabaseHas('participants', [
            'id' => $participant->id,
            'status' => 'pending'
        ]);

        $response->assertRedirect(route('liste.showBySlug', ['uuid' => $this->liste->uuid]));
    }

    public function test_payment_cancel_redirects_properly()
    {
        $participant = Participant::factory()->create([
            'cagnotte_id' => $this->cagnotte->id,
            'status' => 'pending'
        ]);

        $response = $this->get(route('payment.cancel', ['participantId' => $participant->id]));

        $response->assertRedirect(route('liste.showBySlug', ['uuid' => $this->liste->uuid]));
    }

    public function test_store_validates_required_fields()
    {
        $response = $this->post(route('liste.contribute', ['uuid' => $this->liste->uuid]), []);

        $response->assertSessionHasErrors(['cagnotte_id', 'name', 'email', 'amount', 'commission']);
    }

    public function test_store_validates_minimum_amount()
    {
        $response = $this->post(route('liste.contribute', ['uuid' => $this->liste->uuid]), [
            'cagnotte_id' => $this->cagnotte->id,
            'name' => 'Test Contributor',
            'email' => 'contributor@test.com',
            'amount' => 0,
            'commission' => 2
        ]);

        $response->assertSessionHasErrors('amount');
    }
}
