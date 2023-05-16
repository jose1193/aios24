<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bucket;
use Livewire\WithPagination;
use Carbon\Carbon;
class Buckets extends Component
{
    
    use WithPagination;
    public $bucket,$description, $country ,$community,$city,$address,$user_id ;
    public $showingDataModal = false;
  
   

 
 public $isEditMode = false;
  
  
    public $search = '';
    protected $listeners = ['render','delete']; 
    
    
public function authorize()
{
    return true;
}



    public function render()
    {
       
      
    $this->authorize('manage admin');
       
        $buckets = Bucket::where('description', 'like', '%'.$this->search.'%')
            ->orderBy('buckets.id','ASC')->paginate(10);

            
       return view('livewire.buckets', ['buckets' => $buckets]);
    }

   

 public function showDataModal()
    {
        $this->reset();
        $this->showingDataModal = true;
    }
public function closeModal()
    {
          $this->showingDataModal = false;
    }

     public function storeData()
{
     $this->authorize('manage admin');
    $valid_data = $this->validate([
        'description' => 'required|unique:buckets|min:3|max:50',
        'country' => 'required|min:3|max:50',
        'community' => 'required|min:3|max:50',
        'city' => 'required|min:3|max:50',
        'address' => 'required|min:3|max:50',
    ]);

    Bucket::create([
        'description' => $this->description,
        'country' => $this->country,
        'community' => $this->community,
        'city' => $this->city,
        'address' => $this->address,
        'user_id' => auth()->user()->id,
    ]);

    session()->flash("message", "Data registration successful.");
    $this->reset();

    sleep(2); //BUTTON SPINNER LOADING
}
    public function showEditDataModal($id)
    {
           $this->authorize('manage admin');
        $this->bucket = Bucket::findOrFail($id);
        $this->description = $this->bucket->description;
         $this->country = $this->bucket->country;
          $this->community = $this->bucket->community;
           $this->city = $this->bucket->city;
            $this->address = $this->bucket->address;
      
        $this->isEditMode = true;
        $this->showingDataModal = true;
    }

     public function updateData()
    {
           $this->authorize('manage admin');
        $this->validate([
            'description' => 'required|string|min:3|max:100|unique:buckets,description,'.$this->bucket->id.',id',
          
        ]);
       

        $this->bucket->update([
            'description' => $this->description,
            'country' => $this->country,
            'community' => $this->community,
            'city' => $this->city,
            'address' => $this->address,
           
        ]); session()->flash("message", "Data Updated Successfully.");
        $this->reset();
       
        sleep(2); //BUTTON SPINNER LOADING
    }


    public function delete(Bucket $bucket)
    {
           $this->authorize('manage admin');
        $bucket->delete();
         
      
     
    }


}