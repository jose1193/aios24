<?php
namespace App\Http\Livewire;

use App\Models\Favorite;
use App\Models\User;
use App\Models\PublishProperty;
use Livewire\Component;

class Favorites extends Component
{
   public $propertyId;
    public $isFavorite;
    public $collections;

    public function mount($propertyId = null)
    {
        $this->collections = PublishProperty::all();
        $this->propertyId = $propertyId;
        $this->isFavorite = $this->checkIfFavorite();
    }

    public function addToFavorites($propertyId)
    {
        $this->propertyId = $propertyId;

        Favorite::create([
            'user_id' => auth()->id(),
            'property_id' => $this->propertyId,
        ]);

        // Lógica para agregar la propiedad a favoritos

    $this->isFavorite = true;
    }

    public function removeFromFavorites($propertyId)
    {
        $this->propertyId = $propertyId;

        Favorite::where('user_id', auth()->id())
            ->where('property_id', $this->propertyId)
            ->delete();

     // Lógica para eliminar la propiedad de favoritos 

    $this->isFavorite = false;
    }

    public function render()
    {
        return view('livewire.favorites');
    }

     public function favoritescards()
    {
        return view('livewire.favorites-cards');
    }

    private function checkIfFavorite()
    {
        $favorite = Favorite::where('user_id', auth()->id())
            ->where('property_id', $this->propertyId)
            ->first();

        return $favorite ? true : false;
    }
    
}
