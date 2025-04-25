<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\OffDutyDates;
use App\Models\OffDutyCategory;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class EditOffDuty extends Component
{

public $description='';
public $category;
    public $holiday_id='',$company_id='',$category_id='',$date,$percentage;

    protected $rules = [
        'description' => 'required',
        'category_id' => 'required',
        'date' => 'required',
        'percentage' => 'required|numeric|min:0|max:100',
    ];
       
        public function mount($offID)
        {
            $this->loadDropdownData();
            try {
           
                $decryptedoffID = Crypt::decrypt($offID);
         
                $offD = OffDutyDates::findOrFail($decryptedoffID);

                $this->holiday_id = $offD->holiday_id;
                $this->company_id = $offD->company_id;
                $this->category_id = $offD->category_id;
                $this->description = $offD->description;
                $this->date = $offD->date;
                $this->percentage = $offD->percentage * 100;

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
                $this->category = OffDutyCategory::all();
            }
    
        public function editoff()
        {
            $this->validate();

            $bloo = OffDutyDates::findOrFail($this->holiday_id  );
            $bloo->update([
                'description' => $this->description,
                'company_id' => $this->company_id,
                'date' => $this->date,
                'category_id' => $this->category_id,
                'percentage' => $this->percentage / 100,
                
            ]);
    
       
            return redirect()->intended('/admin/off-duty')->with('updateoff', 'Successfully');
        }
    public function render()
    {
        return view('livewire.h-r.edit-off-duty');
    }
}
