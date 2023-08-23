<?php

namespace App\Http\Livewire;

use App\Models\PublishProperty;
use App\Models\PropertyImage;
use App\Models\Property;
use App\Models\Transaction;
use App\Models\EstatusAds;
use App\Models\User;
use App\Models\Bucket;
use App\Models\AdminEmail;
use App\Models\Feature;
use App\Models\Equipment;
use App\Models\PurchasedPlan;
use App\Models\Plan;
use App\Models\PremiumPlan;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;



class PublishProperties extends Component
{
 use WithFileUploads; 
 use WithPagination;
public $currentStep = 1;
public  $statuswizard = 1;
public $title;
public $property_type;
public $location;
public $city;
public $latitudeArea;
public $longitudeArea;
public $description;
public $price;
public $transaction_type;
public $bedrooms;
public $bathrooms;
public $total_area;
public $additional_features;
public $images;
public $publication_date;
public $status;
public $user_id;
public $propertyTypesRender;
public $transactionRender;
public $estatusAdsRender;
public $energy_certificate;
public $garage;

public $bucket,$email,$name,$message2;
public $publishProperty;
public $plan;

public $planName = ''; // Definir con valor predeterminado vacío

public $activePlanId;

public function mount(PublishProperty $publishProperty)
{
    $this->publishProperty = $publishProperty;
}

public function render()
{
    
    
   
    $this->propertyTypesRender = Property::all();
 $this->transactionRender = Transaction::all();
 $this->estatusAdsRender = EstatusAds::all();

$premium_plans_count = PremiumPlan::where('user_id', auth()->id())->count();

$registeredAds = PublishProperty::where('user_id', auth()->id())->count();

$plan = Plan::join('premium_plans', 'plans.id', '=', 'premium_plans.plan_id')
    ->where('premium_plans.user_id', auth()->id())
    ->select('plans.plan','plans.number_publications')
    ->first();

if ($plan) {
    // Verificar si el plan es ilimitado
    if ($plan->number_publications === 'Ilimitadas') {
        $remainingAds = 'Ilimitadas';
    } else {
        // Calcular la cantidad de anuncios disponibles
        $remainingAds = intval($plan->number_publications) - intval($registeredAds);
        // Asegurarse de que no haya menos de cero anuncios disponibles
        $remainingAds = max(0, $remainingAds);
    }

    $this->planName = $plan->plan;
    $this->remainingAds = $remainingAds;
   
}
 

if ($premium_plans_count > 0) {
      $publishCode = 'AR-' . str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);
       $premiumPlan = PremiumPlan::join('plans', 'plans.id', '=', 'premium_plans.plan_id')
    ->where('premium_plans.user_id', auth()->user()->id)
    ->select('plans.plan', 'plans.images_quantity')
    ->first();


    // Verificar si el plan permite acumular imágenes
    $planDescription = $premiumPlan->plan;
    $maxImages = $premiumPlan->images_quantity;

   
    return view('livewire.publish-properties', [
        'propertyTypes' => $this->propertyTypesRender,
        'estatusAdsRender' => $this->estatusAdsRender,
        'planName' => $this->planName,
        'remainingAds' => $this->remainingAds,
         'publishCode' => $publishCode,
          'maxImages' => $maxImages,
    ]);
} else {
    
     $this->plans = Plan::all();
      $activePlan = Plan::join('premium_plans', 'plans.id', '=', 'premium_plans.plan_id')
        ->where('premium_plans.user_id', auth()->id())
        ->select('plans.id')
        ->first();

    $this->activePlanId = $activePlan ? $activePlan->id : null;
$oroPrice = $this->plans->where('plan', 'Oro')->first()->pricing; // Obtener el precio de Oro
$platinoPrice = $this->plans->where('plan', 'Platino')->first()->pricing; // Obtener el precio de Platino

return view('livewire.premium-plans', [
    'oroPrice' => $oroPrice,
    'platinoPrice' => $platinoPrice,
    'plans' => $this->plans, // Aquí corregir la asignación
    'premium_plans_count' => $premium_plans_count,
    'activePlanId' => $this->activePlanId
   
]);

}


}

    // --- FUNCTION CLEAN LIVEWIRE-TMP --- ///
