<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\PublishProperty;
use App\Models\PremiumPlan;
use App\Models\Bucket;
use App\Models\AdminEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class StripePayment extends Component
{
    
public $plans,$property_id;
    public $publishCode,$position,$duration,$quantityPlans;
     public $premium_plans_count;
public $bucket,$email,$name,$message2,$planName;

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

 $planId = $request->input('plan_id'); // Supongamos que obtienes $planId aquí
    $session = \Stripe\Checkout\Session::create([
        'line_items'  => [
            [
                'price_data' => [
                    'currency'     => 'eur',
                    'product_data' => [
                        'name' => 'Plan '.$request->planName. ' / '.$request->billingType,
                        
                         'description' => $request->position.'.  Cant. Publicaciones '.$request->number_publications,
                         'images' => ['https://www.aiosrealestate.com/img/logo2.png'],
                         
                    ],
                    'unit_amount'  => $request->pricing * 100, // Multiplicar $pricing por 100 para convertirlo a centavos o céntimos (Stripe utiliza el valor en la moneda más baja, por ejemplo, centavos para euros)
                ],
                'quantity'   => 1,
            ],
        ],
        'mode'        => 'payment',
        'success_url' => route('success'),
         'cancel_url'  => route('select-plan'),
         
    ]);

    return redirect()->away($session->url);
}

