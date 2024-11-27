<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\Handbooks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EditHandbook extends Component
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
    public function deleteHandbook($jobId)

{
    if ($jobId) {
    Handbooks::find($jobId)->delete();
    
        $this->updateJob();
        return redirect()->intended('/admin/deduction')->with('deduction-deleted', 'Successfully');
        // $this->dispatch('company-deleted', ['message' => 'Company Deleted successfully!']);

       
    }
}

    
    
        public function edithand()
        {
            $this->validate();

            $bloo = Handbooks::findOrFail($this->handbook_id );
            $bloo->update([
                'description' => $this->description,
                'link' => $this->link,
                
            ]);
    
       
            return redirect()->intended('/admin/hand-book')->with('updatebook', 'Successfull');
        }
    public function render()
    {
        return view('livewire.h-r.edit-handbook');
    }
}
