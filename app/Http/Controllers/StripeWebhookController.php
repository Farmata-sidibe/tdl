<?php
namespace App\Http\Controllers;

use App\Models\Liste;
use App\Models\Participant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Webhook;
use Log;

class StripeWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $endpoint_secret = 'your_stripe_endpoint_secret';

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];

        try {
            $event = Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch(\UnexpectedValueException $e) {
            return response()->json(['error' => 'Invalid payload'], 400);
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        // Handle the event
        if ($event->type == 'checkout.session.completed') {
            $session = $event->data->object;
            $listeId = $session->metadata->liste_id;
            $liste = Liste::find($listeId);
            $cagnotte = $liste->cagnotte;

            $cagnotte->update(['current_amount' => $cagnotte->current_amount + $session->amount_total / 100]);

            Participant::create([
                'name' => $session->customer_details->name,
                'email' => $session->customer_email,
                'amount' => $session->amount_total / 100,
                'cagnotte_id' => $cagnotte->id,
                'date_contribution' => Carbon::now(),
            ]);
        }

        return response()->json(['status' => 'success']);
    }
}

?>
