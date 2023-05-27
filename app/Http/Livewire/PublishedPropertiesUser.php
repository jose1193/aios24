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
      $properties = PublishProperty::join('property_images', 'publish_properties.id', '=', 'property_images.property_id')
    ->join('users', 'publish_properties.user_id', '=', 'users.id')
    ->join('estatus_ads', 'publish_properties.status', '=', 'estatus_ads.id')
    ->select('publish_properties.*', DB::raw('MAX(property_images.image_path) as image_path'), 'users.name','estatus_ads.estatus_description')
    ->whereRaw("LOWER(publish_properties.title) LIKE '%".mb_strtolower($this->search, 'UTF-8')."%' COLLATE utf8mb4_unicode_ci")
    ->orderBy('publish_properties.created_at', 'desc')
    ->groupBy('publish_properties.id')
    ->paginate(10);



        return view('livewire.published-properties-user',['properties' => $properties]);
    }
}
