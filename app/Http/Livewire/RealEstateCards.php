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
    ->join('transactions', 'publish_properties.transaction_type', '=', 'transactions.id')
    ->join('property_images', 'property_images.property_id', '=', 'publish_properties.id')
    ->select('publish_properties.*', 'users.name', 'users.lastname', 'users.profile_photo_path', 
        'estatus_ads.estatus_description', 'transactions.transaction_description',
        DB::raw('MIN(property_images.image_path) AS image_path'))
    ->where('estatus_ads.estatus_description', '=', 'Activo')
    ->orderBy('publish_properties.created_at', 'desc')
    ->groupBy('publish_properties.id')
    ->limit(10)
    ->get();




        return view('livewire.real-estate-cards', [
        'collections' => $collections,  //'images' => $images,
        
    ]);
    }
}