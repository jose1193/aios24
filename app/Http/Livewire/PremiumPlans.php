<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\PublishProperty;
use App\Models\PropertyImage;
use App\Models\PremiumPlan;
use App\Models\Feature;
use App\Models\Equipment;
use App\Models\Bucket;
use App\Models\AdminEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class PremiumPlans extends Component
{
     public $plans, $premium_plans_count;
public $bucket,$email,$name,$message2,$planName;
 public $search = '';
  use WithPagination;

   public function render()
{
    $this->premium_plans_count = PremiumPlan::where('user_id', auth()->id())->count();
    $this->plans = Plan::all();
    $oroPrice = $this->plans->where('plan', 'Oro')->first()->pricing; // Obtener el precio de Oro
    $platinoPrice = $this->plans->where('plan', 'Platino')->first()->pricing; // Obtener el precio de Platino

    $activePlan = Plan::join('premium_plans', 'plans.id', '=', 'premium_plans.plan_id')
        ->where('premium_plans.user_id', auth()->id())
        ->select('plans.id')
        ->first();

    $this->activePlanId = $activePlan ? $activePlan->id : null;

    return view('livewire.premium-plans', [
        'oroPrice' => $oroPrice,
        'platinoPrice' => $platinoPrice,
        'plans' => $this->plans,
        'premium_plans_count' => $this->premium_plans_count
    ]);
}


public function storePlan(Request $request)
{
    // Validaciones
    $request->validate([
        'plan_id' => 'required|exists:plans,id',
    ]);

    $planId = $request->input('plan_id');
    $user = auth()->user();

    // Verificar si el usuario ya tiene un plan
    $existingPlan = PremiumPlan::where('user_id', $user->id)->first();

// CARBON FORMAT DATE
         $date = Carbon::now()->locale('es_ES')->format('F d, Y');
            // END CARBON FORMAT DATE

    if ($existingPlan) {
        // Si ya tiene un plan y el nuevo plan es Free, actualiza el plan existente
        if ($planId == '1') { 

            $lastInvoice = PremiumPlan::max('nro_invoices');
            $nextInvoiceNumber = $lastInvoice + 1;

            $existingPlan->update([
                'plan_id' => $planId,
                'purchase_date' => $date,
                'expiration_date' => 'Indefinido', // Actualiza la expiración si es necesario
                'estatus_premium' => 'Activo', 
                'nro_invoices' => $nextInvoiceNumber,
            ]);

    //SEND EMAIL FORM CONTACT
      
try {
        $planName = Plan::find($planId);
        $this->bucket = Bucket::orderBy('description', 'desc')->limit(1)->first();
        $user = User::find(auth()->user()->id);
        $this->email = $user->email;
        $this->name = $user->name;
    $this->planName= $planName->plan;
\Mail::send('emails.NewPremiumPlanProperty', array(
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
    $message->to($this->email)->subject('Registro de Plan Free Aios Real Estate');
});

return response()->json(['message' => 'Email enviado con éxito']);
} catch (\Exception $e) {
    return response()->json(['error' => 'Error al enviar el email: ' . $e->getMessage()]);
}
// END SEND EMAIL FORM CONTACT

            return response()->json(['message' => 'Plan actualizado con éxito']);
        }
    } else {
        // Si no tiene un plan previo y el nuevo plan es Free, registra un nuevo plan
        if ($planId == '1') {
        $expirationDate = Carbon::now()->addMonths(6)->locale('es_ES')->format('F d, Y');
        $lastInvoice = PremiumPlan::max('nro_invoices');
            $nextInvoiceNumber = $lastInvoice + 1;

            PremiumPlan::create([
                'user_id' => $user->id,
                'plan_id' => $planId,
                'purchase_date' => $date,
                'expiration_date' => 'Indefinido',
                 'estatus_premium' => 'Activo',
                 'nro_invoices' => $nextInvoiceNumber, 
            ]);

            

    //SEND EMAIL FORM CONTACT
      
try {
        $planName = Plan::find($planId);
        $this->bucket = Bucket::orderBy('description', 'desc')->limit(1)->first();
        $user = User::find(auth()->user()->id);
        $this->email = $user->email;
        $this->name = $user->name;
    $this->planName= $planName->plan;
\Mail::send('emails.NewPremiumPlanProperty', array(
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
    $message->to($this->email)->subject('Registro de Plan Free Aios Real Estate');
});

return response()->json(['message' => 'Email enviado con éxito']);
} catch (\Exception $e) {
    return response()->json(['error' => 'Error al enviar el email: ' . $e->getMessage()]);
}
// END SEND EMAIL FORM CONTACT
            return response()->json(['message' => 'Plan registrado con éxito']);
        }
    }

    

    return response()->json(['message' => 'Plan registrado con éxito']);
}



public function Myplans()
    {
      $myplans = PremiumPlan::join('plans', 'plans.id', '=', 'premium_plans.plan_id')
   
    ->where('premium_plans.user_id', auth()->id())
    ->where('plans.plan', 'like', '%'.$this->search.'%')
      ->select('plans.*','premium_plans.purchase_date','premium_plans.expiration_date','premium_plans.nro_invoices','premium_plans.estatus_premium')
    ->orderBy('premium_plans.id', 'desc')
    ->paginate(10);




        return view('livewire.my-plans', [
        'myplans' => $myplans]);
    }

    


public function renewPremium($planId)
{
    $this->premium_plans_count = PremiumPlan::where('user_id', auth()->id())->count();
    
  $planPrice = Plan::where('id', $planId)->value('pricing'); // Obtén el precio del plan según su planId


    // Obtener el plan activo del usuario
    $activePlan = Plan::join('premium_plans', 'plans.id', '=', 'premium_plans.plan_id')
        ->where('premium_plans.user_id', auth()->id())
        ->where('premium_plans.plan_id', $planId) // Filtrar por el planId proporcionado
        ->select('plans.*')
        ->first();

    return view('livewire.renew-premium', [
        'planPrice' => $planPrice,
       
        'plans' => $activePlan, // Pasar el plan activo a la vista
        'premium_plans_count' => $this->premium_plans_count
    ]);
}


public function deletePlans(Request $request)
    {
        $dataId = $request->input('planId');

      
  try {
    // Obtener el plan activo del usuario
    $activePlan = PremiumPlan::where('user_id', auth()->id())
        ->where('plan_id', $dataId)
        ->first();

   if ($activePlan) {
      
       $activePlan->delete();

$properties = PublishProperty::where('user_id', auth()->id())->get();

foreach ($properties as $property) {
    $equipments = Equipment::where('publish_property_id', $property->id)->get();
    $features = Feature::where('publish_property_id', $property->id)->get();

    foreach ($equipments as $equipment) {
        $equipment->delete();
    }

    foreach ($features as $feature) {
        $feature->delete();
    }


    // Luego, eliminar los archivos de las imágenes en el almacenamiento
    $images = PropertyImage::where('property_id', $property->id)->get();
    foreach ($images as $image) {
          $image->delete();
        Storage::disk('public')->delete($image->image_path);
      
    }

    // Eliminar el objeto PublishProperty
    $property->delete();

          
        }
    //SEND EMAIL FORM CONTACT
      
try {
        $planName = Plan::find($dataId);
        $this->bucket = Bucket::orderBy('description', 'desc')->limit(1)->first();
        $user = User::find(auth()->user()->id);
        $this->email = $user->email;
        $this->name = $user->name;
    $this->planName= $planName->plan;
\Mail::send('emails.DeletePremiumPlanUser', array(
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
    $message->to($this->email)->subject('Cancelación de Plan Aios Real Estate');
});

return response()->json(['message' => 'Email enviado con éxito']);

} catch (\Exception $e) {
    return response()->json(['error' => 'Error al enviar el email: ' . $e->getMessage()]);
}
// END SEND EMAIL FORM CONTACT
        return response()->json(['success' => true, 'message' => 'Plan cancelado y propiedades eliminadas exitosamente']);
    } else {
        return response()->json(['success' => false, 'message' => 'No se encontró el plan activo']);
    }
} catch (\Exception $e) {
    return response()->json(['success' => false, 'message' => 'Error al procesar la cancelación: ' . $e->getMessage()]);
}

    }


}
