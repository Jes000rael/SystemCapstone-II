<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\shift;
use App\Models\Company;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
class ShiftEdit extends Component
{

public $description='';
    public $company_id='';
    public $shift_id='';
    public $company;
    protected $rules = [
        'company_id' => 'required',
        'description' => 'required',
    ];
       
            
          
        
    
        public function mount($shiftID)
        {
            
            $this->loadDropdownData();
            try {
           
                $decryptedshiftID = Crypt::decrypt($shiftID);
            $depap = shift::findOrFail($decryptedshiftID);

            $this->description = $depap->description;
            $this->shift_id = $depap->shift_id;
            $this->company_id = $depap->company_id;
           
            } catch (DecryptException $e) {
             
                session()->flash('error', 'Invalid or corrupted job ID.');
            } catch (ModelNotFoundException $e) {
            
                session()->flash('error', 'job not found.');
            } catch (\Exception $e) {
              
                session()->flash('error', 'An unexpected error occurred: ' . $e->getMessage());
            }
        }
    
        public function loadDropdownData()
        {
            $this->company = Company::all();
        
        }
    
        public function editShift()
        {
            $this->validate();
            $sensen = shift::findOrFail($this->shift_id);
            $sensen->update([
                'description' => $this->description,
                'company_id' => $this->company_id,
                
            ]);
    
           
            return redirect()->intended('/company/shift')->with('updateshift', 'Successfull');
        }
    public function render()
    {
        return view('livewire.shift-edit');
    }
}
