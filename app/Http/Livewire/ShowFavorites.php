<?php

namespace App\Http\Livewire;
use App\Models\Favorite;
use App\Models\User;
use App\Models\PublishProperty;
use Livewire\Component;

class ShowFavorites extends Component
{
      public $search = '';
    public function render()

    {
    $collections = PublishProperty::join('favorites', 'publish_properties.id', '=', 'favorites.property_id')
    ->join('estatus_ads', 'publish_properties.status', '=', 'estatus_ads.id')
     ->join('transactions', 'publish_properties.transaction_type', '=', 'transactions.id')
        ->select('publish_properties.*','estatus_ads.estatus_description','transactions.transaction_description')
       ->where('title', 'like', '%'.$this->search.'%')->where('favorites.user_id', '=', auth()->id())
        ->orderBy('publish_properties.created_at', 'desc')
        ->paginate(10);

    return view('livewire.favorites-show', [
        'collections' => $collections,
    ]);
}
    
}
