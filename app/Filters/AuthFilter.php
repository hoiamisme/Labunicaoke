<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        
        // Cek apakah pengguna sudah login
        if (!$session->has('user_id')) {
            return redirect()->to('/login');
        }
    }
public $aliases = [
    'auth' => \App\Filters\AuthFilter::class,
];

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu filter setelah halaman ditampilkan
    }
}
