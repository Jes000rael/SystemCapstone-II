<?php

namespace App\Livewire\HR;

use Livewire\Component;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\EmployeeRecords;
use App\Models\Company;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ContactUs extends Component
{

    public $emailtext='' , $company;
    public $emailSubject = 'Enopoly Login Account';
    public $messageBody;


    protected $rules = [
        'emailtext' => 'required',
    ];

    public function sendEmail($delay = 7)
    {
        $this->validate();
     

        try {

            $this->company = Company::where('company_id', Auth::user()->company_id)->first();
            $mail = new PHPMailer(true);
          
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = env('MAIL_PORT');
        
            
            $senderName = Auth::user()->first_name . ' ' . Auth::user()->last_name;
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), $senderName);
        
         
            $mail->addAddress(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        
            $mail->isHTML(true);
            $mail->Subject = $this->company->description ?? 'Company not verify';

            $this->messageBody = "
    <div style='font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;'>
    <div style='max-width: 600px; margin: 0 auto; background-color: #ffffff; border: 1px solid #ddd; border-radius: 8px; overflow: hidden;'>
        <div style='background-color: #f0f0f0; text-align: center; padding: 20px;'>
            <img src='https://app.enopolyautomation.com/assets/images/enopoly.png' alt='Enopoly Logo' style='height: 40px; width: 160px;'>
        </div>
        <div style='padding: 20px;'>
            <p style='font-size: 22px; color: #333;'>" . ($this->company->description ?? 'Company not verify') . "</p>
            <p style='font-size: 12px; color: #333;'>
                <strong style='font-size: 14px; color: #333;'>" . $senderName . "</strong> &lt;" . Auth::user()->email . "&gt;
            </p>
            <p style='font-size: 12px; color: #333;'><strong>" . $this->emailtext . "</strong></p>
        </div>
        <hr width='90%' height='10px'>
     
         
        <div style='background-color: #f0f0f0; text-align: center; padding: 10px; font-size: 12px; color: #888;'>
            <p>&copy; 2024 Enopoly Automation. All rights reserved.</p>
        </div>
    </div>
</div>";
            $mail->Body =$this->messageBody;
        
            $mail->send();
            sleep($delay);

            return redirect()->intended('/admin/contact_us')->with('email-send', 'Successfully');
        
    
        
           
        } catch (\Exception $e) {

            session()->flash('error', 'Failed to send email: ' . $e->getMessage());
            $this->reset(['emailtext']);

        }
    }
    public function render()
    {
        return view('livewire.h-r.contact-us');
    }
}
