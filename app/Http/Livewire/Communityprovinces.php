<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Province;
use App\Models\Country;
use App\Models\CommunityProvince;
use Livewire\WithPagination;
use Carbon\Carbon;

class Communityprovinces extends Component
{
   protected $communities;

    public $showingDataModal = false;
    public $isEditMode = false;
    public $description,$province_id;
    public $communityId;
    

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
        $this->loadCommunities();
    }

    // Cargar Datos
    public function loadCommunities()
    {
         $this->authorize('manage admin');
        $this->communities = CommunityProvince::paginate(10); // Cambia el número de elementos por página según tus necesidades
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
        $community = CommunityProvince::find($id);
        $this->description = $community->description;
        $this->province_id = $community->province_id;
        $this->communityId = $community->id;
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
        $this->description = '';
         $this->province_id = '';
        $this->communityId = null;
        $this->isEditMode = false;
    }

    // Crear nueva provincia
    public function storeData()
    {
         $this->authorize('manage admin');
        $validatedData = $this->validate([
            'description' => 'required|unique:community_provinces|min:1|max:30',
             'province_id' => 'required|max:30'
        ]);

        CommunityProvince::create($validatedData);

        $this->closeModal();
        $this->loadCommunities();
    }

    // Actualizar provincia
    public function updateData()
    {
         $this->authorize('manage admin');
        $validatedData = $this->validate([
            'description' => 'required|unique:community_provinces,description,' . $this->communityId,
            'province_id' => 'required|min:1|max:30',
        ]);

        $community = CommunityProvince::find($this->communityId);
        $community->update($validatedData);

        $this->closeModal();
        $this->loadCommunities();
    }

    // Eliminar provincia
    public function delete(CommunityProvince $community)
    {
         $this->authorize('manage admin');
        $community->delete();
         
        $this->loadCommunities();
    }

    // Render 
    public function render()
    {
         $this->authorize('manage admin');
       
    $communities = CommunityProvince::join('provinces', 'community_provinces.province_id', '=', 'provinces.id')
    ->join('countries', 'countries.id', '=', 'provinces.country_id')
    ->select('community_provinces.*', 'provinces.name', 'countries.country')
    ->where('community_provinces.description', 'like', '%' . $this->search . '%')
    ->orderBy('community_provinces.id', 'ASC')
    ->paginate(10);


     $provinces = Province::all();
     
     return view('livewire.communityprovinces', [
        'provinces' => $provinces,
        'communities' => $communities,
    ]);
    }
}

