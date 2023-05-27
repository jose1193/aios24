<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Plan;

class Plans extends Component
{
       
    public $plan, $pricing, $position, $duration, $quantity,$plan_id,$plan_description;
    public $isModalOpen = 0;
    protected $listeners = ['render','delete']; // ALERT CONFIRMATION SWEET ALERT


       
public function authorize()
{
    return true;
}


    public function render()
    {
       
        $this->plans = Plan::all();
        return view('livewire.plans');
    }
    public function create()
    {
          $this->authorize('manage admin');
        $this->resetCreateForm();
        $this->openModalPopover();
    }
    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    private function resetCreateForm(){
        $this->plan = '';
        $this->plan_description = '';
        $this->pricing = '';
        $this->position = '';
        $this->duration = '';
         $this->quantity = '';
    }
    
    public function store()
    {
          $this->authorize('manage admin');
        $this->validate([
            'plan' => 'required',
            'plan_description' => 'required',
            'pricing' => 'required',
            'position' => 'required',
            'duration' => 'required',
            'quantity' => 'required',
        ]);
    
        Plan::updateOrCreate(['id' => $this->plan_id], [
            'plan' => $this->plan,
              'plan_description' => $this->plan_description,
            'pricing' => $this->pricing,
            'position' => $this->position,
             'duration' => $this->duration,
             'quantity' => $this->quantity,
             'user_id' => auth()->user()->id,
        ]);
        session()->flash('message', $this->plan_id ? 'Data updated.' : 'Data created.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }
    public function edit($id)
    {
           $this->authorize('manage admin');
        $plans = Plan::findOrFail($id);
        $this->plan_id = $id;
        $this->plan = $plans->plan;
        $this->plan_description = $plans->plan_description;
        $this->pricing = $plans->pricing;
        $this->position = $plans->position;
         $this->duration = $plans->duration;
          $this->quantity = $plans->quantity;
    
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
         $this->authorize('manage admin');
        Plan::find($id)->delete();
       
    }
}
