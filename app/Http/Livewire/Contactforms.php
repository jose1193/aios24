<?php

namespace App\Http\Livewire;

use App\Models\ContactForm;
use App\Models\AdminEmail;
use App\Models\Bucket;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;


class Contactforms extends Component
{
    
    use WithPagination;
    public $name,$email,$subject,$phone, $message,$contactform;
   public $bucket;
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
       
        $contactforms = ContactForm::where('email', 'like', '%'.$this->search.'%')
            ->orderBy('contact_forms.id','DESC')->paginate(10);

            
       return view('livewire.contactforms', ['contactforms' => $contactforms]);
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
        'name' => 'required|min:3|max:30',
         'email' => 'required|email|string|min:3|max:100',
         'subject' => 'required|min:3|max:30',
         'phone' => 'required|min:3|max:30',
    'message' => 'required|min:3|max:400',
        ]);
       //SEND EMAIL FORM CONTACT
        $this->bucket = Bucket::orderBy('description', 'desc')->limit(1)->first();
\Mail::send('emails.contactMail', array(
    'name' => $this->name,
    'email' => $this->email,
    'subject' => $this->subject,
    'message2' => $this->message,
    'bucket' => $this->bucket->description,
    'city' => $this->bucket->city,
     'community' => $this->bucket->community,
      'country' => $this->bucket->country,
      'address' => $this->bucket->address,
), function($message) {
    $emailAdmin = AdminEmail::orderBy('email', 'desc')->limit(1)->pluck('email')->first();

    $message->from($emailAdmin,'Aios Real Estate');
    $message->to($this->email)->subject($this->subject);
});
// END SEND EMAIL FORM CONTACT
    ContactForm::create([
        'name' => $this->name,
        'email' => $this->email,
        'subject' => $this->subject,
         'phone' => $this->phone,
        'message' => $this->message,
        'read' => 'SI',
        'user_id' => auth()->user()->id,
    ]);

    session()->flash("message", "Data registration successful.");
    $this->reset();

    sleep(2); //BUTTON SPINNER LOADING
}
    public function showEditDataModal($id)
    {
        $this->authorize('manage admin');
        $this->contactform = ContactForm::findOrFail($id);
        $this->name = $this->contactform->name;
         $this->email = $this->contactform->email;
          $this->phone = $this->contactform->phone;
         $this->subject = $this->contactform->subject;
          $this->message = $this->contactform->message;
      
        $this->isEditMode = true;
        $this->showingDataModal = true;
    }

     public function updateData()
    {
       $this->authorize('manage admin');
        $this->validate([
            'email' => 'required|string|min:3|max:300|unique:contact_forms,email,'.$this->contactform->id.',id',
          'name' => 'required|min:3|max:30',
           'subject' => 'required|min:3|max:30',
            'phone' => 'required|min:3|max:30',
          'message' => 'required|min:3|max:400',
        ]);
       

        $this->contactform->update([
           
             'name' => $this->name,
           'email' => $this->email,
            'subject' => $this->subject,
             'phone' => $this->phone,
            'message' => $this->message,
           
        ]); session()->flash("message", "Data Updated Successfully.");
        $this->reset();
       
        sleep(2); //BUTTON SPINNER LOADING
    }


    public function delete(ContactForm $contactform)
    {
         $this->authorize('manage admin');
        $contactform->delete();
         
      
     
    }


}