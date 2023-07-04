<?php

namespace App\Http\Livewire;

use Livewire\Component;
// OR use only single facades
use Artesaos\SEOTools\Facades\SEOTools;

use Artesaos\SEOTools\Facades\SEOMeta;
class Tags extends Component
{
    public function render()
    {
        // OR use single only SEOTools

        SEOTools::setTitle('AIOS Real Estate | Home');
       
        SEOTools::setDescription('Anuncia tu propiedad de manera gratuita, beneficiándote de los mejores resultados. Obtén el máximo provecho sin costo alguno, alcanzando tus objetivos con facilidad.');
        SEOTools::opengraph()->setUrl('https://aiosrealestate.com/');
        SEOTools::setCanonical('https://aiosrealestate.com');
        SEOTools::opengraph()->addProperty('type', 'articles');
       
        SEOTools::jsonLd()->addImage('https://www.aiosrealestate.com/img/logo.jpg');
SEOMeta::addKeyword(['Explora nuestras propiedades',

    'encuentra la propiedad perfecta',
    'filtro por zona y otros criterios',
    'Anuncia tu propiedad de manera gratuita',
    
    'obtén los mejores resultados',
    'alcanza tus objetivos fácilmente']);

        return view('livewire.tags');
    }
}
