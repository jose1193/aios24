<?php

namespace App\Policies;

use App\Models\PublishProperty;
use App\Models\User;



class PublishPropertyPolicy
{
   
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PublishProperty $publishProperty)
    {
         
    
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PublishProperty $publishProperty) 
    {
       $publishProperties = PublishProperty::get(); // Obtén todos los objetos $publishProperty

    foreach ($publishProperties as $property) {
        if ($user->id == $property->user_id) {
            return true;
        }
    }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PublishProperty $publishProperty): bool
    {
         
    }
    

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PublishProperty $publishProperty): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PublishProperty $publishProperty): bool
    {
        //
    }

}