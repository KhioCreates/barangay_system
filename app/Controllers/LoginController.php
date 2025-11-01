<?php

namespace App\Controllers;

class LoginController extends BaseController
{
    public function index()
    {
        if (session()->has('user')) {
            $user = session()->get('user');
            if ($user['role'] == 'admin') {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('/resident/dashboard');
            }
        }
        
        return view('auth/login');
    }

    public function login()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        ];

        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if ($this->validateData($data, $rules)) {
            $validatedData = $this->validator->getValidated();
            
            // Check users table
            $usersModel = model(name: 'UsersModel');
            $user = $usersModel->getUserByUsername($validatedData['username']);

            if (!empty($user)) {
                // Check if password matches (try both hashed and plain text)
                $passwordMatch = password_verify($validatedData['password'], $user['password']) || 
                                 $user['password'] === $validatedData['password'];
                
                if ($passwordMatch) {
                    // Get resident info if it's a resident
                    $db = db_connect();
                    $resident = null;
                    
                    if ($user['role'] == 'resident') {
                        $resident = $db->query("SELECT id FROM residents WHERE username = ?", [$user['username']])->getRowArray();
                    }
                    
                    // Store in session with resident info
                    $userData = [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'fname' => $user['fname'],
                        'lname' => $user['lname'],
                        'role' => $user['role'],
                        'resident_id' => $resident['id'] ?? null
                    ];
                    
                    session()->set('user', $userData);
                    
                    // Redirect based on role
                    if ($user['role'] == 'admin') {
                        return redirect()->to('/admin/dashboard');
                    } else {
                        return redirect()->to('/resident/dashboard');
                    }
                } else {
                    return redirect()->to('/login')->with('error', 'Invalid username or password.');
                }
            } else {
                return redirect()->to('/login')->with('error', 'Invalid username or password.');
            }
        } else {
            return $this->index();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
