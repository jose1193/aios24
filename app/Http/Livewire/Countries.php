<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;


class Countries extends Component
{
    
    use WithPagination;
    public $country_description,  $country,$user_id,$countries;
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
       
        $countriess = Country::where('country', 'like', '%'.$this->search.'%')
            ->orderBy('countries.id','ASC')->paginate(10);

            
       return view('livewire.countries', ['countriess' => $countriess]);
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
        'country' => 'required|unique:countries|min:3|max:30',
    ]);

    Country::create([
        'country' => $this->country,
        'user_id' => auth()->user()->id,
    ]);

    session()->flash("message", "Data registration successful.");
    $this->reset();

    sleep(2); //BUTTON SPINNER LOADING
}
    public function showEditDataModal($id)
    {
           $this->authorize('manage admin');
        $this->countries = Country::findOrFail($id);
        $this->country = $this->countries->country;
      
        $this->isEditMode = true;
        $this->showingDataModal = true;
    }

     public function updateData()
    {
           $this->authorize('manage admin');
        $this->validate([
            'country' => 'required|string|min:3|max:300|unique:countries,country,'.$this->countries->id.',id',
          
        ]);
       

        $this->countries->update([
            'country' => $this->country,
           
        ]); session()->flash("message", "Data Updated Successfully.");
        $this->reset();
       
        sleep(2); //BUTTON SPINNER LOADING
    }


    public function delete(Country $countries)
    {
           $this->authorize('manage admin');
        $countries->delete();
         
      
     
    }


}