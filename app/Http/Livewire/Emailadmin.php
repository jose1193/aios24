<?php

namespace App\Http\Livewire;

use App\Models\AdminEmail;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;


class Emailadmin extends Component
{
    
    use WithPagination;
    public $email,  $emailadmin;
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
       
        $emails = AdminEmail::where('email', 'like', '%'.$this->search.'%')
            ->orderBy('admin_emails.id','DESC')->paginate(10);

            
       return view('livewire.emailadmin', ['emails' => $emails]);
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
        'email' => 'required|unique:admin_emails|min:3|max:30',
    ]);

    AdminEmail::create([
        'email' => $this->email,
        'user_id' => auth()->user()->id,
    ]);

    session()->flash("message", "Data registration successful.");
    $this->reset();

    sleep(2); //BUTTON SPINNER LOADING
}
    public function showEditDataModal($id)
    {
           $this->authorize('manage admin');
        $this->emailadmin = AdminEmail::findOrFail($id);
        $this->email = $this->emailadmin->email;
      
        $this->isEditMode = true;
        $this->showingDataModal = true;
    }

     public function updateData()
    {
           $this->authorize('manage admin');
        $this->validate([
            'email' => 'required|string|min:3|max:300|unique:admin_emails,email,'.$this->emailadmin->id.',id',
          
        ]);
       

        $this->emailadmin->update([
            'email' => $this->email,
           
        ]); session()->flash("message", "Data Updated Successfully.");
        $this->reset();
       
        sleep(2); //BUTTON SPINNER LOADING
    }


    public function delete(AdminEmail $emailadmin)
    {
           $this->authorize('manage admin');
        $emailadmin->delete();
         
      
     
    }


}