public function CleanUp()  
    {
   
      $oldfiles= Storage::disk('local');
      foreach ($oldfiles->allFiles('livewire-tmp') as $file)
      {
        $yest=now()->timestamp;
       
        if ($yest > $oldfiles->lastModified($file)) {

            $oldfiles->delete($file);
        }
         
         
      }
  
  }

   //----- FUNCTION CHECK TITLE REGISTER USER ----//
public function checkTitle(Request $request)
{
    $validatedData = $request->validate([
        'title' => [
            'required',
            Rule::unique(PublishProperty::class),
        ],
    ]);

    return response()->json(['message' => 'Title is available'], 200);
}

  //----- FUNCTION CHECK TITLE UPDATE USER ----//
public function checkTitleUpdate(Request $request)
{
    $user = Auth::user(); // Obtén al usuario autenticado

    $validatedData = $request->validate([
        'title' => [
            'required',
            Rule::unique('publish_properties')->where(function ($query) use ($user) {
                return $query->where('user_id', '<>', $user->id);
            }),
        ],
    ]);

    return response()->json(['message' => 'Title is available'], 200);
}
public function deleteFile(Request $request)
{
    $publishCode = $request->input('publishCode');
    $orderDisplay = $request->input('orderDisplay');
    
    // Construye el nombre del archivo basado en publishCode y orderDisplay
    $fileName = $publishCode . '-' . $orderDisplay . '.jpg'; // Cambia la extensión si es diferente
    
    $filePath = public_path('storage/app/public/images-tmp/' . $fileName); // Ruta completa del archivo

    if (file_exists($filePath)) {
        unlink($filePath); // Elimina el archivo físicamente del servidor
        // También puedes eliminar la entrada en la base de datos si es necesario
        // ... Tu lógica para eliminar la entrada en la base de datos ...

        return response()->json(['message' => 'Archivo eliminado exitosamente']);
    } else {
        return response()->json(['error' => 'Archivo no encontrado']);
    }
}




