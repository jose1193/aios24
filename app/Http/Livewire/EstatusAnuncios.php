<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\EstatusAds;

class EstatusAnuncios extends Component
{
     use WithPagination;
    protected $estatusAds;

    public $search = '';
    protected $listeners = ['render','delete']; 
public $showingDataModal = false;
public $isEditMode = false;
public $estatus_description;
public $estatusAdsId;

  public function authorize()
{
    return true;
}

public function mount()
{
           $this->authorize('manage admin');
    $this->loadEstatusAds();
}

public function loadEstatusAds()
{
    $this->estatusAds = EstatusAds::paginate(10);
}

public function showDataModal()
{
    $this->resetForm();
    $this->showingDataModal = true;
}

public function showEditDataModal($id)
{
           $this->authorize('manage admin');
    $estatusAds = EstatusAds::find($id);
    $this->estatus_description = $estatusAds->estatus_description;
    $this->estatusAdsId = $estatusAds->id;
    $this->isEditMode = true;
    $this->showingDataModal = true;
}

public function closeModal()
{
    $this->showingDataModal = false;
}

public function resetForm()
{
           $this->authorize('manage admin');
    $this->estatus_description = '';
    $this->estatusAdsId = null;
    $this->isEditMode = false;
}

public function storeData()
{
           $this->authorize('manage admin');
    $validatedData = $this->validate([
        'estatus_description' => 'required|unique:estatus_ads|min:4|max:30',
        
    ]);

    EstatusAds::create([
        'estatus_description' => $this->estatus_description,
        'user_id' => auth()->user()->id,
    ]);

   

    $this->closeModal();
    $this->loadEstatusAds();
}

public function updateData()
{
           $this->authorize('manage admin');
    $validatedData = $this->validate([
        'estatus_description' => 'required|unique:estatus_ads,estatus_description,' . $this->estatusAdsId,
        'user_id' => 'required',
    ]);

    $estatusAds = EstatusAds::find($this->estatusAdsId);
    $estatusAds->update($validatedData);

    $this->closeModal();
    $this->loadEstatusAds();
}

public function delete(EstatusAds $estatusAds)
{
           $this->authorize('manage admin');
    $estatusAds->delete();

    $this->loadEstatusAds();
}
public function render()
{
    $estatus = EstatusAds::where('estatus_description', 'like', '%' . $this->search . '%')->paginate(10);

    return view('livewire.estatus-anuncios', [
        'estatus' => $estatus]);
}



   
}
