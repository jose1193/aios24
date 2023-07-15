<?php

namespace App\Http\Livewire;
use App\Models\Suscription;
use Illuminate\Http\Request;

use Livewire\Component;

class Suscriptions extends Component
{
    

    public function render()
    {
        return view('livewire.suscriptions');
    }

    // ---------- EMAIL SUSCRIPTIONS -------//
public function storeSuscriptions(Request $request)
{
    $request->validate([
         'email_suscription' => 'required|email|unique:suscriptions|min:5|max:60',
       
    ]);

    $email = $request->input('email_suscription');

        // Crear una nueva suscripción
        Suscription::create([
            'email_suscription' => $email,
        ]);

        // Suscripción exitosa
        session()->flash('success', 'Te has suscrito exitosamente.');
        
    }





}
