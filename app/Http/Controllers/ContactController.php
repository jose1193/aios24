<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminEmail;
use App\Models\Bucket;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
  
    

    public function showForm()
    {
        return view('livewire.formulariocontacto');
    }

    public function submitForm(Request $request)
    {
        // Validar los campos del formulario
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'messageform' => 'required',
        ]);
  //SEND EMAIL FORM CONTACT
        $bucket = Bucket::orderBy('description', 'desc')->limit(1)->first();
\Mail::send('emails.contactMailForm', array(
   'name' => $request->name,
    'email' => $request->email,
    'subject' => $request->subject,
    'messageform' => $request->messageform,
    'bucket' => $bucket->description,
    'city' => $bucket->city,
     'community' => $bucket->community,
      'country' => $bucket->country,
      'address' => $bucket->address,
), function($message) use ($request) {
    $emailAdmin = AdminEmail::orderBy('email', 'desc')->limit(1)->pluck('email')->first();

    $emailFrom = $request->email;
    $subject = $request->subject;
    $name = $request->name;
    
    $message->from($request->email, $name);
    $message->to($emailAdmin)->subject($subject);
});
// END SEND EMAIL FORM CONTACT
        // Aquí puedes realizar cualquier otra acción que necesites, como enviar el correo electrónico, guardar los datos en la base de datos, etc.

        // Redirigir a una página de éxito o mostrar un mensaje de éxito
       return back()->with('message', 'El formulario se ha enviado correctamente.');
    }
}
