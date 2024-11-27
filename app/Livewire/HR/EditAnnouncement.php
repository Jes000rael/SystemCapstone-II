<?php

namespace App\Livewire\HR;

use Livewire\Component;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;
class EditAnnouncement extends Component
{

 public $description='';
 public $date='';
    public $announcement_id='';

    protected $rules = [
        'description' => 'required',
        'date' => 'required|date',
    ];
       
            
    
        public function mount($announceID)
        {
            try {
           
                $decryptedannounceID = Crypt::decrypt($announceID);

                $announcement = Announcement::findOrFail($decryptedannounceID);

                $this->description = $announcement->description;

                $this->date = Carbon::parse($announcement->date)->toDateString();

                $this->announcement_id = $announcement->announcement_id;
                
            } catch (DecryptException $e) {
             
                session()->flash('error', 'Invalid or corrupted announcement ID.');
            } catch (ModelNotFoundException $e) {
            
                session()->flash('error', 'announcement not found.');
            } catch (\Exception $e) {
              
                session()->flash('error', 'An unexpected error occurred: ' . $e->getMessage());
            }
        
           
        }
    
    
        public function editAnnouncement()
        {
            $this->validate();
            $employee = Announcement::findOrFail($this->announcement_id);
            $employee->update([
                'description' => $this->description,
                'date' => Carbon::parse($this->date . ' ' . Carbon::now()->format('H:i:s')),
            ]);
    
       
            return redirect()->intended('/admin/announcements')->with('updateAnnouncement', 'Successfull');
        }
    public function render()
    {
        return view('livewire.h-r.edit-announcement');
    }
}
