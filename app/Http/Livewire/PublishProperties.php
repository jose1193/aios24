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
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

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
        'latitudeArea' => 'required',
         'longitudeArea' => 'required',
         'energy_certificate' => 'required',
         'addmore.*.equipments' => 'required',
          'addmore2.*.features' => 'required',
    ]);

    $imagesPaths = [];
   foreach ($request->file('images') as $image) {
        $path = $image->store('propertiesimages', 'public');
        $imagesPaths[] = $path;
    }

   
// CARBON FORMAT DATE
         $date = Carbon::now()->locale('es_ES')->format('F d, Y');
            // END CARBON FORMAT DATE
        $publishCode = 'AR-' . str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);
$propertyType = $request->input('property_type');
$location = $request->input('location');
$title = $request->input('title');
$description = $request->input('description');
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
            'image_path' => 'app/public/propertiesimages/'.$imagePath, // CAMBIAR ACA
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
session()->flash('success', 'Datos guardados exitosamente');
$this->reset();
$this->CleanUp();

    
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
