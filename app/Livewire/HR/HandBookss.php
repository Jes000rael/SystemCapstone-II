<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\Handbooks;
use Illuminate\Support\Facades\Auth;
class HandBookss extends Component
{

 
  public $hand;
    

    public function mount()
    {
      
        $this->updatehand();
    
      
    }

public function updatehand()
    {
        $companyId = Auth::user()->company_id ; 
        $this->hand = Handbooks::where('company_id', $companyId)->get();
    }
    public function deleteHand($handId)

{
    if ($handId) {
        Handbooks::find($handId)->delete();
    
        $this->updatehand();
        return redirect()->intended('/admin/hand-book')->with('hand-deleted', 'Successfully');
        // $this->dispatch('company-deleted', ['message' => 'Company Deleted successfully!']);

       
    }
}
    public function render()
    {
        return view('livewire.h-r.hand-books');
    }
}
