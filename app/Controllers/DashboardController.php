<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
     public function admin()
    {

        if (!session()->has('user')) {
            return redirect()->to('/login');
        }

        $data['user'] = session()->get('user');

     
        return view('modules/admin_dashboard', $data);
    }

    public function resident()
    {
        
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }


        $data['user'] = session()->get('user');

       
        return view('modules/resident_dashboard', $data);
    }
}
