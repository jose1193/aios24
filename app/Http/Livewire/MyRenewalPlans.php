<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MyPlan;
use App\Models\PremiumPlan;
use App\Models\RenewalPlans;
use App\Models\User;
use App\Models\Plan;
use Livewire\WithPagination;
use Carbon\Carbon;

class MyRenewalPlans extends Component
{
     use WithPagination;
     public $search = '';
    public function render()
    {
        $myplans = Plan::join('renewal_plans', 'renewal_plans.plan_id', '=', 'plans.id')
        ->where('renewal_plans.user_id', auth()->id())
        ->select('plans.id','plans.plan','renewal_plans.purchase_date','renewal_plans.nro_invoices')
         ->orderBy('renewal_plans.id', 'desc')
        ->paginate(10);
      
       

 return view('livewire.my-renewal-plans', [
        'myplans' => $myplans]);

       
    }
}
