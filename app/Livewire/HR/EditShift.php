<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\Shift;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class EditShift extends Component
{

public $description='';
    public $shift_id  ='';

    protected $rules = [
        'description' => 'required',
    ];
       
        public function mount($shiftID)
        {
            
            try {
           
                $decryptedshiftID = Crypt::decrypt($shiftID);
         
                $shift = Shift::findOrFail($decryptedshiftID);

                $this->description = $shift->description;
                $this->shift_id   = $shift->shift_id  ;
            } catch (DecryptException $e) {
             
                session()->flash('error', 'Invalid or corrupted shift ID.');
            } catch (ModelNotFoundException $e) {
            
                session()->flash('error', 'shift not found.');
            } catch (\Exception $e) {
              
                session()->flash('error', 'An unexpected error occurred: ' . $e->getMessage());
            }
        
           
        }
    
    
        public function editshift()
        {
            $this->validate();

            $bloo = Shift::findOrFail($this->shift_id  );
            $bloo->update([
                'description' => $this->description,
                
            ]);
    
       
            return redirect()->intended('/admin/shifts')->with('updateshift', 'Successfully');
        }
    public function render()
    {
        return view('livewire.h-r.edit-shift');
    }
}
