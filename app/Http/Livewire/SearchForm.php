<?php

namespace App\Http\Livewire;
use App\Models\PublishProperty;
use App\Models\PropertyImage;
use Livewire\Component;
use App\Models\Transaction;
use App\Models\Property;
use App\Models\City;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchForm extends Component
{
    public $transactionTypes;
    public $propertyTypes;
    public $city;

    public $transactions;
    public $properties;

    public $propertyTypesRender;
    public $transactionRender;
    
    public $searchTerm;


    
     public function mount()
    {
        $this->transactions = Transaction::all();
        $this->properties = Property::all();
        
    }



   public function render()
{
    return view('livewire.search-form');
}

  public function filters(Request $request)
    {
         $this->propertyTypesRender = Property::all();  
             $this->transactionRender = Transaction::all(); 

        $this->transactionTypes = $request->input('transactionTypes');
        $this->propertyTypes = $request->input('propertyTypes');
        $this->city = $request->input('city');



$searchTerm = $this->city; // Agregar esta línea

/////// START IFRAME //////////////////

// Obtener la ciudad desde el formulario o cualquier otra fuente de datos
$city = $searchTerm;

// Realizar una solicitud HTTP a la API de geocodificación de Google Maps
$response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
    'address' => $city,
    'key' => env('GOOGLE_MAP_KEY'),
]);

// Verificar si la solicitud fue exitosa y obtener las coordenadas

if ($response->successful()) {
    $data = $response->json();
    
    if ($data['status'] === 'OK') {
        $location = $data['results'][0]['geometry']['location'];
        $latitude = $location['lat'];
        $longitude = $location['lng'];
       
        // Construir la URL del mapa de Google Maps con las coordenadas
        $mapSrc = "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12080.73732861526!2d{$longitude}!3d{$latitude}!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zM40zMDA2JzEwLjAiTiA3NMKwMjUnMzcuNyJX!5e0!3m2!1sen!2sus!4v1648482801994!5m2!1sen!2sus";

        // Luego, puedes utilizar la variable $mapSrc en tu vista para mostrar el mapa en el <iframe>
    }else {
        // Si la solicitud no fue exitosa o no se pudo obtener la URL del mapa, establecer $mapSrc como "no existe"
        $mapSrc = "";
    }
}

/////// END START IFRAME //////////////////

$collections = PublishProperty::join('users', 'publish_properties.user_id', '=', 'users.id')
    ->join('estatus_ads', 'publish_properties.status', '=', 'estatus_ads.id')
    ->join('purchased_plans', 'purchased_plans.publish_code', '=', 'publish_properties.publish_code')
    ->join('plans', 'plans.id', '=', 'purchased_plans.plan_id')
    ->join('transactions', 'publish_properties.transaction_type', '=', 'transactions.id')
     ->join('properties', 'publish_properties.property_type', '=', 'properties.id')
    ->join('property_images', 'property_images.property_id', '=', 'publish_properties.id')
    ->select('publish_properties.*', 'users.name', 'users.lastname', 'users.profile_photo_path','users.phone',
        'estatus_ads.estatus_description', 'properties.property_description','transactions.transaction_description',
        DB::raw('MIN(property_images.image_path) AS image_path'))
    ->where('estatus_ads.estatus_description', '=', 'Activo')
    ->where('publish_properties.city', '=', $searchTerm)
    ->where('publish_properties.property_type', '=', $this->propertyTypes)
       ->where('publish_properties.transaction_type', '=', $this->transactionTypes)
    ->orderByRaw("CASE WHEN plans.plan = 'Platino' THEN 0 WHEN plans.plan = 'Oro' THEN 1 ELSE 2 END") // Ordena Platino primero, Oro segundo y Free último
    ->orderBy('publish_properties.created_at', 'desc')
    ->groupBy('publish_properties.id')
    ->paginate(10);
