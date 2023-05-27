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
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class PublishProperties extends Component
{
 use WithFileUploads; 
 use WithPagination;

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
    public function saveProperty()
{
    $this->validate([
        'property_type' => 'required',
        'location' => 'required|min:3|max:300',
        'title' => 'required|unique:publish_properties|min:3|max:300',
        'description' => 'required|min:3|max:500',
        'price' => 'required|min:2|max:100',
        'transaction_type' => 'required',
        'bedrooms' => 'required|min:1|max:30',
        'bathrooms' => 'required|min:1|max:30',
        'total_area' => 'required|min:1|max:30',
        'additional_features' => 'nullable',
        'images' => 'required|array',
        'images.*' => 'image|max:2048',
        
        'status' => 'required',
       
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
        'additional_features' => $this->additional_features,
       
        'publication_date' =>  $date,
        'status' => $this->status,
         'user_id' => auth()->user()->id,
    ]);

    // Create property images
    foreach ($imagesPaths as $imagePath) {
        PropertyImage::create([
            'property_id' => $property->id,
            'image_path' => $imagePath,
        ]);
    }
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
    session()->flash('success', 'Datos guardados exitosamente');
    $this->reset();
    $this->CleanUp();
     sleep(2); //BUTTON SPINNER LOADING
}




}
