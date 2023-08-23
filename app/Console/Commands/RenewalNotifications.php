<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\PremiumPlan;
use App\Models\Bucket;
use App\Models\AdminEmail;
use App\Models\Plan;
use Carbon\Carbon;

use Illuminate\Support\Facades\Mail; // Import the Mail facade
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class RenewalNotifications extends Command
{
   
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
     protected $signature = 'notifications:renewal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send renewal notifications to users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        info("Cron Job running at " . now());

        $users = User::all();

        foreach ($users as $user) {
            $existingPlans = DB::table('premium_plans')
                ->join('users', 'premium_plans.user_id', '=', 'users.id')
                ->join('plans', 'premium_plans.plan_id', '=', 'plans.id')
                ->where('premium_plans.user_id', $user->id)
                ->whereIn('plans.id', [2, 3])
                ->select('premium_plans.*', 'users.name', 'users.email', 'plans.plan as plan_name')
                ->get();

            foreach ($existingPlans as $existingPlan) {
                $expirationDate = Carbon::parse($existingPlan->expiration_date);
                $today = Carbon::now();
                // Calcular la fecha de recordatorio (5 días antes)
    $reminderDate = $expirationDate->copy()->subDays(5);

                   if ($today->isSameDay($reminderDate)) {
                    try {
                        $bucket = Bucket::orderBy('description', 'desc')->limit(1)->first();
                        $email = $existingPlan->email;
                        $name = $existingPlan->name;
                        $planName = $existingPlan->plan_name;

                        $expirationDateFormatted = $existingPlan->expiration_date; // Formatear la fecha

                        \Mail::send('emails.NewNotificationPremiumPlanProperty', array(
                            'planName' => $planName,
                            'name' => $name,
                            'email' => $email,
                            'bucket' => $bucket->description,
                            'city' => $bucket->city,
                            'community' => $bucket->community,
                            'country' => $bucket->country,
                            'address' => $bucket->address,
                            'dateToNotify' => $expirationDateFormatted,
                        ), function ($message) use ($email) {
                            $emailAdmin = AdminEmail::orderBy('email', 'desc')->limit(1)->pluck('email')->first();

                            $message->from($emailAdmin, 'Aios Real Estate');
                            $message->to($email)->subject('Notificación de Cobro Aios Real Estate');
                        });

                        $this->info('Correo de notificación enviado a ' . $email);
                    } catch (\Exception $e) {
                        $this->error('Error al enviar el correo: ' . $e->getMessage());
                    }
                } elseif ($today->isSameDay($expirationDate)) {
        // Enviar la notificación 5 días antes
                    try {
                        $bucket = Bucket::orderBy('description', 'desc')->limit(1)->first();
                        $email = $existingPlan->email;
                        $name = $existingPlan->name;
                        $planName = $existingPlan->plan_name;

                        $expirationDateFormatted = $existingPlan->expiration_date; // Formatear la fecha

                        \Mail::send('emails.NewNotificationPremiumPlanProperty', array(
                            'planName' => $planName,
                            'name' => $name,
                            'email' => $email,
                            'bucket' => $bucket->description,
                            'city' => $bucket->city,
                            'community' => $bucket->community,
                            'country' => $bucket->country,
                            'address' => $bucket->address,
                            'dateToNotify' => $expirationDateFormatted,
                        ), function ($message) use ($email) {
                            $emailAdmin = AdminEmail::orderBy('email', 'desc')->limit(1)->pluck('email')->first();

                            $message->from($emailAdmin, 'Aios Real Estate');
                            $message->to($email)->subject('Notificación de Cobro Aios Real Estate');
                        });

                        $this->info('Correo de notificación enviado a ' . $email);
                    } catch (\Exception $e) {
                        $this->error('Error al enviar el correo: ' . $e->getMessage());
                    }
                }
            
            }
        }
    }



}


    

   
