<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function checkout($publishCode)
    {
       return view('livewire.checkout', ['publishCode' => $publishCode]);
    }

    public function session(Request $request)
{
    \Stripe\Stripe::setApiKey(config('stripe.sk'));

    $publishCode = $request->publishCode; // Obtener el valor de la variable publishCode desde la solicitud

    $session = \Stripe\Checkout\Session::create([
        'line_items'  => [
            [
                'price_data' => [
                    'currency'     => 'gbp',
                    'product_data' => [
                        'name' => 'gimme money!!!!',
                    ],
                    'unit_amount'  => 500,
                ],
                'quantity'   => 1,
            ],
        ],
        'mode'        => 'payment',
        'success_url' => route('success'),
        'cancel_url'  => route('checkout', ['publishCode' => $publishCode]),
    ]);

    return redirect()->away($session->url);
}


    public function success()
    {
        return "Yay, It works!!!";
    }
}