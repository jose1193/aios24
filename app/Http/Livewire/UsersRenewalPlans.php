<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\PremiumPlan;
use App\Models\User;
use App\Models\Plan;
use Livewire\WithPagination;
use Carbon\Carbon;

class UsersRenewalPlans extends Component
{

    public function authorize()
{
    return true;
}

    public function render()
    {
          $this->authorize('manage admin');
    $myplans = Plan::join('renewal_plans', 'renewal_plans.plan_id', '=', 'plans.id')
    ->join('users', 'renewal_plans.user_id', '=', 'users.id') 
    ->select('plans.id', 'plans.plan', 'renewal_plans.purchase_date', 'renewal_plans.nro_invoices',  'users.name', 'users.lastname') 
    ->orderBy('renewal_plans.id', 'desc')
    ->paginate(10);

       

 return view('livewire.users-renewal-plans', [
        'myplans' => $myplans]);

       
    }

       
}
