<?php

namespace App\Http\Livewire;
use App\Models\Bucket;
use App\Models\AdminEmail;
use Livewire\Component;

class BucketComponent extends Component
{
     public function render()
    {
        $buckets = Bucket::all();
 $emailAdmin = AdminEmail::orderBy('email', 'desc')->limit(1)->pluck('email')->first();
        return view('livewire.bucket-component', [
            'buckets' => $buckets,'emailAdmin' => $emailAdmin
        ]);
    }
}
