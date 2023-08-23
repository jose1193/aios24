<?php

namespace App\Console\Commands;
use App\Models\PremiumPlan;
use Carbon\Carbon;
use App\Models\User;

use App\Models\Bucket;
use App\Models\AdminEmail;
use App\Models\Plan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use Illuminate\Console\Command;

class UpdatePlanStatus extends Command
{
    public $bucket,$email,$name,$message2,$planName;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plan:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update plan status based on expiration date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
      $plans = DB::table('premium_plans')
    ->join('users', 'premium_plans.user_id', '=', 'users.id')
    ->join('plans', 'premium_plans.plan_id', '=', 'plans.id') // Agregar este JOIN
    ->select('premium_plans.*', 'users.name', 'users.email', 'plans.plan as plan_name') // Agregar 'plans.name'
    ->get();


        foreach ($plans as $plan) {
            $expirationDate = Carbon::parse($plan->expiration_date);

             if (Carbon::now()->isAfter($expirationDate)) {
              $premiumPlan = PremiumPlan::find($plan->id); // Cargar el modelo basado en el ID
        $premiumPlan->estatus_premium = 'Suspendido';
        $premiumPlan->save();


        // Obtener los datos necesarios para el correo
        $bucket = Bucket::orderBy('description', 'desc')->limit(1)->first();
        $user = User::find($plan->user_id);
        $email = $user->email;
        $name = $user->name;
       $planName = $plan->plan_name;

        // Enviar el correo de suspensión
        try {
            Mail::send('emails.NewNotificationSuspensionPremiumPlanProperty', array(
                'planName' => $planName,
                'name' => $name,
                'email' => $email,
                'bucket' => $bucket->description,
                'city' => $bucket->city,
                'community' => $bucket->community,
                'country' => $bucket->country,
                'address' => $bucket->address,
            ), function ($message) use ($email) {
                $emailAdmin = AdminEmail::orderBy('email', 'desc')->limit(1)->pluck('email')->first();

                $message->from($emailAdmin, 'Aios Real Estate');
                $message->to($email)->subject('Notificación de Suspensión Plan Premium Aios Real Estate');
            });

            $this->info('Correo de suspensión enviado a ' . $email);
        } catch (\Exception $e) {
            $this->error('Error al enviar el correo: ' . $e->getMessage());
        }
    }
}
    }
}
