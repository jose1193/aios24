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

public function mount(PublishProperty $publishProperty)
{
    $this->publishProperty = $publishProperty;
}

public function render()
{
    
   
    $this->propertyTypesRender = Property::all();
 $this->transactionRender = Transaction::all();
 $this->estatusAdsRender = EstatusAds::all();
    return view('livewire.publish-properties', [
        'propertyTypes' => $this->propertyTypesRender,
        'estatusAdsRender' => $this->estatusAdsRender,
    ]);
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
         'additional_features' => 'min:1|max:300',
        'images' => 'required|array|min:1',
        'images.*' => 'image|max:2048',
         'garage' => 'required|min:1|max:30',
       'city' => 'required',
       
         'energy_certificate' => 'required',
         'addmore.*.equipments' => 'required',
          'addmore2.*.features' => 'required',
    ]);

    $imagesPaths = [];
   foreach ($request->file('images') as $image) {
    $path = $image->store('propertiesimages', 'public');
    $imagesPaths[] = $path;

    // UPLOAD WITH INTERVENTION IMAGE Create a thumbnail of the image using Intervention Image Library
    $imageHashName = $image->hashName();

    $resize = new ImageManager();
    $ImageManager = $resize->make('storage/app/public/propertiesimages/'.$imageHashName)->resize(700, 467);
    $ImageManager->save('storage/app/public/propertiesimages/'.$imageHashName);
}

             // END UPLOAD WITH INTERVENTION IMAGE
   
// CARBON FORMAT DATE
         $date = Carbon::now()->locale('es_ES')->format('F d, Y');
            // END CARBON FORMAT DATE
        $publishCode = 'AR-' . str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);
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

    // Create property images
    foreach ($imagesPaths as $imagePath) {
        PropertyImage::create([
            'property_id' => $property->id,
            'image_path' => 'app/public/'.$imagePath, // CAMBIAR ACA
        ]);
    }

    // CREATE FIELD INPUT EQUIPMENTS
 foreach ($request->addmore as $key => $value) {
    if (is_array($value)) {
        foreach ($value as $description) {
            Equipment::create([
                'equipment_description' => $description,
                'publish_property_id' => $property->id
            ]);
        }
    }
}
// END CREATE FIELD INPUT EQUIPMENTS

// CREATE FIELD INPUT FEATURES
 foreach ($request->addmore2 as $key => $value) {
    if (is_array($value)) {
        foreach ($value as $description) {
            Feature::create([
                'feature_description' => $description,
                'publish_property_id' => $property->id
            ]);
        }
    }
}
// END CREATE FIELD INPUT FEATURES


// CREATE FIELDS PURCHASE PLAN
$purchased_plans = PurchasedPlan::create([
        'property_id' => $property->id,
        'publish_code' => $publishCode,
        'user_id' => auth()->user()->id,
        'plan_id' => '1',
        'purchase_date' =>  $date,
        'expiration_date' => 'Indefinido',
       
    ]);

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
sleep(2); //BUTTON SPINNER LOADING

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
    ->join('features', 'features.publish_property_id', '=', 'publish_properties.id')
    ->select('publish_properties.*', 'features.feature_description','users.name', 'users.lastname', 'users.profile_photo_path',
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
        'addmore2.*.features' => 'nullable',
        'additional_features' => 'nullable',
        'addmore.*.equipments' => 'nullable',
        'energy_certificate' => 'required',
        'total_area' => 'required',
        'status' => 'required',
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

// UPDATE FIELD INPUT FEATURES
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
            // Feature is new, create it
            Feature::create([
                'feature_description' => $feature,
                'publish_property_id' => $propertyId
            ]);
        }
    }
}
// END UPDATE FIELD INPUT FEATURES

