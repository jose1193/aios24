<?php

namespace App\Http\Livewire;
use App\Models\PublishProperty;
use App\Models\PropertyImage;
use App\Models\Feature;
use App\Models\Equipment;
use App\Models\Transactions;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class RealEstateCards extends Component
{

    

    public function render()
    {
 $collections = PublishProperty::join('users', 'publish_properties.user_id', '=', 'users.id')
    ->join('estatus_ads', 'publish_properties.status', '=', 'estatus_ads.id')
     ->join('premium_plans as pp1', 'pp1.user_id', '=', 'users.id') // Alias pp1 para la primera instancia de premium_plans
        ->join('plans', 'plans.id', '=', 'pp1.plan_id') // Unión con la tabla de planes
     ->join('transactions', 'publish_properties.transaction_type', '=', 'transactions.id')
    ->select('publish_properties.*', 'users.name', 'users.lastname', 'users.profile_photo_path', 
        'estatus_ads.estatus_description', 'transactions.transaction_description')
    ->where('estatus_ads.estatus_description', '=', 'Activo')
      ->where('pp1.estatus_premium', '=', 'Activo') // Usar el alias pp1
    ->orderBy('publish_properties.created_at', 'desc')
    ->groupBy('publish_properties.id')
    ->limit(10)
    ->get();

    // Obtener las imágenes para cada propiedad
    foreach ($collections as $collection) {
    $images = PropertyImage::where('property_id', $collection->id)
        ->orderBy('order_display', 'asc')
        ->get();
    $collection->image_path = $images;
}

    return view('livewire.real-estate-cards', [
    'collections' => $collections,
        ]);

    }
}