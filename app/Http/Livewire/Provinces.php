<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Province;
use App\Models\Country;
use Livewire\WithPagination;
use Carbon\Carbon;

class Provinces extends Component
{
   protected $provinces;

    public $showingDataModal = false;
    public $isEditMode = false;
    public $name,$country_id;
    public $provinceId;
    

    public $search = '';
    protected $listeners = ['render','delete']; 
    
    
    public function authorize()
{
    return true;
}

    // Cargar los datos iniciales
    public function mount()
    {
         $this->authorize('manage admin');
        $this->loadProvinces();
    }

    // Cargar provincias
    public function loadProvinces()
    {
         $this->authorize('manage admin');
        $this->provinces = Province::paginate(10); // Cambia el número de elementos por página según tus necesidades
    }

    // Mostrar el modal para crear o editar datos
    public function showDataModal()
    {
         $this->authorize('manage admin');
        $this->resetForm();
        $this->showingDataModal = true;
    }

    // Mostrar el modal para editar datos
    public function showEditDataModal($id)
    {
         $this->authorize('manage admin');
        $this->resetForm();
        $province = Province::find($id);
        $this->name = $province->name;
        $this->country_id = $province->country_id;
        $this->provinceId = $province->id;
        $this->isEditMode = true;
        $this->showingDataModal = true;
    }

    // Cerrar el modal
    public function closeModal()
    {
        $this->showingDataModal = false;
    }

    // Resetear el formulario
    public function resetForm()
    {
        $this->name = '';
         $this->country_id = '';
        $this->provinceId = null;
        $this->isEditMode = false;
    }

    // Crear nueva provincia
    public function storeData()
    {
         $this->authorize('manage admin');
        $validatedData = $this->validate([
            'name' => 'required|unique:provinces|min:3|max:30',
             'country_id' => 'required|max:30'
        ]);

        Province::create($validatedData);

        $this->closeModal();
        $this->loadProvinces();
    }

    // Actualizar provincia
    public function updateData()
    {
         $this->authorize('manage admin');
        $validatedData = $this->validate([
            'name' => 'required|unique:provinces,name,' . $this->provinceId,
            'country_id' => 'required|min:1|max:30',
        ]);

        $province = Province::find($this->provinceId);
        $province->update($validatedData);

        $this->closeModal();
        $this->loadProvinces();
    }

    // Eliminar provincia
    public function delete(Province $province)
    {
         $this->authorize('manage admin');
        $province->delete();
         
        $this->loadProvinces();
    }

    // Render 
    public function render()
    {
         $this->authorize('manage admin');
       $provinces = Province::join('countries', 'provinces.country_id', '=', 'countries.id')
    ->where('provinces.name', 'like', '%'.$this->search.'%')
    ->orderBy('provinces.id', 'ASC')
    ->paginate(10);

     $countries = Country::all();
     
     return view('livewire.provinces', [
        'provinces' => $provinces,
        'countries' => $countries,
    ]);
    }
}