public function uploadFiles(Request $request)
    {
        $images = request()->file('images');
        $publishCode = $request->input('publishCode'); 
         $orderDisplay = $request->input('orderDisplay'); 
    if ($images) {
        
      // Genera una cadena aleatoria de longitud 20
        $randomString = Str::random(20);
        // Genera el nombre único de la imagen con la cadena aleatoria
        $imageName = $publishCode . '-' . $orderDisplay . '-' . $randomString . '.' . $images->getClientOriginalExtension();

        // Guarda la imagen en la ubicación deseada
        $path = $images->storeAs('public/images-tmp', $imageName);

     // Creas una nueva instancia de ImageManager
        $resize = new ImageManager();
        // Cargas la imagen original (usando el nombre generado)
        $ImageManager = $resize->make(storage_path('app/public/images-tmp/' . $imageName));
        // Obtienes el ancho y alto de la imagen original
        $originalWidth = $ImageManager->width();
        $originalHeight = $ImageManager->height();

        // Verificamos si el ancho es mayor que 700 para redimensionar
        if ($originalWidth > 700) {
      // Calculamos el factor de escala para mantener la relación de aspecto
         $scaleFactor = 700 / $originalWidth;

         // Calculamos el nuevo ancho y alto para redimensionar la imagen
         $newWidth = $originalWidth * $scaleFactor;
        $newHeight = $originalHeight * $scaleFactor;

        // Redimensionamos la imagen
         $ImageManager->resize($newWidth, $newHeight);
        // Sobreescribimos la imagen original con la redimensionada
         $ImageManager->save(storage_path('app/public/images-tmp/'. $imageName));
}

     // Almacena el nombre de archivo generado en la variable de sesión por publishCode
        $uploadedImageNamesByCode = $request->session()->get('uploadedImageNamesByCode', []);
        $uploadedImageNamesByCode[$publishCode][] = $imageName;
        $request->session()->put('uploadedImageNamesByCode', $uploadedImageNamesByCode);


        return response()->json(['path' => $path]);
    } else {
        return response()->json(['error' => 'No file was selected']);
    }
}

  //----- FUNCTION STORE DATA ----//
    public function saveProperty(Request $request)
{
   
    $request->validate([
        'property_type' => 'required',
        'location' => 'required|min:3|max:300',
        'title' => 'required|unique:publish_properties|min:3|max:300',
        'description' => 'required|min:3',
        'price' => 'required|min:2|max:100',
        'transaction_type' => 'required',
        'bedrooms' => 'required|min:1|max:30',
        'bathrooms' => 'required|min:1|max:30',
        'total_area' => 'required|min:1|max:30',
        
         'garage' => 'required|min:1|max:30',
       'city' => 'required',
       
         'energy_certificate' => 'required',
        'publishCode' => 'required',
        
    ]);



   

// CARBON FORMAT DATE
         $date = Carbon::now()->locale('es_ES')->format('F d, Y');
            // END CARBON FORMAT DATE

      
$publishCode = $request->input('publishCode');
$propertyType = $request->input('property_type');
$location = $request->input('location');
$title = $request->input('title');
$description = nl2br($request->input('description'));
$price = $request->input('price');
$transactionType = $request->input('transaction_type');
$bedrooms = $request->input('bedrooms');
$bathrooms = $request->input('bathrooms');
$totalArea = $request->input('total_area');
$additionalFeatures = $request->input('additional_features');
$garage = $request->input('garage');
$energy_certificate = $request->input('energy_certificate');
$city = $request->input('city');
$latitudeArea = $request->input('latitudeArea');
$longitudeArea = $request->input('longitudeArea');

 // Estatus 
        $this->status = EstatusAds::where('estatus_description', 'Activo')->firstOrFail();

    $property = PublishProperty::create([

         'publish_code' => $publishCode,
       'property_type' => $propertyType,
        'location' => $location,
        'city' => $city,
         'latitudeArea' => $latitudeArea,
        'longitudeArea' => $longitudeArea,
    'title' => $title,
    'description' => $description,
    'price' => $price,
    'transaction_type' => $transactionType,
    'bedrooms' => $bedrooms,
    'bathrooms' => $bathrooms,
    'total_area' => $totalArea,
    'additional_features' => $additionalFeatures,
     'garage' => $garage,
       'energy_certificate' => $energy_certificate,

        'publication_date' =>  $date,
        'status' => $this->status->id,
         'user_id' => auth()->user()->id,
         
    ]);

    
// Obtiene los nombres de archivo generados almacenados en la variable de sesión por publishCode
    $uploadedImageNamesByCode = $request->session()->get('uploadedImageNamesByCode', []);
    $uploadedImageNames = $uploadedImageNamesByCode[$publishCode] ?? [];


    // Recorre los nombres de archivo y almacena la información en la base de datos
foreach ($uploadedImageNames as $fileName) {
    // Extrae el order_display del nombre de archivo
    $fileNameParts = explode('-', $fileName);
    $orderDisplay = $fileNameParts[2]; // Asegúrate de que la posición sea correcta
    
    // Ruta de origen y destino de las imágenes
    $sourcePath = storage_path('app/public/images-tmp/' . $fileName);
    $destinationPath = storage_path('app/public/propertiesimages/' . $fileName);
    
    // Mueve la imagen a la carpeta de destino
    if (file_exists($sourcePath)) {
        rename($sourcePath, $destinationPath);
    }
    
    //  último valor de order_display de la base de datos para la propiedad actual
$lastOrderDisplay = PropertyImage::where('property_id', $property->id)
    ->orderBy('order_display', 'desc')
    ->value('order_display');

// Si no hay registros previos, asigna el valor 1 como el primer order_display
if ($lastOrderDisplay === null) {
    $newOrderDisplay = 1;
} else {
    
    $newOrderDisplay = $lastOrderDisplay + 1;
}
    // Almacena la información en la base de datos
    PropertyImage::create([
        'property_id' => $property->id,
        'image_path' => 'app/public/propertiesimages/' . $fileName, // Solo la parte relativa a la carpeta public
        'order_display' => $newOrderDisplay,
    ]);
}


    // CREATE FIELD INPUT EQUIPMENTS
if (isset($request->addmore) && is_array($request->addmore) && count($request->addmore) > 0) {
    foreach ($request->addmore as $key => $value) {
        if (is_array($value)) {
            foreach ($value as $description) {
                // Verificar si la descripción no está vacía antes de crear el registro
                if (!empty($description)) {
                    Equipment::create([
                        'equipment_description' => $description,
                        'publish_property_id' => $property->id
                    ]);
                }
            }
        }
    }
}


// END CREATE FIELD INPUT EQUIPMENTS

//CREATE FIELD INPUT FEATURES
if (isset($request->addmore2) && is_array($request->addmore2) && count($request->addmore2) > 0) {
    foreach ($request->addmore2 as $key => $value) {
        if (is_array($value)) {
            foreach ($value as $description) {
                // Verificar si la descripción no está vacía antes de crear el registro
                if (!empty($description)) {
                    Feature::create([
                        'feature_description' => $description,
                        'publish_property_id' => $property->id
                    ]);
                }
            }
        }
    }
}
// END CREATE FIELD INPUT FEATURES



// CREATE FIELDS PURCHASE PLAN
// $purchased_plans = PurchasedPlan::create([
      //   'property_id' => $property->id,
      //   'publish_code' => $publishCode,
      //   'user_id' => auth()->user()->id,
       //  'plan_id' => '1',
      //   'purchase_date' =>  $date,
      //   'expiration_date' => 'Indefinido',
       
    // ]);

    // END CREATE FIELDS PURCHASE PLAN

    //SEND EMAIL FORM CONTACT
        $this->bucket = Bucket::orderBy('description', 'desc')->limit(1)->first();
        $user = User::find(auth()->user()->id);
$this->email = $user->email;
$this->name = $user->name;

\Mail::send('emails.contactMailPublishProperty', array(
    'name' => $this->name,
    'email' => $this->email,
     'title' => $this->title,
    
    'message2' => $publishCode,
    'bucket' => $this->bucket->description,
    'city' => $this->bucket->city,
     'community' => $this->bucket->community,
      'country' => $this->bucket->country,
      'address' => $this->bucket->address,
), function($message) {
    $emailAdmin = AdminEmail::orderBy('email', 'desc')->limit(1)->pluck('email')->first();

    $message->from($emailAdmin,'Aios Real Estate');
    $message->to($this->email)->subject('Nuevo Anuncio Registrado');
});

// END SEND EMAIL FORM CONTACT
 


// Cargar la vista con los datos necesarios

$images = PropertyImage::join('publish_properties', 'property_images.property_id', '=', 'publish_properties.id')
        ->select('property_images.image_path')
        ->where('publish_properties.publish_code', '=', $publishCode)
        ->orderBy('publish_properties.created_at', 'desc')
        ->get();

    $collections = PublishProperty::join('users', 'publish_properties.user_id', '=', 'users.id')
        ->join('estatus_ads', 'publish_properties.status', '=', 'estatus_ads.id')
        ->join('transactions', 'publish_properties.transaction_type', '=', 'transactions.id')
        ->select('publish_properties.*', 'users.name', 'users.lastname', 'users.profile_photo_path',
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

        // Realizar las operaciones necesarias antes de cargar la vista


$this->reset();
$this->CleanUp();

    
$this->publishCode = $publishCode;
 session()->flash('success', 'Datos guardados exitosamente');
    return view('livewire.views', [
        'publishCode' => $this->publishCode,
        'collections' => $collections,
        'images' => $images,
        'features' => $features,
        'equipments' => $equipments,
        
    ]);


     
}

public function authorize()
{
    return false;
}
public function editProperty(PublishProperty $publishProperty, $publishCode)
{
    if (Gate::denies('update', $publishProperty)) {
        abort(403, 'THIS ACTION IS UNAUTHORIZED.');
    }
$images = PropertyImage::join('publish_properties', 'property_images.property_id', '=', 'publish_properties.id')
        ->select('property_images.image_path')
        ->where('publish_properties.publish_code', '=', $publishCode)
        ->orderBy('publish_properties.created_at', 'desc')
        ->get();

   $collections = PublishProperty::join('users', 'publish_properties.user_id', '=', 'users.id')
    ->join('estatus_ads', 'publish_properties.status', '=', 'estatus_ads.id')
    ->join('transactions', 'publish_properties.transaction_type', '=', 'transactions.id')
    ->join('properties', 'publish_properties.property_type', '=', 'properties.id')
   
    ->select('publish_properties.*', 'users.name', 'users.lastname', 'users.profile_photo_path',
        'estatus_ads.estatus_description', 'transactions.transaction_description','properties.property_description')
    ->where('publish_properties.publish_code', '=', $publishCode)
    ->orderBy('publish_properties.created_at', 'desc')
    ->first();


    $features = Feature::join('publish_properties', 'features.publish_property_id', '=', 'publish_properties.id')
        ->where('publish_properties.publish_code', '=', $publishCode)
        ->select('features.*')
      ->get();

      
    $equipments = Equipment::join('publish_properties', 'equipment.publish_property_id', '=', 'publish_properties.id')
        ->where('publish_properties.publish_code', '=', $publishCode)
        ->select('equipment.*')
       ->get();

      

$this->propertyTypesRender = Property::all();
$this->transactionRender = Transaction::all();
$this->estatusAdsRender = EstatusAds::all();
   
        return view('livewire.edit-publish-properties', [
        'publishCode' => $publishCode,
        'collections' => $collections,
      
        'features' => $features,
        'equipments' => $equipments,
        'propertyTypesRender' => $this->propertyTypesRender,
    'estatusAdsRender' => $this->estatusAdsRender,
     'transactionRender' => $this->transactionRender,
    ]);

}



public function update(Request $request, $publishCode)
{
    $data = $request->validate([
          'title' => 'required|string|min:3|max:100|unique:publish_properties,title,'.$publishCode.',publish_code',
       
        'description' => 'required',
        'property_type' => 'required',
        'transaction_type' => 'required',
        'location' => 'required',
        'city' => 'required',
        'bedrooms' => 'required',
        'bathrooms' => 'required',
       
        'energy_certificate' => 'required',
        'total_area' => 'required',
        'status' => 'required',
        'price' => 'required',
    ]);

    $collection = PublishProperty::where('publish_code', $publishCode)->firstOrFail();
    $propertyId = $collection->id;

    $collection->title = $request->input('title');
    $collection->description = nl2br($request->input('description'));
    $collection->property_type = $request->input('property_type');
    $collection->transaction_type = $request->input('transaction_type');
    $collection->location = $request->input('location');
    $collection->city = $request->input('city');
    $collection->latitudeArea = $request->input('latitudeArea');
    $collection->longitudeArea = $request->input('longitudeArea');
    $collection->bedrooms = $request->input('bedrooms');
    $collection->bathrooms = $request->input('bathrooms');
    $collection->additional_features = $request->input('additional_features');
    $collection->energy_certificate = $request->input('energy_certificate');
    $collection->total_area = $request->input('total_area');
    $collection->status = $request->input('status');
     $collection->price = $request->input('price');

// UPDATE FIELD INPUT FEATURES
if (isset($request->addmore2) && is_array($request->addmore2) && count($request->addmore2) > 0) {
if ($request->has('addmore2')) {
    $features = $request->input('addmore2');

    foreach ($features as $key => $feature) {
        if (isset($request->feature_ids[$key])) {
            // Feature already exists, update it
            $existingFeature = Feature::find($request->feature_ids[$key]);
            if ($existingFeature) {
                $existingFeature->update([
                    'feature_description' => $feature
                ]);
            }
        } else {
            if (!empty($feature)) {
            // Feature is new, create it
            Feature::create([
                'feature_description' => $feature,
                'publish_property_id' => $propertyId
            ]);
        }
        }
    }
}
}
// END UPDATE FIELD INPUT FEATURES

// UPDATE FIELD INPUT EQUIPMENT
if (isset($request->addmore) && is_array($request->addmore) && count($request->addmore) > 0) {
if ($request->has('addmore')) {
    $equipments = $request->input('addmore');

    foreach ($equipments as $key => $equipment) {
        if (isset($request->equipment_ids[$key])) {
            // Equipment already exists, update it
            $existingEquipment = Equipment::find($request->equipment_ids[$key]);
            if ($existingEquipment) {
                $existingEquipment->update([
                    'equipment_description' => $equipment
                ]);
            }
        } else {
            // Equipment is new, create it
             if (!empty($equipment)) {
            Equipment::create([
                'equipment_description' => $equipment,
                'publish_property_id' => $propertyId
            ]);
        }
        }
    }
}
}
// END UPDATE FIELD INPUT EQUIPMENT

     session()->flash('success', 'Datos guardados exitosamente');
    $collection->save();

    return redirect()->route('edit-property', ['publishCode' => $publishCode]);

}





public function deleteFeature($featureId)
{
    // Encuentra la característica que se va a eliminar
    $feature = Feature::find($featureId);

    if (!$feature) {
        // La característica no existe
        // Realiza alguna acción (por ejemplo, mostrar un mensaje de error)
        session()->flash('error', 'La característica no existe');
        return;
    }

    // Elimina la característica
    $feature->delete();

    // Devuelve una respuesta JSON con el HTML actualizado
    return response()->json(['success' => true]);
}


public function deleteEquipment($equipmentId)
{
    // Encuentra la característica que se va a eliminar
    $equipment = Equipment::find($equipmentId);

    if (!$equipment) {
        // La característica no existe
        
        session()->flash('error', 'El Equipo  no existe');
        return;
    }

    // Elimina la característica
    $equipment->delete();

     session()->flash('success', 'Se ha eliminado correctamente');
     // Devuelve una respuesta JSON con el HTML actualizado
    return response()->json(['success' => true]);
}



public function viewImages(PublishProperty $publishProperty,$publishCodeImages)
{
    if (Gate::denies('update', $publishProperty)) {
        abort(403, 'THIS ACTION IS UNAUTHORIZED.');
    }
$images = PropertyImage::join('publish_properties', 'property_images.property_id', '=', 'publish_properties.id')
        ->select('property_images.image_path','property_images.id','property_images.order_display')
        ->where('publish_properties.publish_code', '=', $publishCodeImages)
         ->orderBy('property_images.order_display', 'asc')
        ->get();

       $premiumPlan = PremiumPlan::join('plans', 'plans.id', '=', 'premium_plans.plan_id')
    ->where('premium_plans.user_id', auth()->user()->id)
    ->select('plans.plan', 'plans.images_quantity')
    ->first();

       
    // Verificar si el plan permite acumular imágenes
  
   $maxImages = $premiumPlan->images_quantity;
$property = PublishProperty::where('publish_code', $publishCodeImages)->firstOrFail();
    // Obtener las imágenes ya subidas
    $uploadedImagesCount = PropertyImage::where('property_id', $property->id)->count();
    $remainingImages = $maxImages - $uploadedImagesCount;


   return view('livewire.add-images-publish-properties',['publishCodeImages' => $publishCodeImages,
'images' => $images,'purchasedPlan'=>$premiumPlan,'remainingImages'=>$remainingImages]);
}

public function addImages(Request $request, $publishCodeImages)
{
    // Obtener la propiedad y el plan asociado
    $property = PublishProperty::where('publish_code', $publishCodeImages)->firstOrFail();
    $premiumPlan = PremiumPlan::join('plans', 'plans.id', '=', 'premium_plans.plan_id')
        ->where('premium_plans.user_id', auth()->user()->id)
        ->select('plans.plan', 'plans.images_quantity')
        ->first();

    // Verificar si el plan permite acumular imágenes
    $planDescription = $premiumPlan->plan;
    $maxImages = $premiumPlan->images_quantity;

    // Obtener las imágenes ya subidas
    $uploadedImagesCount = PropertyImage::where('property_id', $property->id)->count();
    $remainingImages = $maxImages - $uploadedImagesCount;

    $image = request()->file('images');
     $images2 = $image;
    if ($image && $remainingImages > 0) {
        // Genera una cadena aleatoria de longitud 20
        $randomString = Str::random(20);
        // Genera el nombre único de la imagen con la cadena aleatoria
        $imageName = $publishCodeImages . '-' . $randomString . '.' . $image->getClientOriginalExtension();

        // Guarda la imagen en la ubicación deseada
        $path = $image->storeAs('public/propertiesimages', $imageName);

        // Creas una nueva instancia de ImageManager
        $resize = new ImageManager();
        // Cargas la imagen original (usando el nombre generado)
        $ImageManager = $resize->make(storage_path('app/public/propertiesimages/' . $imageName));
        // Obtienes el ancho y alto de la imagen original
        $originalWidth = $ImageManager->width();
        $originalHeight = $ImageManager->height();

        // Verificamos si el ancho es mayor que 700 para redimensionar
        if ($originalWidth > 700) {
            // Calculamos el factor de escala para mantener la relación de aspecto
            $scaleFactor = 700 / $originalWidth;
            // Calculamos el nuevo ancho y alto para redimensionar la imagen
            $newWidth = $originalWidth * $scaleFactor;
            $newHeight = $originalHeight * $scaleFactor;
            // Redimensionamos la imagen
            $ImageManager->resize($newWidth, $newHeight);
            // Sobreescribimos la imagen original con la redimensionada
            $ImageManager->save(storage_path('app/public/propertiesimages/' . $imageName));
        }

//  último valor de order_display de la base de datos para la propiedad actual
$lastOrderDisplay = PropertyImage::where('property_id', $property->id)
    ->orderBy('order_display', 'desc')
    ->value('order_display');

// Si no hay registros previos, asigna el valor 1 como el primer order_display
if ($lastOrderDisplay === null) {
    $newOrderDisplay = 1;
} else {
    
    $newOrderDisplay = $lastOrderDisplay + 1;
}

        PropertyImage::create([
            'property_id' => $property->id,
            'image_path' => 'app/' . $path,
             'order_display' => $newOrderDisplay,
        ]);

        $remainingImages--;

        // Obtener las imágenes asociadas a la propiedad
        $images = PropertyImage::join('publish_properties', 'property_images.property_id', '=', 'publish_properties.id')
            ->select('property_images.image_path')
            ->where('publish_properties.publish_code', $publishCodeImages)
            ->orderBy('property_images.id', 'desc')
            ->get();

           

        // Restablecer los campos y mostrar un mensaje de éxito
        $this->reset();
        $this->CleanUp();
       
    } else {
       session()->flash('success', 'Datos guardados exitosamente');

        return redirect()->route('images-gallery', ['publishCodeImages' => $publishCodeImages, 'images' => $images2]);
    }
}

public function deleteImages(Request $request)
{
    $imageIds = $request->input('imageIds');

    // Verifica si hay IDs de imágenes válidos
    if (!is_array($imageIds) || empty($imageIds)) {
        return response()->json(['success' => false]);
    }

    try {
        $deletedImages = PropertyImage::whereIn('id', $imageIds)->get();
        $deletedOrderDisplay = [];
        
        foreach ($deletedImages as $deletedImage) {
            $deletedOrderDisplay[] = $deletedImage->order_display;
            Storage::disk('public')->delete($deletedImage->image_path);
            $deletedImage->delete();
        }

        // Reordenar las imágenes restantes después de eliminar
        PropertyImage::where('property_id', $deletedImages[0]->property_id)
            ->where('order_display', '>', min($deletedOrderDisplay))
            ->decrement('order_display', count($deletedImages));

        return response()->json(['success' => true]);
        
    } catch (\Exception $e) {
        return response()->json(['success' => false]);
    }
}



public function deleteProperties(Request $request)
{
   $dataIds = $request->input('dataIds');

// Verifica si hay IDs de imágenes válidos
if (!is_array($dataIds) || empty($dataIds)) {
    return response()->json(['success' => false]);
}

try {
     foreach ($dataIds as $dataId) {
        // Elimina las imágenes relacionadas y sus archivos
        $images = PropertyImage::where('property_id', $dataId)->get();
        
        foreach ($images as $image) {
            // Elimina el archivo del almacenamiento
            Storage::disk('public')->delete($image->image_path);

            // Elimina el registro de la base de datos
            $image->delete();
        }

        // Elimina los equipos y características relacionados
        $equipments = Equipment::where('publish_property_id', $dataId)->delete();
        $features = Feature::where('publish_property_id', $dataId)->delete();
        
        // Elimina la propiedad
        $property = PublishProperty::find($dataId);
        if ($property) {
            $property->delete();
        }
    }



    return response()->json(['success' => true]);
} catch (\Exception $e) {
    return response()->json(['success' => false]);
}

}
public function updateImageOrder(Request $request)  {
        $orderData = json_decode($request->input('orderData'), true); // Convert JSON string to PHP array

        foreach ($orderData as $item) {
            $imageId = $item['imageId'];
            $newPosition = $item['newPosition'];

            $newOrderDisplay = $newPosition; // Since array indices are 0-based

            $propertyImage = PropertyImage::find($imageId);
            if ($propertyImage) {
                $propertyImage->update([
                    'order_display' => $newOrderDisplay,
                ]);
            }
        }

        return response()->json(['message' => 'Orden actualizado con éxito']);
    }


}