<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AdminEmail;
use App\Models\Bucket;
use Illuminate\Support\Facades\Mail;


class ContactForm extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Enviar el correo electrónico
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ];

        //SEND EMAIL FORM CONTACT
        $this->bucket = Bucket::orderBy('description', 'desc')->limit(1)->first();
\Mail::send('emails.contactMailForm', array(
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

        // Restablecer los campos del formulario
        $this->resetForm();

        // Mostrar un mensaje de éxito al usuario
        session()->flash('success', 'El formulario se ha enviado correctamente.');
    }

    private function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->subject = '';
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
