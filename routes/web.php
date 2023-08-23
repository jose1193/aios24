<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminDashboardController;

// LARAVEL CHATIFY
use Chatify\Http\Controllers\MessagesController;
use Chatify\Http\Controllers\ChatifyController;
// LARAVEL SOCIALITE
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
//use App\Http\Controllers\StripeController;

/*
|--------------------------------------------------------------------------
|   START LIVEWIRE CONTROLLERS
|--------------------------------------------------------------------------
*/
use App\Http\Livewire\Plans;
use App\Http\Livewire\Users;
use App\Http\Livewire\Transactions;
use App\Http\Livewire\Properties;
use App\Http\Livewire\Contactforms;
use App\Http\Livewire\Emailadmin;
use App\Http\Livewire\Buckets;
use App\Http\Livewire\Countries;
use App\Http\Livewire\Provinces;
use App\Http\Livewire\Communityprovinces;
use App\Http\Livewire\Cities;
use App\Http\Livewire\EstatusAnuncios;
use App\Http\Livewire\Posts;
use App\Http\Livewire\LatestPosts;
use App\Http\Livewire\ShowPosts;
use App\Http\Livewire\PublishedPropertiesUser;
use App\Http\Livewire\StripePayment;
use App\Http\Livewire\MyPlans;
use App\Http\Livewire\Wizard;
use App\Http\Livewire\Views;
use App\Http\Livewire\Favorites;
use App\Http\Livewire\ShowFavorites;
use App\Http\Livewire\SearchFilters;
use App\Http\Livewire\SearchForm;

use App\Http\Livewire\PublishProperties;
use App\Http\Livewire\NotificationsMessages;

use App\Http\Livewire\Suscriptions;
use App\Http\Livewire\PremiumPlans;
use App\Http\Livewire\MyRenewalPlans;
use App\Http\Livewire\UsersRenewalPlans;
use App\Http\Livewire\PurchasedPlansUsers;


use App\Http\Livewire\EmailController;
use App\Http\Livewire\ThreeLevelSelect;

use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
})->name('welcome');


///------------- ROUTE GOOGLE AUTH ---------///
Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});
 
Route::get('/google-auth/callback', function () {
    $socialiteUser = Socialite::driver('google')->user();
  $user = User::where('email', $socialiteUser->email)->first();
  if (!$user) {
        // Si el usuario no existe en la base de datos, puedes crear uno nuevo
        $user = new User();
        $user->name = $socialiteUser->name;
        $user->email = $socialiteUser->email;
         $user->google_id = $socialiteUser->id;
         $user->lastname = null; // Establecer el valor de lastname como null
         $user->dni = null; 
          $user->phone = null; 
         $user->address = null; 
          $user->city = null; 
            $user->province = null; 
             $user->zipcode = null; 
        // Aquí puedes asignar cualquier otro atributo necesario

        $user->save();
    }

    // Accede al token del usuario autenticado
    $token = $socialiteUser->token;

   // Iniciar sesión al usuario
    Auth::login($user);

    // Redirigir al dashboard u otra página
    return redirect('/dashboard');
    // $user->token
});

///------------- END ROUTE GOOGLE AUTH ---------///
/*
|--------------------------------------------------------------------------
|   START GUEST USER ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', HomeController::class)->name('home');
Route::get('about', [HomeController::class, 'about'])->name('about');

Route::get('terms', [HomeController::class, 'terms'])->name('terms');
Route::get('privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('cookie', [HomeController::class, 'cookie'])->name('cookie');
Route::get('faq', [HomeController::class, 'faq'])->name('faq');
Route::get('solutions', [HomeController::class, 'solutions'])->name('solutions');

Route::get('exposition', [HomeController::class, 'exposition'])->name('exposition');
Route::get('pricing', [HomeController::class, 'prices'])->name('prices');

// LARAVEL REQUEST CONTACT FORM
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.store');
// LARAVEL REQUEST CONTACT FORM

Route::get('/posts/{postTitle}', [HomeController::class, 'ShowPost'])->name('showpost');

Route::get('blog',[Posts::class,'renderPost'])->name('blog');
//Route::get('/posts/{id}', [Posts::class, 'showPost'])->name('showpost');
Route::get('latestposts', LatestPosts::class)->name('latestposts');

Route::get('/views/{publishCode}',[Views::class, 'ShowViews'])->name('views');




Route::get('search-filters', [SearchForm::class, 'filters'])->name('search.filters');


Route::post('search-filters-update', [SearchForm::class, 'searchFilterUpdate'])->name('search.filters.update');

Route::get('map-view/{searchTerm}', [SearchForm::class, 'MapView'])->name('map.view');

Route::post('/send-message', [NotificationsMessages::class, 'sendMessage'])->name('send-message');
Route::post('/send-message-guest', [NotificationsMessages::class, 'sendMessageGuest'])->name('send-message-guest');

Route::post('suscriptions', [Suscriptions::class, 'storeSuscriptions'])->name('email.suscriptions');

Route::get('select', ThreeLevelSelect::class)->name('select');



/* -------------------------------------END GUEST USER ROUTES ------------------------------*/




