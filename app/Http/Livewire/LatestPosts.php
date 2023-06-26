<?php

namespace App\Http\Livewire;
use App\Models\Post;
use Livewire\Component;
use Carbon\Carbon;

class LatestPosts extends Component
{
    public function render()
    {
          

      $posts = Post::latest()
    ->orderBy('created_at', 'desc')
    ->limit(4)
    ->get();
    // Convertir el campo post_date al nuevo formato deseado
        foreach ($posts as $post) {
            $post->post_date = Carbon::parse($post->created_at)->format('F d, Y');
        }

        return view('livewire.latest-posts',['posts' => $posts]);
    }
}