// UPDATE FIELD INPUT EQUIPMENT
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
            Equipment::create([
                'equipment_description' => $equipment,
                'publish_property_id' => $propertyId
            ]);
        }
    }
}
// END UPDATE FIELD INPUT EQUIPMENT

     session()->flash('success', 'Datos guardados exitosamente');
    $collection->save();

    return redirect()->route('livewire.edit-publish-properties', ['publishCode' => $publishCode]);
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
        ->select('property_images.image_path','property_images.id')
        ->where('publish_properties.publish_code', '=', $publishCodeImages)
         ->orderBy('property_images.id', 'desc')
        ->get();

        $purchasedPlan = PurchasedPlan::join('plans', 'plans.id', '=', 'purchased_plans.plan_id')
        ->where('purchased_plans.publish_code', $publishCodeImages)
        ->select('plans.plan', 'plans.images_quantity')
        ->first();

       
    // Verificar si el plan permite acumular imágenes
  
    $maxImages = $purchasedPlan->images_quantity;
$property = PublishProperty::where('publish_code', $publishCodeImages)->firstOrFail();
    // Obtener las imágenes ya subidas
    $uploadedImagesCount = PropertyImage::where('property_id', $property->id)->count();
    $remainingImages = $maxImages - $uploadedImagesCount;


   return view('livewire.add-images-publish-properties',['publishCodeImages' => $publishCodeImages,
'images' => $images,'purchasedPlan'=>$purchasedPlan,'remainingImages'=>$remainingImages]);
}


public function addImages(Request $request, $publishCodeImages)
{
    $request->validate([
        'images' => 'required|array|min:1',
        'images.*' => 'image|max:2048',
    ]);

    // Obtener la propiedad y el plan asociado
    $property = PublishProperty::where('publish_code', $publishCodeImages)->firstOrFail();
    $purchasedPlan = PurchasedPlan::join('plans', 'plans.id', '=', 'purchased_plans.plan_id')
        ->where('purchased_plans.publish_code', $publishCodeImages)
        ->select('plans.plan', 'plans.images_quantity')
        ->first();

    // Verificar si el plan permite acumular imágenes
    $planDescription = $purchasedPlan->plan;
    $maxImages = $purchasedPlan->images_quantity;

    // Obtener las imágenes ya subidas
    $uploadedImagesCount = PropertyImage::where('property_id', $property->id)->count();
    $remainingImages = $maxImages - $uploadedImagesCount;

    // Subir las imágenes y crear registros en la base de datos
    $imagesPaths = [];
    foreach ($request->file('images') as $image) {
       if ($remainingImages > 0) {
        $path = $image->store('propertiesimages', 'public');
        $imagesPaths[] = $path;

        // Crear una miniatura de la imagen usando Intervention Image Library
        $imageHashName = $image->hashName();
        $resize = new ImageManager();
        $ImageManager = $resize->make('storage/app/public/propertiesimages/'.$imageHashName)->resize(700, 467);
        $ImageManager->save('storage/app/public/propertiesimages/'.$imageHashName);

        PropertyImage::create([
            'property_id' => $property->id,
            'image_path' => $path,
        ]);

        $remainingImages--;
    }
         else {
            session()->flash('error', 'Se ha alcanzado el límite máximo de carga de imágenes.');
            break;
        }
    }

    // Obtener las imágenes asociadas a la propiedad
    $images = PropertyImage::join('publish_properties', 'property_images.property_id', '=', 'publish_properties.id')
        ->select('property_images.image_path')
        ->where('publish_properties.publish_code', $publishCodeImages)
        ->orderBy('property_images.id', 'desc')
        ->get();

    // Restablecer los campos y mostrar un mensaje de éxito
    $this->reset();
    $this->CleanUp();
    session()->flash('success', 'Datos guardados exitosamente');

    return redirect()->route('images-gallery', ['publishCodeImages' => $publishCodeImages, 'images' => $images]);
}



    public function deleteImage($imageId)
    {
          
      // Encuentra la característica que se va a eliminar
    $image = PropertyImage::find($imageId);

// Verifica si se encontró la imagen
    if (!$image) {
        session()->flash('error', 'La imagen no existe');
        return response()->json(['success' => false]);
    }

    // Elimina la característica
    $image->delete();
    Storage::disk('public')->delete($image->image_path);
    


//session()->flash('success', 'Se ha eliminado la imagen correctamente');
return response()->json(['success' => true]);
    }
}
