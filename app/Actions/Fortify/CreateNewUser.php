<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:20'],
            'lastname' => ['required', 'string', 'max:20'],
            'dni' => ['required', 'string', 'max:20'],
             'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:60', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
             //'city' => ['required', 'string', 'max:30'],
              //'province' => ['required', 'string', 'max:30'],
              // 'zipcode' => ['required', 'string', 'max:20'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
             'lastname' => $input['lastname'],
             'dni' => $input['dni'],
             'phone' => $input['phone'],
            'email' => $input['email'],
            'address' => $input['address'],
           'city' => $input['city'],
           // 'province' => $input['province'],
            // 'zipcode' => $input['zipcode'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
