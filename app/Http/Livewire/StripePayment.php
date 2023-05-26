<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Exception;
use Stripe\StripeClient;
use Illuminate\Http\Request;
use Stripe\Exception\CardException;

class StripePayment extends Component
{
     public $paymentMethod;
    public $email;
     public $name;

    public function render()
    {
        return view('livewire.stripe-payment');
    }

    public function processPayment()
    {
        try {
            $stripe = new StripeClient(env('STRIPE_SECRET'));

            $stripe->paymentIntents->create([
                'amount' => 99 * 100,
                'currency' => 'usd',
                'payment_method' => $this->paymentMethod,
                'description' => 'Demo payment with stripe',
                'confirm' => true,
                'receipt_email' => $this->email
            ]);

            session()->flash('message', 'Pago realizado exitosamente');
        } catch (CardException $e) {
            throw new \Exception("There was a problem processing your payment");
        }
    }
}
