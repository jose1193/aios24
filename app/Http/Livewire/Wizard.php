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


class Wizard extends Component
{
 use WithFileUploads; 
 use WithPagination;
public $currentStep = 1;
public  $statuswizard = 1;
    public $title;
    public $property_type;
public $location;

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


// ADD FIELD INPUT FEATURES
public $features;
public $inputs = [];
public $i = 1;

public function add($i)
{
    $i = $i + 1;
    $this->i = $i;
    array_push($this->inputs, $i);
}

public function remove($i)
{
    unset($this->inputs[$i]);
}
// END ADD FIELD INPUT FEATURES




// ADD FIELD INPUT EQUIPMENT
public $equipments;
public $inputs2 = [];
public $e = 1;

public function add2($e)
{
    $e = $e + 1;
    $this->e = $e;
    array_push($this->inputs2, $e);
}

public function remove2($e)
{
    unset($this->inputs2[$e]);
}
// END ADD FIELD INPUT EQUIPMENT



public function render()
{
    $this->propertyTypesRender = Property::all();
 $this->transactionRender = Transaction::all();
 $this->estatusAdsRender = EstatusAds::all();
    return view('livewire.wizard', [
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


public function firstStepSubmit()
    {
        $validatedData = $this->validate([
           'title' => 'required|unique:publish_properties|min:3|max:300',
            'property_type' => 'required',
            'description' => 'required|min:3|max:500',
             'location' => 'required|min:3|max:300',
             'transaction_type' => 'required',
        ]);
 
        $this->currentStep = 2;
    }

     public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            
           'bedrooms' => 'required|min:1|max:30',
        'bathrooms' => 'required|min:1|max:30',
        
          'energy_certificate' => 'required',
          'features.0' => 'required|min:1|max:300',
           'features.*' => 'required|min:1|max:300',
          'total_area' => 'required|min:1|max:30',
            'garage' => 'required|min:1|max:30',
         'equipments.0' => 'required|min:1|max:300',
           'equipments.*' => 'required|min:1|max:300',
        ]);
  
        $this->currentStep = 3;
    }

   

  //----- FUNCTION STORE DATA ----//
    public function saveProperty()
{
    $this->validate([
       
       
        'price' => 'required|min:2|max:100',
       
       
        'images' => 'required|array',
        'images.*' => 'image|max:2048',
        
       
       
    ]);

    $imagesPaths = [];
    foreach ($this->images as $image) {
        $path = $image->store('propertiesimages', 'public');
        $imagesPaths[] = $path;
        
    }

   
// CARBON FORMAT DATE
         $date = Carbon::now()->locale('es_ES')->format('F d, Y');
            // END CARBON FORMAT DATE
        $publishCode = 'AR-' . str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);

        // Estatus 
        $this->status = EstatusAds::where('estatus_description', 'Activo')->firstOrFail();

    $property = PublishProperty::create([

         'publish_code' => $publishCode,
        'property_type' => $this->property_type,
        'location' => $this->location,
        'title' => $this->title,
        'description' => $this->description,
        'price' => $this->price,
        'transaction_type' => $this->transaction_type,
        'bedrooms' => $this->bedrooms,
        'bathrooms' => $this->bathrooms,
        'total_area' => $this->total_area,
        'garage' => $this->garage,
        'energy_certificate' => $this->energy_certificate,
        'additional_features' => $this->additional_features,
        'publication_date' =>  $date,
        'status' => $this->status->id,
         'user_id' => auth()->user()->id,
    ]);



    // CREATE FIELD INPUT FEATURES
 foreach ($this->features as $key => $value) {
    Feature::create([
        'feature_description' => $value,
        'publish_property_id' => $property->id
    ]);
}

$this->inputs2 = [];
// END CREATE FIELD INPUT FEATURES

 // CREATE FIELD INPUT EQUIPMENTS
 foreach ($this->equipments as $key => $value) {
    Equipment::create([
        'equipment_description' => $value,
        'publish_property_id' => $property->id
    ]);
}

$this->inputs2 = [];
// END CREATE FIELD INPUT EQUIPMENTS

    // Create property images
    foreach ($imagesPaths as $imagePath) {
        PropertyImage::create([
            'property_id' => $property->id,
            'image_path' => 'app/public/'.$imagePath, // CAMBIAR ACA
        ]);
    }


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
 sleep(2); //BUTTON SPINNER LOADING
    session()->flash('success', 'Datos guardados exitosamente');
    $this->reset();
    $this->CleanUp();
    $this->currentStep = 1;
}



// BACK STEP WIZARD
public function back($step)
    {
        $this->currentStep = $step;    
    }
}
