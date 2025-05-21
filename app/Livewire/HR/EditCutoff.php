<?php

namespace App\Livewire\HR;

use Livewire\Component;

use App\Models\Cutoff;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EditCutoff extends Component
{


    public $date_start='';
    public $date_end='';
    public $conversion_rate='';
    public $cutoff_id='';
       public $companyId;
        protected $rules = [
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'conversion_rate' => 'required|numeric|regex:/^\d+(\.\d+)?$/|min:1',
        ];
       
        public function mount($cutoffID)
        {
            $this->loadDropdownData();
            try {
           
                $decryptedcutoffID = Crypt::decrypt($cutoffID);
         
                $cut = Cutoff::findOrFail($decryptedcutoffID);

                $this->cutoff_id = $cut->cutoff_id;
                $this->date_start = $cut->date_start;
                $this->date_end = $cut->date_end;
                $this->conversion_rate = $cut->conversion_rate;
              
           
            } catch (DecryptException $e) {
             
                session()->flash('error', 'Invalid or corrupted Off Duty ID.');
            } catch (ModelNotFoundException $e) {
            
                session()->flash('error', 'Off Duty not found.');
            } catch (\Exception $e) {
              
                session()->flash('error', 'An unexpected error occurred: ' . $e->getMessage());
            }
        
        }
      
        public function loadDropdownData()
            {
                $companyId = Auth::user()->company_id;
                $this->category = Cutoff::where('company_id',$companyId)->get();
            }
    
        public function editcutoff()
        {
            $this->validate();

            $bloo = Cutoff::findOrFail($this->cutoff_id);
            $bloo->update([
             
                'date_start' => $this->date_start,
                'date_end' => $this->date_end,
                'conversion_rate' => $this->conversion_rate,
                
            ]);
    
       
            return redirect()->intended('/admin/cutoff')->with('updatecutoff', 'Successfully');
        }
    public function render()
    {
        return view('livewire.h-r.edit-cutoff');
    }
}
