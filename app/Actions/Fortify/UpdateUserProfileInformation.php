<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:30'],
            'lastname' => ['required', 'string', 'max:30'],
             'dni' => ['required', 'string', 'max:20'],
             'phone' => ['required', 'string', 'max:30'],
              'address' => ['required', 'string', 'max:255'],
               'city' => ['required', 'string', 'max:30'],
                'province' => ['required', 'string', 'max:30'],
                'zipcode' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                 'lastname' => $input['lastname'],
                  'dni' => $input['dni'],
                   'phone' => $input['phone'],
                   'address' => $input['address'],
                   'city' => $input['city'],
                    'city' => $input['city'],
                'province' => $input['province'],
                'zipcode' => $input['zipcode'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'lastname' => $input['lastname'],
             'dni' => $input['dni'],
              'phone' => $input['phone'],
              'address' => $input['address'],
               'city' => $input['city'],
               'province' => $input['province'],
               'zipcode' => $input['zipcode'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
