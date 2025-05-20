<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class MailboxController extends Controller
{
    
    public function index()
    {
        return view('mailbox/index');
    }
}
