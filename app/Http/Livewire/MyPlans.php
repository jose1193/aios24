<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MyPlan;
use App\Models\PublishProperty;
use App\Models\User;
use Livewire\WithPagination;
use Carbon\Carbon;

class MyPlans extends Component
{
     use WithPagination;
     public $search = '';
    public function render()
    {
       $myplans = PublishProperty::join('my_plans', 'publish_properties.id', '=', 'my_plans.property_id')
        ->join('plans', 'my_plans.plan_id', '=', 'plans.id')
        ->where('publish_properties.user_id', auth()->user()->id)
        ->where('publish_properties.title', 'like', '%'.$this->search.'%')
        ->orderBy('publish_properties.id', 'desc')
        ->paginate(10);
        

        return view('livewire.my-plans', [
        'myplans' => $myplans]);
    }
}
