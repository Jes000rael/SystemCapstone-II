<?php

namespace App\Livewire\Auth;

use Livewire\Component;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\EmployeeRecords;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
class ForgotPassword extends Component
{
    
    use Notifiable;

    public $email;
    public $otp;
    public $newpassword='';
    public $status='active';
    public $message;
    public $step = 1; 
    // public $otpInput = ['', '', '', ''];
    public $otpInput1 = '';
    public $otpInput2 = '';
    public $otpInput3 = '';
    public $otpInput4 = '';
    public $showFailureNotification = false;

 

    protected $rules = [
        'email' => 'required|email',
    ];

   
    public function sendOtpforRepass()
    {
        $this->showFailureNotification = false;

        $this->validate();

        $user = EmployeeRecords::where('email', $this->email)->first();
        if (!$user) {
            $this->showFailureNotification = true;
            return;
        }
        $this->showFailureNotification = false;

        $this->otp = Str::random(4);
        $this->sendOtpEmail($this->otp);

        $this->showSuccessNotification = true;

        $this->step = 2;

    }

    protected function sendOtpEmail($otp)
    {
        $mail = new PHPMailer(true);
        try {
            
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'jes2kim6@gmail.com'; 
            $mail->Password = 'ghnrxblqjdzebrbp'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
         
            $mail->setFrom('jes2kim6@gmail.com', 'Rentify');
            $mail->addAddress($this->email); 

        
            $mail->isHTML(true);
            $mail->Subject = 'OTP Code';
            $mail->Body    = "<span style=' font-size: 20px;'> Your OTP code is <strong style='color:blue; font-size: 25px;' >{$otp}</strong>  dont share your OTP dont trust anyone be carefull</span>";
            $mail->send();
      
            
        } catch (Exception $e) {
        
            $this->message = 'OTP could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        }
    }

    public function verifyOtp()
    {
        $this->showFailureNotification = false;
     
        $this->validate([
            'otpInput1' => 'required|alpha_num|min:1|max:1', 
            'otpInput2' => 'required|alpha_num|min:1|max:1',
            'otpInput3' => 'required|alpha_num|min:1|max:1',
            'otpInput4' => 'required|alpha_num|min:1|max:1',
        ]);


        $inputOtp = $this->otpInput1 . $this->otpInput2 . $this->otpInput3 . $this->otpInput4;


        if ($inputOtp == $this->otp) {
            $this->successMessage = 'Email verified successfully!';
        $this->showFailureNotification = false;
        $this->reset(['otpInput1','otpInput2','otpInput3','otpInput4']);
            $this->step = 3; 
        } else {

            $this->showFailureNotification = true;
        $this->reset(['otpInput1','otpInput2','otpInput3','otpInput4']);

            return;
          
        }
    }
    public function resetPassword()
    {
        $this->validate(['newpassword' => 'required']);

        $user = EmployeeRecords::where('email', $this->email)->first();
        $departmentiId = $user->department_id;
        $companyId = $user->company_id;

        if ($user) {
            $user->password_string = $this->newpassword;
            $user->password = bcrypt($this->newpassword);
            $empID = $user->employee_id;
            $user->save();
            auth()->login($user);

            if($companyId ===1){

                if($departmentiId === 1){
                   
              
                  
                    return redirect()->intended('/company')->with('success', 'Welcome back!'); 

                }else{
                    if($departmentiId === 2){
                       
                  
                      
                        return redirect()->intended('/dashboard')->with('success', 'Welcome back!');
                    }else{
                       
                  
                   
                    return redirect()->intended('/employee/dashboard')->with('success', 'Welcome back!');
                    }
                }

            }else{
                if($departmentiId === 2)
                {
                   

                   
                    return redirect()->intended('/dashboard')->with('success', 'Welcome back!');
                }else{
                   

                  
                    return redirect()->intended('/employee/dashboard')->with('success', 'Welcome back!');
                }
            
            }
        }
    }


    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
