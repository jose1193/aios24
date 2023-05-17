<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Province;
use App\Models\Country;
use App\Models\CommunityProvince;
use App\Models\City;
use Livewire\WithPagination;
use Carbon\Carbon;

class Cities extends Component
{
   protected $cities;

    public $showingDataModal = false;
    public $isEditMode = false;
    public $city_description,$community_id;
    public $citiesId;
    

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
        $this->loadCities();
    }

    // Cargar Datos
    public function loadCities()
    {
         $this->authorize('manage admin');
        $this->cities = City::paginate(10); // Cambia el número de elementos por página según tus necesidades
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
        $cities = City::find($id);
        $this->city_description = $cities->city_description;
        $this->community_id = $cities->community_id;
        $this->citiesId = $cities->id;
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
        $this->city_description = '';
         $this->community_id = '';
        $this->citiesId = null;
        $this->isEditMode = false;
    }

    // Crear nuevo registro
    public function storeData()
    {
         $this->authorize('manage admin');
        $validatedData = $this->validate([
            'city_description' => 'required|unique:cities|min:1|max:30',
             'community_id' => 'required|max:30'
        ]);

        City::create($validatedData);

        $this->closeModal();
        $this->loadCities();
    }

    // Actualizar datos
    public function updateData()
    {
         $this->authorize('manage admin');
        $validatedData = $this->validate([
            'city_description' => 'required|unique:cities,city_description,' . $this->citiesId,
            'community_id' => 'required|min:1|max:30',
        ]);

        $cities = City::find($this->citiesId);
        $cities->update($validatedData);

        $this->closeModal();
        $this->loadCities();
    }

    // Eliminar datos
    public function delete(City $cities)
    {
         $this->authorize('manage admin');
        $cities->delete();
         
        $this->loadCities();
    }

    // Render 
    public function render()
    {
         $this->authorize('manage admin');
       
    $cities = City::join('community_provinces', 'cities.community_id', '=', 'community_provinces.id')
      ->join('provinces', 'provinces.id', '=', 'community_provinces.province_id')
    ->join('countries', 'countries.id', '=', 'provinces.country_id')
    ->select('cities.*', 'provinces.name', 'countries.country', 'community_provinces.description')
    ->where('cities.city_description', 'like', '%' . $this->search . '%')
    ->orderBy('cities.id', 'ASC')
    ->paginate(10);


     $community_provinces = CommunityProvince::all();
     
     return view('livewire.cities', [
        'community_provinces' => $community_provinces,
        'cities' => $cities,
    ]);
    }

    
}

