<?php

namespace App\Http\Livewire;
use App\Models\ChMessage;
use App\Models\User;
use App\Models\Bucket;
use App\Models\AdminEmail;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Mail;
use App\Events\NotificationsEvent;


class NotificationsMessages extends Component 
{
    public $bucket,$email,$name,$body,$message2,$title,$phone,$nameFrom,$publishCodeEmail,
    $userEmailFrom2;
       public $to_user_id;
   


 public function render()
{
 

    $count = DB::table('ch_messages')
    ->join('users', 'users.id', '=', 'ch_messages.from_id')
    ->where('ch_messages.to_id', auth()->user()->id)
    ->where('ch_messages.seen', 0)
    ->select('ch_messages.*', 'users.name', 'users.lastname', 'users.profile_photo_path')
    ->orderBy('ch_messages.id', 'DESC')
    
    ->count();

$messages = DB::table('ch_messages')
    ->join('users', 'users.id', '=', 'ch_messages.from_id')
    ->where('ch_messages.to_id', auth()->user()->id)
    ->where('ch_messages.seen', 0)
    ->select('ch_messages.*', 'users.name', 'users.lastname', 'users.profile_photo_path')
    ->orderBy('ch_messages.id', 'DESC')
    ->groupBy('users.id') // Agrupar por el ID del usuario
    ->get();



return view('livewire.notifications-messages', ['messages' => $messages],['count' => $count]);
}



    

// ---------- SEND MESSAGES ------//

public function sendMessage(Request $request)
{
    $request->validate([
        'from_id' => 'required',
        'to_id' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'body' => 'required|min:2|max:100',
        'nameFrom' => 'required',
    ]);

   $from_id = $request->input('from_id');
    $userEmailFrom = $request->input('email');
   $to_id = $request->input('to_id');
    $this->phone = $request->input('phone');
   
    $this->body = $request->input('body');
    $this->nameFrom = $request->input('nameFrom');
    $publishCode = $request->input('publishCode');
    $this->title = $request->input('title');
    $this->publishCodeEmail = $request->input('publishCode');
    $this->userEmailFrom2=$request->input('email');
   DB::table('ch_messages')->insert([
    'id'=> $uuid = Uuid::uuid4()->toString(),
    'body' => $this->body,
    'to_id' => $to_id,
    'from_id' => $from_id,
     'created_at' => now(),
    'updated_at' => now(),
    
]);

 $this->bucket = Bucket::orderBy('description', 'desc')->limit(1)->first();
        $user = User::find($to_id);
        
$this->email = $user->email;
$this->name = $user->name;
$userEmailTo=$user->email;

 // Emitir el evento de notificación en tiempo real con variables de nombres diferentes
 

$countNotifications = DB::table('ch_messages')
            ->join('users', 'users.id', '=', 'ch_messages.from_id')
            ->where('ch_messages.to_id', $to_id)
            ->where('ch_messages.seen', 0)
            ->select('ch_messages.*', 'users.name', 'users.lastname', 'users.profile_photo_path')
            ->orderBy('ch_messages.id', 'DESC')
            ->count();
$notifications =  DB::table('ch_messages')
            ->join('users', 'users.id', '=', 'ch_messages.from_id')
            ->where('ch_messages.to_id', $to_id)
            ->where('ch_messages.seen', 0)
            ->select('ch_messages.*', 'users.name', 'users.lastname', 'users.profile_photo_path')
            ->orderBy('ch_messages.id', 'DESC')
            ->groupBy('users.id') // Agrupar por el ID del usuario
            ->get();
event(new NotificationsEvent($countNotifications, $notifications));// END evento de notificación en tiempo real


    try {
    \Mail::send('emails.contactMailPublishMessages', array(
        'name' =>$this->name,
        'email' => $user->email,
        'title' => $this->title,
        'phone' => $this->phone,
        'publishCodeEmail' => $this->publishCodeEmail,
        'contactEmail' => $this->userEmailFrom2,
        'nameFrom' => $this->nameFrom,
        'message2' => $this->body,
        'bucket' => $this->bucket->description,
        'city' => $this->bucket->city,
        'community' => $this->bucket->community,
        'country' => $this->bucket->country,
        'address' => $this->bucket->address,
    ), function ($message) use ($userEmailFrom, $userEmailTo) {
        $message->from($userEmailFrom, 'Aios Real Estate');
        $message->to($this->email)->subject('Nuevo Mensaje Recibido');
    });
} catch (\Exception $e) {
    dd($e->getMessage()); // Mostrar el mensaje de error en la página
}

    session()->flash('success', 'Mensaje enviado exitosamente');
   return redirect()->route('views', ['publishCode' => $publishCode]);

}


public function sendMessageGuest(Request $request)
{
    $request->validate([
       
        'phone' => 'required',
        'email' => 'required|email',
        'body' => 'required|min:2|max:100',
        'nameFrom' => 'required',
    ]);


    $userEmailFrom = $request->input('email');
   $to_id = $request->input('to_id');
    $this->phone = $request->input('phone');
   
    $this->body = $request->input('body');
    $this->nameFrom = $request->input('nameFrom');
    $publishCode = $request->input('publishCode');
    $this->title = $request->input('title');
    $this->publishCodeEmail = $request->input('publishCode');
    $this->userEmailFrom2=$request->input('email');
   

 $this->bucket = Bucket::orderBy('description', 'desc')->limit(1)->first();
        $user = User::find($to_id);
        
$this->email = $user->email;
$this->name = $user->name;
$userEmailTo=$user->email;

    try {
    \Mail::send('emails.contactMailPublishMessages', array(
        'name' =>$this->name,
        'email' => $user->email,
        'title' => $this->title,
        'phone' => $this->phone,
        'publishCodeEmail' => $this->publishCodeEmail,
        'contactEmail' => $this->userEmailFrom2,
        'nameFrom' => $this->nameFrom,
        'message2' => $this->body,
        'bucket' => $this->bucket->description,
        'city' => $this->bucket->city,
        'community' => $this->bucket->community,
        'country' => $this->bucket->country,
        'address' => $this->bucket->address,
    ), function ($message) use ($userEmailFrom, $userEmailTo) {
        $message->from($userEmailFrom, 'Aios Real Estate');
        $message->to($this->email)->subject('Nuevo Mensaje Recibido');
    });
} catch (\Exception $e) {
    dd($e->getMessage()); // Mostrar el mensaje de error en la página
}


    session()->flash('success', 'Mensaje enviado exitosamente');
   return redirect()->route('views', ['publishCode' => $publishCode]);

}

}
