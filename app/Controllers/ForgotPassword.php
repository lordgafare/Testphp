<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Models\UserModel;
use App\Controllers\BaseController;

class ForgotPassword extends BaseController
{
    public function showForgotForm()
    {
        return view('forgot_password'); // ควรใช้ชื่อไฟล์ 'forgot_password' แต่ในที่นี้คุณตั้งชื่อแปลก ๆ
    }

    // แสดงฟอร์มรีเซ็ตรหัสผ่าน
    public function showResetForm($token = null)
    {
        return view('reset_password', ['token' => $token]); // ควรใช้ชื่อไฟล์ 'reset_password' แต่ในที่นี้คุณตั้งชื่อแปลก ๆ
    }

    public function sendEmailWithPHPMailer($email, $subject, $message)
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;  // Enable verbose debug output
            $mail->isSMTP();  
            $mail->Host       = 'smtp.gmail.com';  // Set the SMTP server to send through
            $mail->SMTPAuth   = true;  // Enable SMTP authentication
            $mail->Username   = 'lordgafarfe@gmail.com';  // SMTP username
            $mail->Password   = 'vqkjkhpwyybfixxt';  // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;  // TCP port to connect to

            //Recipients
            $mail->setFrom('gun_gun2541@hotmail.com', 'LordGaFare');
            $mail->addAddress($email);  // Add a recipient

            // Content
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function send_reset_link() {
        $email = $this->request->getPost('email');
    
        $model = new UserModel();
        $user = $model->where('email', $email)->first();
    
        if ($user) {
            // Generate a token
            $token = bin2hex(random_bytes(20));
    
            // Save token to the user's record
            $model->update($user['id'], ['reset_token' => $token]);
    
            // Send reset password email
            $reset_link = site_url("reset_password/$token");
    
            $this->sendEmailWithPHPMailer($email, 'Reset Your Password', "Click the following link to reset your password:, $reset_link");
    
            return redirect()->to('/forgot_password')->with('success', 'Reset link sent!');
        } else {
            return redirect()->to('/forgot_password')->with('error', 'Email not found!');
        }
    }



    public function reset()
    {
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');
        $confirm_password = $this->request->getPost('confirm_password');
        
        if (!is_string($password) || !is_string($confirm_password) || is_null($password) || is_null($confirm_password)) {
            return redirect()->to('/reset_password')->with('error', 'Invalid password data!');
        }
        
        // Check if passwords match
        if ($password !== $confirm_password) {
            return redirect()->to('/reset_password')->with('error', 'Passwords do not match!');
        }

        $model = new UserModel();
        $user = $model->where('reset_token', $token)->first();

        if ($user !== null) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $model->update($user['id'], ['password' => $hashed_password, 'reset_token' => null]);

            return redirect()->to('/login')->with('success', 'Password reset successful!');
        } else {
            return redirect()->to('/forgot_password')->with('error', 'Invalid token!');
        }
    }
}
