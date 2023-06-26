<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\PublishProperty;

class StripePayment extends Component
{
    
public $plans,$property_id;
    public $publishCode,$position,$duration,$quantityPlans;
    
    // RECIBIR PARAMETRO E IMPRIMIR EN EL RENDER EN VISTA .BLADE
    public function mount($publishCode)
{
     
    $this->publishCode = $publishCode;
}

   public function render()
{
    $this->plans = Plan::all();
    $this->property_id = PublishProperty::where('publish_code', $this->publishCode)->first();

    return view('livewire.choose-plan', [
        'publishCode' => $this->publishCode,'plans' => $this->plans,'property_id' => $this->property_id
    ]);
}
 // RECIBIR PARAMETRO E IMPRIMIR EN EL RENDER EN VISTA .BLADE

 
     public function session(Request $request)
{
    \Stripe\Stripe::setApiKey(config('stripe.sk'));

    $publishCode = $request->publishCode; // Obtener el valor de la variable publishCode desde la solicitud


    $session = \Stripe\Checkout\Session::create([
        'line_items'  => [
            [
                'price_data' => [
                    'currency'     => 'eur',
                    'product_data' => [
                        'name' => 'Plan '.$request->planName,
                        
                         'description' => $request->position.'.  '.$request->duration,
                         'images' => ['https://www.aiosrealestate.com/img/logo2.png'],
                         
                    ],
                    'unit_amount'  => $request->pricing * 100, // Multiplicar $pricing por 100 para convertirlo a centavos o céntimos (Stripe utiliza el valor en la moneda más baja, por ejemplo, centavos para euros)
                ],
                'quantity'   => 1,
            ],
        ],
        'mode'        => 'payment',
        'success_url' => route('success'),
         'cancel_url'  => route('choose-plan', ['publishCode' => $publishCode]),
         
    ]);

    return redirect()->away($session->url);
}


    public function success()
    {
        return "Yay, It works!!!";
    }
}
