<?php

namespace App\Livewire;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Livewire\Component;

class SendEmail extends Component
{
    public $email;
    public $emailSubject = 'Rentify Login Account';
    public $messageBody;
    public $username;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'username' => 'required|string|max:255',
        'password' => 'required|string|max:255',
    ];
    

    public function sendEmail()
    {
        $this->validate();
        $mail = new PHPMailer(true);


        
        $this->messageBody = "
        <div style='font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;'>
            <div style='max-width: 600px; margin: 0 auto; background-color: #ffffff; border: 1px solid #ddd; border-radius: 8px; overflow: hidden;'>
                <div style='background-color: #f0f0f0; text-align: center; padding: 20px;'>
                    <img src='https://lh3.googleusercontent.com/pw/AP1GczPEURRrOEvr3bGOtTAFQbPYNz2lKwuSceJRO-nvI4zrgVlvghSzj-lH-z_RRZruaCgfh-heXbnJOJZNbcmdXGmRDJfj5EquHCMgBTiBLCPpPlR-xXLGR7MStlj-9b1S2zRMqe53V_SjLGcsRYmrBwEx=w913-h913-s-no-gm?authuser=0' alt='Rentify Logo' style='height: 80px; width: 160px;'>
                </div>
                <div style='padding: 20px;'>
                    <p style='font-size: 16px; color: #333;'>Good day Maam/Sir,</p>
                    <p style='font-size: 14px; color: #333;'>This is your username and password to log in to our website. Click the link below:</p>
                    <p>
                        <a href='http://127.0.0.1:8000/login' style='font-size: 14px; color: #1e90ff; text-decoration: none;'>http://127.0.0.1:8000/login</a>
                    </p>
                    <p style='font-size: 14px; color: #333;'><strong>Username:</strong> {$this->username}</p>
                    <p style='font-size: 14px; color: #333;'><strong>Password:</strong> {$this->password}</p>
                </div>
                <hr width='90%' height ='10px'>
                    <div style='padding-left: 20px;'>
                    <p style='font-size: 12px; color: #333;'>Sincerely,</p>
                    <p style='font-size: 14px; color: #333; font-weight:bold;'>Team Rentify</p>
                    <p style='font-size: 10px; color: #ccc; '>Info@Rentify.info</p>
                    
                    
                </div>
                <div style='background-color: #f0f0f0; text-align: center; padding: 10px; font-size: 12px; color: #888;'>
                    <p>&copy; 2024 Rentify.web. All rights reserved.</p>
                </div>
            </div>
        </div>";


        try {

          
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'jes2kim6@gmail.com'; 
        $mail->Password = 'ghnrxblqjdzebrbp'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
     
        $mail->setFrom('jes2kim6@gmail.com', 'Rentify Prime');
        $mail->addAddress($this->email); 
            $mail->isHTML(true);
            $mail->Subject = $this->emailSubject;
            $mail->Body = $this->messageBody;

            $mail->send();
            $this->dispatch('email-send', ['message' => 'Successfully!']);

             $this->reset(['email','username','password']);
        } catch (\Exception $e) {

            session()->flash('error', 'Failed to send email: ' . $e->getMessage());
            $this->reset(['email','username','password']);

        }
    }
    public function render()
    {
        return view('livewire.send-email');
    }
}
