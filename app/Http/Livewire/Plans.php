<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Plan;

class Plans extends Component
{
       
    public $plan, $pricing, $position, $duration, $quantity,$plan_id;
    public $isModalOpen = 0;
    protected $listeners = ['render','delete']; // ALERT CONFIRMATION SWEET ALERT

    public function render()
    {
       
        $this->plans = Plan::all();
        return view('livewire.plans');
    }
    public function create()
    {
         $this->authorize('manage plans');
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
        $this->pricing = '';
        $this->position = '';
        $this->duration = '';
         $this->quantity = '';
    }
    
    public function store()
    {
         $this->authorize('manage plans');
        $this->validate([
            'plan' => 'required',
            'pricing' => 'required',
            'position' => 'required',
            'duration' => 'required',
            'quantity' => 'required',
        ]);
    
        Plan::updateOrCreate(['id' => $this->plan_id], [
            'plan' => $this->plan,
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
         $this->authorize('manage plans');
        $plans = Plan::findOrFail($id);
        $this->plan_id = $id;
        $this->plan = $plans->plan;
        $this->pricing = $plans->pricing;
        $this->position = $plans->position;
         $this->duration = $plans->duration;
          $this->quantity = $plans->quantity;
    
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
         $this->authorize('manage plans');
        Plan::find($id)->delete();
       
    }
}
