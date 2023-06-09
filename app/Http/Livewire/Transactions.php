<?php

namespace App\Http\Livewire;
use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

class Transactions extends Component
{
    
    use WithPagination;
    public $showingDataModal = false;
  
   
public $transaction_description,  $transaction;
 
 public $isEditMode = false;
  
  
    public $search = '';
    protected $listeners = ['render','delete']; 
    
    
public function authorize()
{
    return true;
}


    public function render()
    {
       
      
  $this->authorize('manage admin');
       
        $transactions = Transaction::where('transaction_description', 'like', '%'.$this->search.'%')
            ->orderBy('transactions.id','DESC')->paginate(10);

            
       return view('livewire.transactions', ['transactions' => $transactions]);
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
        'description' => 'required|unique:transactions|min:3|max:30',
    ]);

    Transaction::create([
        'transaction_description' => $this->transaction_description,
        'user_id' => auth()->user()->id,
    ]);

    session()->flash("message", "Data registration successful.");
    $this->reset();

    sleep(2); //BUTTON SPINNER LOADING
}
    public function showEditDataModal($id)
    {
         $this->authorize('manage admin');
        $this->transaction = Transaction::findOrFail($id);
        $this->transaction_description = $this->transaction->transaction_description;
      
        $this->isEditMode = true;
        $this->showingDataModal = true;
    }

     public function updateData()
    {
         $this->authorize('manage admin');
        $this->validate([
            'transaction_description' => 'required|string|min:3|max:300|unique:transactions,transaction_description,'.$this->transaction->id.',id',
          
        ]);
       

        $this->transaction->update([
            'transaction_description' => $this->transaction_description,
           
        ]); session()->flash("message", "Data Updated Successfully.");
        $this->reset();
       
        sleep(2); //BUTTON SPINNER LOADING
    }


    public function delete(Transaction $transaction)
    {
         $this->authorize('manage admin');
        $transaction->delete();
         
      
     
    }

}