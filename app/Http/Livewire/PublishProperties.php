<?php

namespace App\Http\Livewire;

use App\Models\PublishProperty;
use App\Models\PropertyImage;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;


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


    public function render()
    {
        return view('livewire.publish-properties');
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
        'location' => 'required',
        'title' => 'required',
        'description' => 'required',
        'price' => 'required',
        'transaction_type' => 'required',
        'bedrooms' => 'required',
        'bathrooms' => 'required',
        'total_area' => 'required',
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
    session()->flash('message', 'Datos guardados exitosamente');
    $this->reset();
    $this->CleanUp();
     sleep(2); //BUTTON SPINNER LOADING
}




}
