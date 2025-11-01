<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
     public function admin()
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }

        // Get user data
        $data['user'] = session()->get('user');

        // Show admin dashboard
        return view('modules/admin_dashboard', $data);
    }

    public function resident()
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }

        // Get user data
        $data['user'] = session()->get('user');

        // Show resident dashboard
        return view('modules/resident_dashboard', $data);
    }
}