foreach ($collections as $property) {
    $images = PropertyImage::join('publish_properties', 'property_images.property_id', '=', 'publish_properties.id')
        ->select('property_images.image_path')
        ->where('publish_properties.publish_code', '=', $property->publish_code)
        ->orderBy('property_images.order_display', 'asc')  
        ->get();

    // $images ahora contiene las imágenes asociadas a la propiedad actual en el bucle
}


  $resultCount = $collections->total();

        return view('livewire.search-filters', [
              'collections' => $collections,
            'transactionTypes' => $this->transactionTypes,
            'propertyTypes' => $this->propertyTypes,
            'searchTerm' => $this->city,
            'transactionRender' => $this->transactionRender,
        'propertyTypesRender' => $this->propertyTypesRender,
         'mapSrc' => $mapSrc, // Pasa la URL del mapa generada a la vista -> QUITAR ESTE NUMERO AL ACTIVAR API KEY GOOGLE MAP
         'resultCount' => $resultCount, // Agregar la variable de conteo a la vista
         'images' => $images,
        ]);
    }



// MAP VIEW GOOGLE MAP
  
  public function MapView(Request $request, $searchTerm)
{
    $this->propertyTypesRender = Property::all();
    $this->transactionRender = Transaction::all();

    $this->transactionTypes = $request->input('transactionTypes');
    $this->propertyTypes = $request->input('propertyTypes');
    $this->city = $request->input('city');

    // Obtener la ciudad desde el formulario o cualquier otra fuente de datos
    $city = $searchTerm;

    // Realizar una solicitud HTTP a la API de geocodificación de Google Maps
    $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
        'address' => $city,
        'key' => env('GOOGLE_MAP_KEY'),
    ]);

    // Verificar si la solicitud fue exitosa y obtener las coordenadas
    if ($response->successful()) {
        $data = $response->json();

        if ($data['status'] === 'OK') {
            $location = $data['results'][0]['geometry']['location'];
            $latitude = $location['lat'];
            $longitude = $location['lng'];

            // Construir la URL del mapa de Google Maps con las coordenadas
            $mapSrc = "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12080.73732861526!2d{$longitude}!3d{$latitude}!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zM40zMDA2JzEwLjAiTiA3NMKwMjUnMzcuNyJX!5e0!3m2!1sen!2sus!4v1648482801994!5m2!1sen!2sus";

            $collections = PublishProperty::join('users', 'publish_properties.user_id', '=', 'users.id')
                ->join('estatus_ads', 'publish_properties.status', '=', 'estatus_ads.id')
                ->join('transactions', 'publish_properties.transaction_type', '=', 'transactions.id')
                ->join('property_images', 'property_images.property_id', '=', 'publish_properties.id')
                 ->join('properties', 'publish_properties.property_type', '=', 'properties.id')
                ->select('publish_properties.*', 'users.name', 'users.lastname', 'users.profile_photo_path',
                    'estatus_ads.estatus_description', 'transactions.transaction_description',
                    DB::raw('MIN(property_images.image_path) AS image_path'))
                ->where('estatus_ads.estatus_description', '=', 'Activo')
                ->where('publish_properties.city', '=', $searchTerm)
                  ->where('transactions.id', '=',  $this->transactionTypes)
         ->where('publish_properties.property_type', '=',  $this->propertyTypes)
                ->orderBy('publish_properties.created_at', 'desc')
                ->groupBy('publish_properties.id')
                ->paginate(10);

            $resultCount = $collections->total();

            return view('livewire.map-view', [
                'collections' => $collections,
                'transactionTypes' => $this->transactionTypes,
                'propertyTypes' => $this->propertyTypes,
                'searchTerm' => $this->city,
                'transactionRender' => $this->transactionRender,
                'propertyTypesRender' => $this->propertyTypesRender,
                'mapSrc' => $mapSrc,
                'searchTerm' => $searchTerm, 
                 'latitude' => $latitude, 
                  'longitude' => $longitude, 
                'resultCount' => $resultCount, // Agregar la variable de conteo a la vista
                  
                
            ]);
        }
    }

    // Manejar el caso cuando la solicitud a la API de geocodificación de Google Maps no es exitosa
    // Puedes redireccionar a una página de error o mostrar un mensaje de error en la vista
    return redirect()->route('error');
}


