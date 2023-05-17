<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Models\AdminEmail;
use App\Models\Bucket;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManager;

class Users extends Component
{
     use WithFileUploads;
    use WithPagination;
    public $showingDataModal = false;
  
   
public $name, $lastname, $dni, $phone, $email, $password, $address, $city, $province, $zipcode, $user;
public $subject,$action,$bucket;
 public $startDate;
    public $endDate;
 public $isEditMode = false;
  
  
    public $search = '';
    protected $listeners = ['render','delete']; 
    
    
public function authorize()
{
    return true;
}


public function submit()
{
    $this->validate([
        'startDate' => 'required',
        'endDate' => 'required'
    ]);

    $users = User::whereBetween('created_at', ['2023-05-11', '2023-05-11'])->get();

return view('livewire.users', ['users' => $users]);
}
public function filter(){
    //$dateFrom = $this->dateFrom;
    //$dateTo = $this->dateTo;
     $users = User::whereDate('created_at', '>=', Carbon::today()->toDateString())
     ->whereDate('created_at', '<=', date('Y-m-d'))
            ->get();

            
       return view('livewire.users', ['users' => $users]);
}

    public function render()
    {
       
      
  $this->authorize('manage admin');
       
        $users = User::where('name', 'like', '%'.$this->search.'%')
            ->orderBy('users.id','DESC')->paginate(10);

            
       return view('livewire.users', ['users' => $users]);
    }

   

 public function showDataModal()
    {
        $this->reset();
        $this->showingDataModal = true;
    }
public function closeModal()
    {
          $this->showingDataModal = false;
    }

      public function storeData()
    {
         $this->authorize('manage admin');
         $valid_data = $this->validate([
        'name' => 'required|min:3|max:30',
        'lastname' => 'required|min:3|max:30',
        'dni' => 'required|min:5|max:20',
        'phone' => 'required|max:20',
        'email' => 'required|email|unique:users|min:5|max:60',
     
       'address' => 'required|min:3|max:100',
       'city' => 'required|min:3|max:30',
       'province' => 'required|min:3|max:30',
       'zipcode' => 'required|min:3|max:30',
      ]);
   
        //SEND EMAIL FORM CONTACT
        $this->bucket = Bucket::orderBy('description', 'desc')->limit(1)->first();
         $this->subject = 'Registro de Usuario Aios Real Estate';
          $this->action = 'Register';
          

Mail::send('emails.NewMailUserCrud', array(
    'name' => $this->name,
    'email' => $this->email,
    'password' => 'password',
    'action' => $this->action,
 'bucket' => $this->bucket->description,
    'city' => $this->bucket->city,
     'community' => $this->bucket->community,
      'country' => $this->bucket->country,
      'address' => $this->bucket->address,
   
), function($message) {
    $emailAdmin = AdminEmail::orderBy('email', 'desc')->limit(1)->pluck('email')->first();
if ($emailAdmin) {
    $message->from($emailAdmin,'Aios Real Estate');
    $message->to($this->email)->subject($this->subject);

}
else {
    // El correo electrónico no existe en la tabla
    session()->flash("message", "Email Admin does not exist.");
}
});
// END SEND EMAIL FORM CONTACT

              // CARBON FORMAT DATE
         //$date = Carbon::now()->locale('en')->isoFormat('dddd, MMMM Do YYYY, H:mm A');
            // END CARBON FORMAT DATE

        User::create([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'dni' => $this->dni,
            'phone' => $this->phone,
            'email' => $this->email,
             'password' => bcrypt('password'),
           
            'address' => $this->address,
            'city' => $this->city,
            'province' => $this->province,
            'zipcode' => $this->zipcode,
        ]); session()->flash("message", "Data registration successfully.");
        $this->reset();
        

        sleep(2); //BUTTON SPINNER LOADING
    }

    public function showEditDataModal($id)
    {
        $this->authorize('manage admin');
        $this->user = User::findOrFail($id);
        $this->name = $this->user->name;
        $this->lastname = $this->user->lastname;
        $this->dni = $this->user->dni;
        $this->phone = $this->user->phone;
       
         $this->email = $this->user->email;
         
           $this->address = $this->user->address;
            $this->city = $this->user->city;
             $this->province = $this->user->province;
              $this->zipcode = $this->user->zipcode;
        $this->isEditMode = true;
        $this->showingDataModal = true;
    }

     public function updateData()
    {
         $this->authorize('manage admin');
        $this->validate([
            'email' => 'required|string|min:3|max:100|unique:users,email,'.$this->user->id.',id',
           'name' => 'required|min:3|max:30',
             'lastname' => 'required|min:3|max:30',
             'dni' => 'required|min:3|max:30',
           'phone' => 'required|min:3|max:30',
           
           'address' => 'required|min:3|max:100',
           'city' => 'required|min:3|max:20',
           'province' => 'required|min:3|max:20',
           'zipcode' => 'required|min:3|max:20',
            
        ]);
       
         //SEND EMAIL FORM CONTACT
         $this->bucket = Bucket::orderBy('description', 'desc')->limit(1)->first();

         $this->subject = 'Actualización Aios Real Estate';
          $this->action = 'Update';
Mail::send('emails.NewMailUserCrud', array(
    'name' => $this->name,
    'email' => $this->email, 
    'action' => $this->action,
   'bucket' => $this->bucket->description,
    'city' => $this->bucket->city,
     'community' => $this->bucket->community,
      'country' => $this->bucket->country,
      'address' => $this->bucket->address,

), function($message) {
    $emailAdmin = AdminEmail::orderBy('email', 'desc')->limit(1)->pluck('email')->first();
if ($emailAdmin) {
    $message->from($emailAdmin,'Aios Real Estate');
    $message->to($this->email)->subject($this->subject);

}
else {
    // El correo electrónico no existe en la tabla
    session()->flash("message", "Email Admin does not exist.");
}
});
// END SEND EMAIL FORM CONTACT

        $this->user->update([
            'name' => $this->name,
            'lastname' => $this->lastname,
             'dni' => $this->dni,
            'phone' => $this->phone,
            'email' => $this->email,
            'password' => bcrypt('password'),
             
              'address' => $this->address,
               'city' => $this->city,
               'province' => $this->province,
               'zipcode' => $this->zipcode,
        ]); session()->flash("message", "Data Updated Successfully.");
        $this->reset();
       
        sleep(2); //BUTTON SPINNER LOADING
    }


    public function delete(User $user)
    {
         $this->authorize('manage admin');
        $user->delete();
         
      
     
    }

}

?>