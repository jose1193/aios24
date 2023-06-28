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
    }
}

/////// END START IFRAME //////////////////

$collections = PublishProperty::join('users', 'publish_properties.user_id', '=', 'users.id')
    ->join('estatus_ads', 'publish_properties.status', '=', 'estatus_ads.id')
    ->join('purchased_plans', 'purchased_plans.publish_code', '=', 'publish_properties.publish_code')
    ->join('plans', 'plans.id', '=', 'purchased_plans.plan_id')
    ->join('transactions', 'publish_properties.transaction_type', '=', 'transactions.id')
    ->join('property_images', 'property_images.property_id', '=', 'publish_properties.id')
    ->select('publish_properties.*', 'users.name', 'users.lastname', 'users.profile_photo_path',
        'estatus_ads.estatus_description', 'transactions.transaction_description',
        DB::raw('MIN(property_images.image_path) AS image_path'))
    ->where('estatus_ads.estatus_description', '=', 'Activo')
    ->where('publish_properties.city', '=', $searchTerm)
    ->orderByRaw("CASE WHEN plans.plan = 'Platino' THEN 0 WHEN plans.plan = 'Oro' THEN 1 ELSE 2 END") // Ordena Platino primero, Oro segundo y Free último
    ->orderBy('publish_properties.created_at', 'desc')
    ->groupBy('publish_properties.id')
    ->paginate(10);





  $resultCount = $collections->total();

        return view('livewire.search-filters', [
              'collections' => $collections,
            'transactionTypes' => $this->transactionTypes,
            'propertyTypes' => $this->propertyTypes,
            'searchTerm' => $this->city,
            'transactionRender' => $this->transactionRender,
        'propertyTypesRender' => $this->propertyTypesRender,
         'mapSrc' => $mapSrc, // Pasa la URL del mapa generada a la vista
         'resultCount' => $resultCount, // Agregar la variable de conteo a la vista
        ]);
    }


    // FILTERS UPDATES
    public $selectedTransactionType;

   public function updatedSelectedTransactionType()
{
    $this->propertyTypesRender = Property::all();
    $this->transactionRender = Transaction::all();

    $collections = PublishProperty::join('users', 'publish_properties.user_id', '=', 'users.id')
        ->join('estatus_ads', 'publish_properties.status', '=', 'estatus_ads.id')
        ->join('transactions', 'publish_properties.transaction_type', '=', 'transactions.id')
        ->join('property_images', 'property_images.property_id', '=', 'publish_properties.id')
        ->select('publish_properties.*', 'users.name', 'users.lastname', 'users.profile_photo_path',
            'estatus_ads.estatus_description', 'transactions.transaction_description',
            DB::raw('MIN(property_images.image_path) AS image_path'))
        ->where('estatus_ads.estatus_description', '=', 'Activo')
        ->where('publish_properties.city', '=', $this->city)
        ->where('transactions.id', '=', $this->selectedTransactionType)
        ->orderBy('publish_properties.created_at', 'desc')
        ->groupBy('publish_properties.id')
        ->paginate(10);

    return view('livewire.search-filters', [
        'collections' => $collections,
        'transactionRender' => $this->transactionRender,
        'propertyTypesRender' => $this->propertyTypesRender,
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
                ->select('publish_properties.*', 'users.name', 'users.lastname', 'users.profile_photo_path',
                    'estatus_ads.estatus_description', 'transactions.transaction_description',
                    DB::raw('MIN(property_images.image_path) AS image_path'))
                ->where('estatus_ads.estatus_description', '=', 'Activo')
                ->where('publish_properties.city', '=', $searchTerm)
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

    
}