// UPDATE FILTERS
public function searchFilterUpdate(Request $request)
{
      $this->propertyTypesRender = Property::all();  
             $this->transactionRender = Transaction::all(); 

    $selectedTransactionType = $request->input('selectedTransactionType');
   
    $selectedPropertyType = $request->input('selectedPropertyType');
     $city = $request->input('city');
    $garage = $request->input('garage');
    $bathrooms = $request->input('bathrooms');
    $bedrooms = $request->input('bedrooms');
    $minTotalArea = $request->input('minTotalArea');
    $maxTotalArea = $request->input('maxTotalArea');
    $minPrice = $request->input('minPrice');
    $maxPrice = $request->input('maxPrice');
    $searchTerm = $city;

     $this->transactionTypes = $request->input('selectedTransactionType');
    $this->propertyTypes = $request->input('selectedPropertyType');

// Realizar una solicitud HTTP a la API de geocodificación de Google Maps
$response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
    'address' => $city,
    'key' => env('GOOGLE_MAP_KEY'),
]);

// Verificar si la solicitud fue exitosa y obtener las coordenadas
if ($response->successful()) {
    $data = $response->json();
    
    if ($data['status'] === 'OK') {
        $location = $data['results'][0]['geometry']['location'];
        $latitude = $location['lat'];
        $longitude = $location['lng'];
       
        // Construir la URL del mapa de Google Maps con las coordenadas
        $mapSrc = "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12080.73732861526!2d{$longitude}!3d{$latitude}!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zM40zMDA2JzEwLjAiTiA3NMKwMjUnMzcuNyJX!5e0!3m2!1sen!2sus!4v1648482801994!5m2!1sen!2sus";

        // Luego, puedes utilizar la variable $mapSrc en tu vista para mostrar el mapa en el <iframe>
    }
}

    $collections = PublishProperty::join('users', 'publish_properties.user_id', '=', 'users.id')
        ->join('estatus_ads', 'publish_properties.status', '=', 'estatus_ads.id')
        ->join('transactions', 'publish_properties.transaction_type', '=', 'transactions.id')
        ->join('property_images', 'property_images.property_id', '=', 'publish_properties.id')
         ->join('properties', 'properties.id', '=', 'publish_properties.property_type')
        ->select('publish_properties.*', 'users.name', 'users.lastname', 'users.profile_photo_path',
            'estatus_ads.estatus_description', 'properties.property_description','transactions.transaction_description',
            DB::raw('MIN(property_images.image_path) AS image_path'))
        ->where('estatus_ads.estatus_description', '=', 'Activo')
        ->where('publish_properties.city', '=', $city)
        ->where('transactions.id', '=', $selectedTransactionType)
         ->where('publish_properties.property_type', '=', $selectedPropertyType)
         
       ->where(function ($query) use ($bedrooms, $bathrooms) {
    if ($bedrooms >= 5) {
        $query->where('publish_properties.bedrooms', '>=', 5);
    } elseif ($bedrooms !== null) {
        $query->where('publish_properties.bedrooms', $bedrooms);

        if ($bathrooms >= 5) {
            $query->where('publish_properties.bathrooms', '>=', 5);
        } elseif ($bathrooms !== null) {
            $query->where('publish_properties.bathrooms', $bathrooms);
        }
    }

    $query->orWhereNull('publish_properties.bedrooms');
    $query->orWhereNull('publish_properties.bathrooms');
})


 ->when($minPrice, function ($query, $minPrice) {
        return $query->where('publish_properties.price', '>=', $minPrice);
    })
    ->when($maxPrice, function ($query, $maxPrice) {
        return $query->where('publish_properties.price', '<=', $maxPrice);
    })
   
->when($minTotalArea, function ($query, $minTotalArea) {
    return $query->where('publish_properties.total_area', '>=', $minTotalArea)
        ->orWhereNull('publish_properties.total_area');
})
->when($maxTotalArea, function ($query, $maxTotalArea) {
    return $query->where('publish_properties.total_area', '<=', $maxTotalArea)
        ->orWhereNull('publish_properties.total_area');
})

         ->when($garage, function ($query, $garage) {
        return $query->where('publish_properties.garage', '=', $garage);
    })
        ->orderBy('publish_properties.created_at', 'desc')
        ->groupBy('publish_properties.id')
        ->paginate(10);

    $resultCount = $collections->total();

return response()->json([
    'cards' => view('livewire.result-cards', compact('collections'))->render(),
    'resultCount' => $resultCount,
    'searchTerm' => $searchTerm,
]);




    
}





    
}
