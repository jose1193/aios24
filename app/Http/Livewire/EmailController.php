<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AdminEmail;
use App\Models\Bucket;
use Illuminate\Support\Facades\Mail;

class EmailController extends Component
{
    public $name;
    public $email;
    public $subject;
    public $messageform;

   

    public function sendEmail()
    {
         $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'messageform' => 'required',
        ]);
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'messageform' => $this->messageform,
        ];

      //SEND EMAIL FORM CONTACT
        $this->bucket = Bucket::orderBy('description', 'desc')->limit(1)->first();
\Mail::send('emails.contactMailForm', array(
    'name' => $this->name,
    'email' => $this->email,
    'subject' => $this->subject,
    'messageform' => $this->messageform,
    'bucket' => $this->bucket->description,
    'city' => $this->bucket->city,
     'community' => $this->bucket->community,
      'country' => $this->bucket->country,
      'address' => $this->bucket->address,
), function($message) {
    $emailAdmin = AdminEmail::orderBy('email', 'desc')->limit(1)->pluck('email')->first();

    $message->from($this->email,$this->name);
    $message->to($this->email)->subject($this->subject);
});
// END SEND EMAIL FORM CONTACT

       // Restablecer los campos del formulario
        $this->resetForm();

      

         // Mostrar un mensaje de éxito al usuario
        session()->flash('message', 'El formulario se ha enviado correctamente.');
        
    }

    private function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->subject = '';
        $this->messageform = '';
    }
     public function render()
    {
         $buckets = Bucket::all();
 $emailAdmin = AdminEmail::orderBy('email', 'desc')->limit(1)->pluck('email')->first();
        return view('components.contact-component',[
            'buckets' => $buckets,'emailAdmin' => $emailAdmin
        ]);
    }

}
