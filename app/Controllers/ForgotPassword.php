<?php

namespace App\Controllers;

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


    public function send_reset_link()
    {
        $email = $this->request->getPost('email');

        $model = new UserModel();
        $user = $model->where('email', $email)->first();

        if ($user) {
            // Generate a token
            $token = bin2hex(random_bytes(20));

            // Save token to the user's record
            $model->update($user['id'], ['reset_token' => $token]);

            // Send reset password email
            $reset_link = site_url("reset_password/index/$token");

            $emailService = \Config\Services::email();
            $emailService->setTo($email);  // ที่อยู่อีเมล์ของผู้รับ
            $emailService->setFrom('gun_gun2541@hotmail.com', 'LordGaFare');  // ตั้งค่าที่อยู่อีเมล์ผู้ส่ง และชื่อผู้ส่ง
            $emailService->setSubject('Reset Your Password');
            $emailService->setMessage("Click the following link to reset your password: $reset_link");

            if ($emailService->send()) {
                return redirect()->to('/forgot_password')->with('success', 'Reset link sent!');
            } else {
                echo $emailService->printDebugger();
                // return redirect()->to('/forgot_password')->with('error', 'Failed to send email!');
            }/*  */
        } else {
            return redirect()->to('/forgot_password')->with('error', 'Email not found!');
        }
    }


    public function reset()
    {
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');
        $confirm_password = $this->request->getPost('confirm_password');

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
