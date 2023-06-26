<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Province;
use App\Models\CommunityProvince;
use App\Models\City;

class ThreeLevelSelect extends Component
{
    public $provinceId;
    public $communityProvinceId; // Renombrado desde $community_id
    public $cityId;

    public $provinces;
    public $communityProvinces;
    public $cities;

    public function mount()
    {
        $this->provinces = Province::all();
        $this->loadCommunityProvinces();
        $this->loadCities();
    }

    public function loadCommunityProvinces()
    {
        if ($this->provinceId) {
            $this->communityProvinces = CommunityProvince::where('province_id', $this->provinceId)->get();
        } else {
            $this->communityProvinces = [];
        }

        $this->resetCity();
    }

    public function loadCities()
    {
        if ($this->communityProvinceId) {
            $this->cities = City::where('community_province_id', $this->communityProvinceId)->get(); // Cambiado desde 'community_id'
        } else {
            $this->cities = [];
        }
    }

    public function resetCity()
    {
        $this->cityId = null;
        $this->loadCities();
    }

    public function render()
    {
        return view('livewire.three-level-select');
    }
}
