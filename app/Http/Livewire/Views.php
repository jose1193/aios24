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
use App\Policies\PublishPropertyPolicy;



class Views extends Component
{
  


   public $publishCode;


public function ShowViews($publishCode)
{
    $images = PropertyImage::join('publish_properties', 'property_images.property_id', '=', 'publish_properties.id')
    ->select('property_images.image_path')
    ->where('publish_properties.publish_code', '=', $publishCode)
    ->orderBy('property_images.order_display', 'asc')  
    ->get();


    $collections = PublishProperty::join('users', 'publish_properties.user_id', '=', 'users.id')
        ->join('estatus_ads', 'publish_properties.status', '=', 'estatus_ads.id')
        ->join('transactions', 'publish_properties.transaction_type', '=', 'transactions.id')
        ->select('publish_properties.*', 'users.name', 'users.lastname', 'users.phone','users.profile_photo_path',
            'estatus_ads.estatus_description', 'transactions.transaction_description')
        ->where('publish_properties.publish_code', '=', $publishCode)
        ->orderBy('publish_properties.created_at', 'desc')
        ->get();

    $features = Feature::join('publish_properties', 'features.publish_property_id', '=', 'publish_properties.id')
        ->where('publish_properties.publish_code', '=', $publishCode)
        ->select('features.feature_description')
        ->get();

    $equipments = Equipment::join('publish_properties', 'equipment.publish_property_id', '=', 'publish_properties.id')
        ->where('publish_properties.publish_code', '=', $publishCode)
        ->select('equipment.equipment_description')
        ->get();

    $this->publishCode = $publishCode;
   

    return view('livewire.views', [
        'publishCode' => $this->publishCode,
        'collections' => $collections,
        'images' => $images,
        'features' => $features,
        'equipments' => $equipments,
    ]);
}

}
