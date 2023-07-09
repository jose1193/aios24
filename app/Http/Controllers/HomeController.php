<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Plan;

use Carbon\Carbon;

use Artesaos\SEOTools\Facades\SEOTools;

use Artesaos\SEOTools\Facades\SEOMeta;

class HomeController extends Controller
{
    
    public function redirectUser(){
        if(auth()->user()->hasRole('admin')){
            return redirect()->route('admin.dashboard');
        }

        if(auth()->user()->hasRole('user')){
            return redirect()->route('user.dashboard');
        }

    }

     public function __invoke()
    {
        return view ('welcome');
    }

     public function about()
    {
        return view('livewire.about');
    }

     public function terms()
    {
        return view('livewire.terms');
    }

     public function privacy()
    {
        return view('livewire.privacy');
    }

    public function cookie()
    {
        return view('livewire.cookie');
    }

    public function faq()
    {
        return view('livewire.faq');
    }

     public function solutions()
    {
        return view('livewire.solutions');
    }

     public function exposition()
    {
        return view('livewire.exposition');
    }
    
public $plans;
     public function prices()
    {
        
         $this->plans = Plan::all();
        return view('livewire.prices',[
        'plans' => $this->plans
    ]);
    }

    public $posts;
    
   public function ShowPost($postTitle)
{
   $this->posts = Post::where('post_title_slug', $postTitle)->firstOrFail();
    $this->posts->post_date = Carbon::parse($this->posts->created_at)->format('F d, Y');
        
// OR use single only SEOTools

        SEOTools::setTitle($this->posts->meta_title);
       
        SEOTools::setDescription($this->posts->meta_description);
        SEOTools::opengraph()->setUrl('https://aiosrealestate.com/');
        SEOTools::setCanonical('https://aiosrealestate.com');
        SEOTools::opengraph()->addProperty('type', 'articles');
       
        SEOTools::jsonLd()->addImage('https://www.aiosrealestate.com/img/logo.jpg');
SEOMeta::addKeyword($this->posts->meta_keywords);
SEOMeta::addMeta('article:published_time', $this->posts->post_date = Carbon::parse($this->posts->created_at)->format('F d, Y'), 'property');
// OR use single only SEOTools



   return view('livewire.show-posts', ['posts' => $this->posts]);
}

}