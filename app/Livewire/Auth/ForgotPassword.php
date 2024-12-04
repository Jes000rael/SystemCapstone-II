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
    public $otpInput = ['', '', '', ''];
    public $showFailureNotification = false;

 

    protected $rules = [
        'email' => 'required|email',
    ];

   
    public function sendOtpforRepass()
    {
        $this->validate();

        $user = EmployeeRecords::where('email', $this->email)->first();
        if (!$user) {
            $this->showFailureNotification = true;
            return;
        }
        $this->showFailureNotification = false;

        $this->otp = Str::random(4);
        $this->sendOtpEmail($this->otp);

      
       
        sleep(2); 
   
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
            $mail->Password = 'ykqskenrpgthcbab'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
         
            $mail->setFrom('jes2kim6@gmail.com', 'Enopoly Prime');
            $mail->addAddress($this->email); 

        
            $mail->isHTML(true);
            $mail->Subject = 'OTP Code';
            $mail->Body    = "Your OTP code is <strong style='color:blue;' class='fw-bold fs-1'>{$otp}</strong>  dont share your OTP dont trust anyone be carefull";
            $mail->send();
            
        } catch (Exception $e) {
        
            $this->message = 'OTP could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        }
    }

    public function verifyOtp()
    {
     

        $inputOtp = implode('', $this->otpInput);

        if ($inputOtp == $this->otp) {
            $this->successMessage = 'Email verified successfully!';
            $this->errorMessage = '';
            $this->step = 3; 
        } else {
            $this->errorMessage = 'Invalid OTP. Please try again.';
            $this->successMessage = '';
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
                    $employee = EmployeeRecords::where('employee_id',$empID)->first();
              
                    $employee->update([
                        'status' => $this->status,
                      
                    ]);
                    return redirect()->intended('/company')->with('success', 'Welcome back!'); 

                }else{
                    if($departmentiId === 2){
                        $employee = EmployeeRecords::where('employee_id',$empID)->first();
                  
                        $employee->update([
                            'status' => $this->status,
                          
                        ]);
                       
                        return redirect()->intended('/dashboard')->with('success', 'Welcome back!');
                    }else{
                        $employee = EmployeeRecords::where('employee_id',$empID)->first();
                  
                    $employee->update([
                        'status' => $this->status,
                      
                    ]);
                    return redirect()->intended('/employee/dashboard')->with('success', 'Welcome back!');
                    }
                }

            }else{
                if($departmentiId === 2)
                {
                    $employee = EmployeeRecords::where('employee_id',$empID)->first();

                    $employee->update([
                        'status' => $this->status,
                      
                    ]);
                    return redirect()->intended('/dashboard')->with('success', 'Welcome back!');
                }else{
                    $employee = EmployeeRecords::where('employee_id',$empID)->first();

                    $employee->update([
                        'status' => $this->status,
                      
                    ]);
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
