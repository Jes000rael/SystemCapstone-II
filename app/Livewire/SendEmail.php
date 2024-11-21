<?php

namespace App\Livewire;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Livewire\Component;

class SendEmail extends Component
{
    public $email;
    public $emailSubject = 'Enopoly Login Account';
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

        
        $this->messageBody = "
        <div style='font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;'>
            <div style='max-width: 600px; margin: 0 auto; background-color: #ffffff; border: 1px solid #ddd; border-radius: 8px; overflow: hidden;'>
                <div style='background-color: #f0f0f0; text-align: center; padding: 20px;'>
                    <img src='https://app.enopolyautomation.com/assets/images/enopoly.png' alt='Enopoly Logo' style='height: 40px; width: 160px;'>
                </div>
                <div style='padding: 20px;'>
                    <p style='font-size: 16px; color: #333;'>Good day Maam/Sir,</p>
                    <p style='font-size: 14px; color: #333;'>This is your username and password to log in to our website. Click the link below:</p>
                    <p>
                        <a href='https://hrs.enopolyautomation.com/login' style='font-size: 14px; color: #1e90ff; text-decoration: none;'>https://hrs.enopolyautomation.com/login</a>
                    </p>
                    <p style='font-size: 14px; color: #333;'><strong>Username:</strong> {$this->username}</p>
                    <p style='font-size: 14px; color: #333;'><strong>Password:</strong> {$this->password}</p>
                </div>
                <hr width='90%' height ='10px'>
                    <div style='padding-left: 20px;'>
                    <p style='font-size: 12px; color: #333;'>Sincerely,</p>
                    <p style='font-size: 14px; color: #333; font-weight:bold;'>Team Enopoly</p>
                    <p style='font-size: 10px; color: #ccc; '>Info@enopoly.info</p>
                    
                    
                </div>
                <div style='background-color: #f0f0f0; text-align: center; padding: 10px; font-size: 12px; color: #888;'>
                    <p>&copy; 2024 Enopoly Automation. All rights reserved.</p>
                </div>
            </div>
        </div>";

        try {
          
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = env('MAIL_PORT');

            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
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
