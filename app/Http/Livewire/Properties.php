<?php

namespace App\Http\Livewire;

use App\Models\Property;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;


class Properties extends Component
{
    
    use WithPagination;
    public $property_description,  $property;
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
       
        $properties = Property::where('property_description', 'like', '%'.$this->search.'%')
            ->orderBy('properties.id','ASC')->paginate(10);

            
       return view('livewire.properties', ['properties' => $properties]);
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
        'property_description' => 'required|unique:properties|min:3|max:30',
    ]);

    Property::create([
        'property_description' => $this->property_description,
        'user_id' => auth()->user()->id,
    ]);

    session()->flash("message", "Data registration successful.");
    $this->reset();

    sleep(2); //BUTTON SPINNER LOADING
}
    public function showEditDataModal($id)
    {
           $this->authorize('manage admin');
        $this->property = Property::findOrFail($id);
        $this->property_description = $this->property->property_description;
      
        $this->isEditMode = true;
        $this->showingDataModal = true;
    }

     public function updateData()
    {
           $this->authorize('manage admin');
        $this->validate([
            'property_description' => 'required|string|min:3|max:300|unique:properties,property_description,'.$this->property->id.',id',
          
        ]);
       

        $this->property->update([
            'property_description' => $this->property_description,
           
        ]); session()->flash("message", "Data Updated Successfully.");
        $this->reset();
       
        sleep(2); //BUTTON SPINNER LOADING
    }


    public function delete(Property $property)
    {
           $this->authorize('manage admin');
        $property->delete();
         
      
     
    }


}