/*
|--------------------------------------------------------------------------
|   START AUTH USER ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard',[HomeController::class,'redirectUser'])->name('dashboard');
});


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


 Route::get('users', Users::class)->name('users');
Route::post('users-date', [Users::class, 'submit'])->name('users-dates');

  Route::get('plans', Plans::class)->name('plans');
 Route::get('transactions', Transactions::class)->name('transactions');
 Route::get('properties', Properties::class)->name('properties');
 Route::get('contactforms', Contactforms::class)->name('contactforms');
  Route::get('emailadmin', Emailadmin::class)->name('emailadmin');
  Route::get('buckets', Buckets::class)->name('buckets');
  Route::get('countries', Countries::class)->name('countries');
    Route::get('provinces', Provinces::class)->name('provinces');
    Route::get('communities', Communityprovinces::class)->name('communities');
     Route::get('cities', Cities::class)->name('cities');
     Route::get('estatus', EstatusAnuncios::class)->name('estatus');
     Route::get('posts', Posts::class)->name('posts');
   
Route::get('published', PublishedPropertiesUser::class)->name('published');

//------------ STRIPE PAYMENT -----------//
Route::get('choose-plan/{publishCode}', StripePayment::class)->name('choose-plan');
Route::get('/checkout/{publishCode}', [StripePayment::class, 'checkout'])->name('checkout');
Route::post('/session', [StripePayment::class, 'session'])->name('session');
Route::get('/success', [StripePayment::class, 'success'])->name('success');
Route::post('/Renewsession', [StripePayment::class, 'Renewsession'])->name('Renewsession');
Route::get('/success-renovation', [StripePayment::class, 'successRenovation'])->name('success-renovation');
//------------ STRIPE PAYMENT -----------//




//Route::get('publish', Wizard::class)->name('publish');
Route::get('select-plan', PremiumPlans::class)->name('select-plan');
Route::post('store-plan', [PremiumPlans::class, 'storePlan'])->name('store-plan');
Route::get('myplans', [PremiumPlans::class, 'Myplans'])->name('myplans');
Route::get('renew-premium/{planId}', [PremiumPlans::class, 'renewPremium'])->name('renew-premium');
Route::post('/delete-plans', [PremiumPlans::class, 'deletePlans']);

Route::get('my-renewals-plans', MyRenewalPlans::class)->name('my-renewals-plans');
Route::get('users-renewals-plans', UsersRenewalPlans::class)->name('users-renewals-plans');

Route::get('publish', PublishProperties::class)->name('publish');
Route::post('publish', [PublishProperties::class, 'saveProperty'])->name('publish.saveProperty');
Route::post('uploadFiles', [PublishProperties::class, 'uploadFiles'])->name('uploadFiles');
Route::post('deleteFile', [PublishProperties::class, 'deleteFile'])->name('deleteFile');

Route::get('upload-images/{publishCode}',[PublishProperties::class, 'ShowAddFilesPublish'])->name('upload-images');


Route::get('images-gallery/{publishCodeImages}',[PublishProperties::class, 'viewImages'])->name('images-gallery');
Route::post('add-images-gallery/{publishCodeImages}', [PublishProperties::class, 'addImages'])->name('add.images');
Route::get('edit-property/{publishCode}', [PublishProperties::class, 'editProperty'])->name('edit-property');
Route::put('update-property/{publishCode}', [PublishProperties::class, 'update'])->name('publishproperties.update');
Route::delete('/delete-feature/{featureId}', [PublishProperties::class, 'deleteFeature']);
Route::delete('/delete-equipment/{equipmentId}', [PublishProperties::class, 'deleteEquipment']);

Route::post('/delete-images', [PublishProperties::class, 'deleteImages']);
Route::post('/check-title', [PublishProperties::class, 'checkTitle']);
Route::post('/check-title-update', [PublishProperties::class, 'checkTitleUpdate']);
Route::post('/delete-properties', [PublishProperties::class, 'deleteProperties']);

Route::post('/update-image-order', [PublishProperties::class, 'updateImageOrder'])->name('update-image-order');


Route::get('purchased-plans-users', PurchasedPlansUsers::class)->name('purchased-plans-users');

//------------ FAVORITES -----------//
//Route::get('/favorites/{propertyId?}', Favorites::class)->name('favorites');
Route::get('/favorites/{propertyId}', Favorites::class)->name('favorites');
Route::get('/favorites-cards/{propertyId}', Favorites::class)->name('favorites-cards');
Route::get('show-favorites', ShowFavorites::class)->name('show-favorites');
//------------ FAVORITES -----------//



});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:user'])->group(function () {
    Route::get('/home', function () {
        return view('dashboard');
    })->name('user.dashboard');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','role:admin'])
->group(function () {

    // admin routes

    Route::get('/admin/dashboard',[AdminDashboardController::class,'dashboard'])
            ->name('admin.dashboard');

});

//------------ CHATIFY -----------//
Route::prefix('chatify')->middleware('auth')->group(function () {
    Route::get('/messages', [ChatifyController::class, 'index'])->name('chatify.index');
   Route::get('/{id}', [MessagesController::class, 'index'])->name('chatify.name');
    Route::get('/fetch', [ChatifyController::class, 'fetchContacts']);
    Route::get('/conversations/{id}', [ChatifyController::class, 'fetchMessages']);
    Route::post('/send', [ChatifyController::class, 'sendMessage']);
    Route::post('/typing', [ChatifyController::class, 'typing']);
    Route::get('/user/{id}', [ChatifyController::class, 'getUser']);
    Route::post('/update-info', [ChatifyController::class, 'updateInfo']);
    Route::post('/search', [ChatifyController::class, 'search']);
});
//------------ CHATIFY -----------//

  
