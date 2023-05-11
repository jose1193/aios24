<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}