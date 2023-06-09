<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Category;
use App\Models\Property;
use App\Models\Transaction;
use App\Models\EstatusAds;
use App\Models\Plan;
use App\Models\Bucket;
use App\Models\Country;
use App\Models\Province;
use App\Models\CommunityProvince;
use App\Models\City;
use App\Models\AdminEmail;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
   public function run()
    {
        // \App\Models\User::factory(10)->create();
        $admin_role = Role::create(['name' => 'admin']);
        
$permissions = [
    //Permission::create(['name' => 'manage plans']),
    Permission::create(['name' => 'manage users']),
    //Permission::create(['name' => 'manage transactions']),
    //Permission::create(['name' => 'manage properties']),
   // Permission::create(['name' => 'manage contactform']),
    Permission::create(['name' => 'manage admin']),
];
       
foreach ($permissions as $permission) {
    $admin_role->givePermissionTo($permission);
}
        
        $admin = User::create([
            'name' => 'Admin',
             'lastname' => 'Admin',
             'dni' => '00000',
             'phone' => '00000',
            'email' => 'aiosrealestate2023@gmail.com',
            'address' => 'my address',
             'city' => 'my city',
            'province' => 'my province',
            'zipcode' => 'my zipcode',
            'password' => bcrypt('aios2023=')
        ]);

        $admin->assignRole($admin_role);



        $user_role = Role::create(['name' => 'user']);
        $user = User::create([
            'name' => 'user',
            'lastname' => 'user',
            'dni' => '00000',
            'phone' => '00000',
            'email' => 'argenis692@gmail.com',
            'address' => 'my address',
            'city' => 'my city',
            'province' => 'my province',
            'zipcode' => 'my zipcode',
            'password' => bcrypt('password')
        ]);

        $user->assignRole($user_role);

        // $permission = Permission::create(['name' => 'edit articles']);

        Category::create([
            'category_name' => 'Blog',
            'description' => 'Valor por defecto',
            'image' => 'Valor por defecto',
            'user_id' => 1,
        ]);


        /// PROPERTY TYPE
        $user = User::first(); // Obtén el usuario que deseas asociar a las propiedades
    
    $propertyTypes = [
        
        'Pisos',
        'Casas',
        'Habitación',
        'Terreno',
        'Garajes',
        'Oficinas',
        'Locales',
        'Terrenos',
        'Bodega/Galpón',
        'Depósito',
        'Todos'
    ];

    foreach ($propertyTypes as $type) {
        Property::create([
            'property_description' => $type,
            'user_id' => $user->id,
        ]);
    }

    // MODELO TRANSACTIONS
    $transactionTypes = [
    'Alquiler',
    'Venta',
    'Compartir',
];


    foreach ($transactionTypes as $key => $value) {
         Transaction::create([
            'transaction_description' => $value,
            'user_id' => $user->id,
        ]);
    }

    // MODELO ESTATUS ANUNCIOS
    $estatusAds = [
        'Activo',
        'Inactivo',
        'Vendido',
        'Reservado',
        // Agrega más valores aquí si es necesario
    ];

    foreach ($estatusAds as $estatus) {
        EstatusAds::create([
            'estatus_description' => $estatus,
            'user_id' => $user->id,
        ]);
    }
        
     // MODELO PLAN 
    $plans = [
        [
            'plan' => 'Free',
            'plan_description' => 'Visibilidad Estándar para la publicación de anuncios. Tus anuncios se mostrarán a un amplio público en línea.',
            'pricing' => 0,
            'position' => 'Exposición Estandar',
            'duration' => 'Duración de Publicación 60 días',
            'quantity' => 'Máximo 20 Imágenes',
        ],
        [
            'plan' => 'Oro',
            'plan_description' => 'Visibilidad Premium para la publicación de anuncios. Tus anuncios serán destacados y ubicados en los primeros lugares en la página de resultados de búsqueda.',
            'pricing' => 19,
            'position' => 'Exposición Destacada',
            'duration' => 'Duración de Publicación 120 días',
            'quantity' => '+15 Imágenes Adicionales',
        ],
        [
            'plan' => 'Platino',
            'plan_description' => 'Visibilidad Máxima para la publicación de anuncios. Tus anuncios recibirán máxima exposición y preferencia, garantizando la mayor visibilidad y alcance.',
            'pricing' => 29,
            'position' => 'Exposición Destacada',
            'duration' => 'Duración de Publicación 180 días',
            'quantity' => '+25 Imágenes Adicionales',
        ],
    ];

    foreach ($plans as $plan) {
        Plan::create([
            'plan' => $plan['plan'],
            'plan_description' => $plan['plan_description'],
            'pricing' => $plan['pricing'],
            'position' => $plan['position'],
            'duration' => $plan['duration'],
            'quantity' => $plan['quantity'],
            'user_id' => $user->id,
        ]);
    }

    
        // MODELO BUCKET
        
        Bucket::create([
        'description' => 'Aios Real Estate',
        'country' => 'España',
        'community' => 'Gran Canaria',
        'city' => 'Las Palmas de Gran Canaria',
        'address' => 'Dirección 1',
        'user_id' => $user->id,
    ]);

    // MODELO COUNTRY
        
        Country::create([
        'country' => 'España',
        'user_id' => $user->id,
    ]);

    // PROVINCES 

$country = Country::first(); // Obtén el primer país registrado
    $provinces = [
        'Las Palmas',
        'Santa Cruz de Tenerife',
        // Agrega más provincias si es necesario
    ];

    foreach ($provinces as $province) {
        Province::create([
            'name' => $province,
            'country_id' => $country->id,
            
        ]);
    }



    // COMMUNITY PROVINCES

    // Obtén las provincias correspondientes
    $provinceLasPalmas = Province::where('name', 'Las Palmas')->first();
    $provinceSantaCruz = Province::where('name', 'Santa Cruz de Tenerife')->first();

    $communityLasPalmas = [
        'Gran Canaria',
        'Fuerteventura',
        'Lanzarote',
        'La Graciosa',
        // Agrega más comunidades si es necesario
    ];

    $communitySantaCruz = [
        'Tenerife',
        'La Palma',
        'La Gomera',
        'El Hierro',
        // Agrega más comunidades si es necesario
    ];

    foreach ($communityLasPalmas as $community) {
        CommunityProvince::create([
            'description' => $community,
            'province_id' => $provinceLasPalmas->id,
        ]);
    }

    foreach ($communitySantaCruz as $community) {
        CommunityProvince::create([
            'description' => $community,
            'province_id' => $provinceSantaCruz->id,
        ]);
    }


// MODELO CITY

 // comunidades correspondientes
    $communityGranCanaria = CommunityProvince::where('description', 'Gran Canaria')->first();
    $communityFuerteventura = CommunityProvince::where('description', 'Fuerteventura')->first();
    $communityLanzarote = CommunityProvince::where('description', 'Lanzarote')->first();
    $communityLaGraciosa = CommunityProvince::where('description', 'La Graciosa')->first();
    
    $communityTenerife = CommunityProvince::where('description', 'Tenerife')->first();
    $communityLaPalma = CommunityProvince::where('description', 'La Palma')->first();
    $communityLaGomera = CommunityProvince::where('description', 'La Gomera')->first();
    $communityElHierro = CommunityProvince::where('description', 'El Hierro')->first();

    $citiesGranCanaria = [
        'Las Palmas de Gran Canaria',
        'Telde',
        'Santa Lucía de Tirajana',
        'San Bartolomé de Tirajana',
        'Maspalomas',
        'Arucas',
        // Agrega más ciudades si es necesario
    ];

    $citiesFuerteventura = [
        'Puerto del Rosario',
        'Corralejo',
        'Morro Jable',
        'Gran Tarajal',
        // Agrega más ciudades si es necesario
    ];

    $citiesLanzarote = [
        'Arrecife',
        'Playa Blanca',
        'Costa Teguise',
        'Puerto del Carmen',
        // Agrega más ciudades si es necesario
    ];

    $citiesLaGraciosa = [
        'Caleta del Sebo',
    ];
    
    $citiesTenerife = [
        'Santa Cruz de Tenerife',
        'San Cristóbal de La Laguna',
        'Puerto de la Cruz',
        'Arona',
        'Adeje',
        // Agrega más ciudades si es necesario
    ];

    $citiesLaPalma = [
        'Santa Cruz de la Palma',
        'Los Llanos de Aridane',
        'El Paso',
        'Tazacorte',
        // Agrega más ciudades si es necesario
    ];

    $citiesLaGomera = [
        'San Sebastián de la Gomera',
        'Valle Gran Rey',
        'Playa de Santiago',
        'Hermigua',
        // Agrega más ciudades si es necesario
    ];

    $citiesElHierro = [
        'Valverde',
        'La Frontera',
        // Agrega más ciudades si es necesario
    ];

    foreach ($citiesGranCanaria as $city) {
        City::create([
            'city_description' => $city,
            'community_id' => $communityGranCanaria->id,
        ]);
    }

    foreach ($citiesFuerteventura as $city) {
        City::create([
            'city_description' => $city,
            'community_id' => $communityFuerteventura->id,
        ]);
    }

    foreach ($citiesLanzarote as $city) {
        City::create([
            'city_description' => $city,
            'community_id' => $communityLanzarote->id,
        ]);
    }

    foreach ($citiesLaGraciosa as $city) {
        City::create([
            'city_description' => $city,
            'community_id' => $communityLaGraciosa->id,
        ]);
    }

    foreach ($citiesTenerife as $city) {
        City::create([
            'city_description' => $city,
            'community_id' => $communityTenerife->id,
        ]);
    }

    foreach ($citiesLaPalma as $city) {
        City::create([
            'city_description' => $city,
            'community_id' => $communityLaPalma->id,
        ]);
    }

    foreach ($citiesLaGomera as $city) {
        City::create([
            'city_description' => $city,
            'community_id' => $communityLaGomera->id,
        ]);
    }

    foreach ($citiesElHierro as $city) {
        City::create([
            'city_description' => $city,
            'community_id' => $communityElHierro->id,
        ]);
    }

     // MODELO EMAIL ADMIN
        
        AdminEmail::create([
        'email' => 'aiosrealestate2023@Gmail.Com',
        'user_id' => $user->id,
    ]);

    }

   

    
}
