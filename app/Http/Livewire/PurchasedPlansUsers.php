<?php

namespace App\Http\Livewire;

use App\Models\PublishProperty;
use App\Models\PropertyImage;
use App\Models\User;
use App\Models\EstatusAds;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PurchasedPlansUsers extends Component
{
    use WithPagination;
     public $search = '';
     public function authorize()
{
    return true;
}

   
    
    public function render()
    {
  $this->authorize('manage admin');
$properties = PublishProperty::join('users', 'publish_properties.user_id', '=', 'users.id')
    ->join('estatus_ads', 'publish_properties.status', '=', 'estatus_ads.id')
    ->join('premium_plans', 'premium_plans.user_id', '=', 'users.id') 
    ->join('plans', 'plans.id', '=', 'premium_plans.plan_id') 
    ->select('publish_properties.*', 'users.name', 'estatus_ads.estatus_description', 'plans.plan')
    ->whereRaw("LOWER(publish_properties.title) LIKE '%" . mb_strtolower($this->search, 'UTF-8') . "%' COLLATE utf8mb4_unicode_ci")
    ->orderBy('publish_properties.created_at', 'desc')
    ->paginate(10);
        return view('livewire.purchased-plans-users', [
        'properties' => $properties]);

       
    }
}
