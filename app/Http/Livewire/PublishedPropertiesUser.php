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


class PublishedPropertiesUser extends Component
{
    public $search = '';
    protected $listeners = ['render','delete']; 

    public function render()
    {

$properties = PublishProperty::join('users', 'publish_properties.user_id', '=', 'users.id')
    ->join('estatus_ads', 'publish_properties.status', '=', 'estatus_ads.id')
    ->join('premium_plans', 'premium_plans.user_id', '=', 'users.id') // Relación con premium_plans basada en el user_id
    ->join('plans', 'plans.id', '=', 'premium_plans.plan_id') // Relación con plans basada en el plan_id de premium_plans
    ->select('publish_properties.*', 'users.name', 'estatus_ads.estatus_description', 'plans.plan')
    ->whereRaw("LOWER(publish_properties.title) LIKE '%" . mb_strtolower($this->search, 'UTF-8') . "%' COLLATE utf8mb4_unicode_ci")
    ->where('users.id', '=', auth()->user()->id)
    ->orderBy('publish_properties.created_at', 'desc')
    ->paginate(10);


        return view('livewire.published-properties-user',['properties' => $properties]);
    }
}
