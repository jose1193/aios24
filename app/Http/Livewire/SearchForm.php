<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\Property;
class SearchForm extends Component
{
    public $transactions;
    public $properties;

    public function mount()
    {
        $this->transactions = Transaction::all();
        $this->properties = Property::all();
    }

    public function render()
    {
        return view('livewire.search-form');
    }

    
}