public function success(Request $request)
    {
        // Obtener información relevante del formulario
   $planId = $request->input('plan_id'); // Supongamos que obtienes $planId aquí

       // Obtener información relevante del formulario
    $planName=$request->planName;
    $position=$request->position;

    $pricing = $request->pricing;
    
    $billingType=$request->billingType;
    // Calcular la fecha de vencimiento basada en el tipo de facturación
    if ($billingType == 'mes') {
    // Si el tipo de facturación es "mes", agrega 1 mes a la fecha actual
     $expirationDate = Carbon::now()->addMonth()->locale('es_ES')->format('F d, Y');
    } elseif ($billingType == 'semestral') {
    // Si el tipo de facturación es "semestral", agrega 6 meses a la fecha actual
     $expirationDate = Carbon::now()->addMonths(6)->locale('es_ES')->format('F d, Y');
    } elseif ($billingType == 'anual') {
    // Si el tipo de facturación es "anual", agrega 1 año a la fecha actual
    $expirationDate = Carbon::now()->addYear()->locale('es_ES')->format('F d, Y');
    } else {
    // Para cualquier otro caso (como "Free"), define la fecha de vencimiento como "Indefinido"
    $expirationDate = 'Indefinido';
        }

    
    // Obtener al usuario autenticado
    $user = auth()->user();

    // Verificar si el usuario ya tiene un plan existente
$existingPlan = PremiumPlan::where('user_id', $user->id)->first();

if ($existingPlan) {
    // Verificar si está actualizando a "Oro", "Platino" o "Free"
    if ($planId == '2' || $planId == '3' || $planId == '1') {
        $date = Carbon::now()->locale('es_ES')->format('F d, Y');

        $existingPlan->update([
            'plan_id' => $planId,
            'purchase_date' => $date,
            'expiration_date' => $expirationDate, // Usar la fecha calculada
            'estatus_premium' => 'Activo', 
        ]);

// Dentro de updateAndSendEmail
$this->sendEmailAndReturnResponse($planId, 'Actualizacion de Plan Aios Real Estate');
    

    }
} else {
    // Si no tiene un plan existente, registra uno nuevo
    PremiumPlan::create([
        'user_id' => $user->id,
        'plan_id' => $planId,
        'purchase_date' => $date,
        'expiration_date' => $expirationDate, // Usar la fecha calculada
        'estatus_premium' => 'Activo', 
    ]);

    // Dentro de createAndSendEmail
$this->sendEmailAndReturnResponse($planId, 'Registro de Plan Premium Aios Real Estate');
    
}


    
    return view('nombre_de_tu_vista');
    }


     public function Renewsession(Request $request)
{
    \Stripe\Stripe::setApiKey(config('stripe.sk'));

 $planId = $request->input('plan_id'); // Supongamos que obtienes $planId aquí
    $session = \Stripe\Checkout\Session::create([
        'line_items'  => [
            [
                'price_data' => [
                    'currency'     => 'eur',
                    'product_data' => [
                        'name' => 'Plan '.$request->planName. ' / '.$request->billingType,
                        
                         'description' => $request->position.'.  Cant.holaa Publicaciones '.$request->number_publications,
                         'images' => ['https://www.aiosrealestate.com/img/logo2.png'],
                         
                    ],
                    'unit_amount'  => $request->pricing * 100, // Multiplicar $pricing por 100 para convertirlo a centavos o céntimos (Stripe utiliza el valor en la moneda más baja, por ejemplo, centavos para euros)
                ],
                'quantity'   => 1,
            ],
        ],
        'mode'        => 'payment',
        'success_url' => route('success'),
         'cancel_url'  => route('renew-premium', ['planId' => $planId]),
         
    ]);

    return redirect()->away($session->url);
}


    public function success2()
    {
        return "Yay, It works!!!";
    }


    public function sendEmailAndReturnResponse($planId, $subject) {
    try {
        $planName = Plan::find($planId);
        $this->bucket = Bucket::orderBy('description', 'desc')->limit(1)->first();
        $user = User::find(auth()->user()->id);
        $this->email = $user->email;
        $this->name = $user->name;
        $this->planName = $planName->plan;

        \Mail::send('emails.NewPremiumPlanProperty', array(
            'planName' => $this->planName,
            'name' => $this->name,
            'email' => $this->email,
            'bucket' => $this->bucket->description,
            'city' => $this->bucket->city,
            'community' => $this->bucket->community,
            'country' => $this->bucket->country,
            'address' => $this->bucket->address,
        ), function ($message) {
            $emailAdmin = AdminEmail::orderBy('email', 'desc')->limit(1)->pluck('email')->first();

            $message->from($emailAdmin, 'Aios Real Estate');
            $message->to($this->email)->subject($subject);
        });

        return response()->json(['message' => 'Email enviado con éxito']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al enviar el email: ' . $e->getMessage()]);
    }
}



public function checkRenewalDateAndSendNotification() {
$users = User::all();

foreach ($users as $user) {
    $existingPlans = PremiumPlan::join('plans', 'premium_plans.plan_id', '=', 'plans.id')
        ->where('premium_plans.user_id', $user->id)
        ->whereIn('plans.id', [2, 3])
        ->get();

    foreach ($existingPlans as $existingPlan) {
        $expirationDate = Carbon::parse($existingPlan->expiration_date);
        $daysBeforeRenewal = 5;

        $dateToNotify = $expirationDate->subDays($daysBeforeRenewal);

        if (Carbon::now()->isSameDay($dateToNotify)) {
            //  enviar el correo de notificación
           //SEND EMAIL FORM CONTACT
      
try {
       
        $this->bucket = Bucket::orderBy('description', 'desc')->limit(1)->first();
        $user = User::find($existingPlan->user_id);
        $this->email = $user->email;
        $this->name = $user->name;
    $this->planName = $existingPlan->plan;
\Mail::send('emails.NewNotificationPremiumPlanProperty', array(
    'planName' => $this->planName,
    'name' => $this->name,
    'email' => $this->email,
    'bucket' => $this->bucket->description,
    'city' => $this->bucket->city,
     'community' => $this->bucket->community,
      'country' => $this->bucket->country,
      'address' => $this->bucket->address,
), function($message) {
    $emailAdmin = AdminEmail::orderBy('email', 'desc')->limit(1)->pluck('email')->first();

    $message->from($emailAdmin,'Aios Real Estate');
    $message->to($this->email)->subject('Notificación de Cobro Aios Real Estate');
});

return response()->json(['message' => 'Email enviado con éxito']);
} catch (\Exception $e) {
    return response()->json(['error' => 'Error al enviar el email: ' . $e->getMessage()]);
}
// END SEND EMAIL FORM CONTACT
        }
    }
}


}

    
}
