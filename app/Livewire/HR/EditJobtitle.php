<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\JobTitle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class EditJobtitle extends Component
{


 public $description='';
    public $job_title_id ='';

    protected $rules = [
        'description' => 'required',
    ];
       
            
          
        
    
        public function mount($jobtitleID)
        {
            
            try {
           
                $decryptedjobtitleID = Crypt::decrypt($jobtitleID);
         
                $jobtitle = JobTitle::findOrFail($decryptedjobtitleID);

                $this->description = $jobtitle->description;
                $this->job_title_id  = $jobtitle->job_title_id ;
            } catch (DecryptException $e) {
             
                session()->flash('error', 'Invalid or corrupted jobtitle ID.');
            } catch (ModelNotFoundException $e) {
            
                session()->flash('error', 'jobtitle not found.');
            } catch (\Exception $e) {
              
                session()->flash('error', 'An unexpected error occurred: ' . $e->getMessage());
            }
        
           
        }
    
    
        public function editjobtitle()
        {
            $this->validate();

            $bloo = JobTitle::findOrFail($this->job_title_id );
            $bloo->update([
                'description' => $this->description,
                
            ]);
    
       
            return redirect()->intended('/admin/jobtitle')->with('updatejobtitle', 'Successfull');
        }
    public function render()
    {
        return view('livewire.h-r.edit-jobtitle');
    }
}
