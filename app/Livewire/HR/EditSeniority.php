<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\SeniorityLevel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class EditSeniority extends Component
{


public $description='';
    public $seniority_level_id  ='';

    protected $rules = [
        'description' => 'required',
    ];
       
            
          
        
    
        public function mount($seniorityID)
        {
            
            try {
           
                $decryptedseniorityID = Crypt::decrypt($seniorityID);
         
                $seniority = SeniorityLevel::findOrFail($decryptedseniorityID);

                $this->description = $seniority->description;
                $this->seniority_level_id   = $seniority->seniority_level_id  ;
            } catch (DecryptException $e) {
             
                session()->flash('error', 'Invalid or corrupted seniority ID.');
            } catch (ModelNotFoundException $e) {
            
                session()->flash('error', 'seniority not found.');
            } catch (\Exception $e) {
              
                session()->flash('error', 'An unexpected error occurred: ' . $e->getMessage());
            }
        
           
        }
    
    
        public function editseniority()
        {
            $this->validate();

            $bloo = SeniorityLevel::findOrFail($this->seniority_level_id  );
            $bloo->update([
                'description' => $this->description,
                
            ]);
    
       
            return redirect()->intended('/admin/seniority')->with('updateseniority', 'Successfully');
        }
    public function render()
    {
        return view('livewire.h-r.edit-seniority');
    }
}
