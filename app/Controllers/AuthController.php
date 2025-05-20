<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        // Tampilkan halaman login
        return view('login');
    }

    public function loginAction()
    {
        $session = session();
        $userModel = new UserModel();
        
        // Mendapatkan data dari form login
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        // Cek data pengguna di database
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Jika login berhasil, set session
            $session->set('user_id', $user['id']);
            $session->set('email', $user['email']);
            return redirect()->to('/dashboard');
        } else {
            // Jika login gagal, beri pesan error
            $session->setFlashdata('error', 'Email atau password salah.');
            return redirect()->to('/login');
        }
    }

    public function register()
    {
        // Tampilkan halaman register
        return view('register');
    }

    public function registerAction()
    {
        $session = session();
        $userModel = new UserModel();

        // Mendapatkan data dari form register
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $passwordConfirmation = $this->request->getPost('password_confirmation');
        
        // Validasi password
        if ($password !== $passwordConfirmation) {
            $session->setFlashdata('error', 'Password dan konfirmasi password tidak cocok.');
            return redirect()->to('/register');
        }

        // Enkripsi password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Simpan ke database
        $userModel->save([
            'email' => $email,
            'password' => $hashedPassword,
        ]);

        $session->setFlashdata('success', 'Pendaftaran berhasil! Silakan login.');
        return redirect()->to('/login');
    }
}
