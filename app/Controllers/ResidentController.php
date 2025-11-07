<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ResidentController extends Controller
{
    
public function index()
{
    if (!session()->has('user')) {
        return redirect()->to('/login');
    }

    $db = db_connect();

    $filter = $this->request->getGet('filter');
    

    $query = "SELECT * FROM residents";
    
    if ($filter) {
        switch ($filter) {
            case 'solo_parent':
                $query .= " WHERE is_solo_parent = 1";
                break;
            case 'voter':
                $query .= " WHERE is_registered_voter = 1";
                break;
            case 'minors':
                $query .= " WHERE TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) < 18";
                break;
            case '4ps':
                $query .= " WHERE is_4ps = 1";
                break;
            case 'pwd':
                $query .= " WHERE is_pwd = 1";
                break;
            case 'seniors':
                $query .= " WHERE TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) >= 60";
                break;
        }
    }
    
    $query .= " ORDER BY created_at DESC";
    
    $residents = $db->query($query)->getResultArray();
    
    return view('modules/manage_residents', ['residents' => $residents]);
}



    public function create()
    {
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }
        return view('modules/add_resident');
    }

    public function store()
    {
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }
        $db = db_connect();
        
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $fname = $this->request->getPost('fname');
        $lname = $this->request->getPost('lname');
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        
        $photo = $this->request->getFile('photo');
        $photoName = '';
        
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $photoName = $photo->getRandomName();
            $photo->move('uploads/residents', $photoName);
        }
        
        
        $db->query("INSERT INTO residents (username, password, fname, middle_name, lname, birthdate, gender, civil_status, religion, is_solo_parent, is_registered_voter, is_pwd, is_4ps, contact_no, purok_no, nationality, photo) 
                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [
            $username,
            $hashed_password,
            $fname,
            $this->request->getPost('middle_name'),
            $lname,
            $this->request->getPost('birthdate'),
            $this->request->getPost('gender'),
            $this->request->getPost('civil_status'),
            $this->request->getPost('religion'),
            $this->request->getPost('is_solo_parent'),
            $this->request->getPost('is_registered_voter'),
            $this->request->getPost('is_pwd'),
            $this->request->getPost('is_4ps'),
            $this->request->getPost('contact_no'),
            $this->request->getPost('purok_no'),
            $this->request->getPost('nationality'),
            $photoName
        ]);
        
        
        $db->query("INSERT INTO users (username, password, fname, lname, role) VALUES (?, ?, ?, ?, ?)", [
            $username,
            $hashed_password,
            $fname,
            $lname,
            'resident'
        ]);
        
        return redirect()->to('admin/residents');
    }

    public function edit($id)
    {
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }

        $db = db_connect();
        $resident = $db->query("SELECT * FROM residents WHERE id = ?", [$id])->getRowArray();
        return view('modules/edit_resident', ['resident' => $resident]);
    }

    public function update($id)
    {
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }

        $db = db_connect();
        
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $fname = $this->request->getPost('fname');
        $lname = $this->request->getPost('lname');
        
        
        $old = $db->query("SELECT * FROM residents WHERE id = ?", [$id])->getRow();
        
        if ($password) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $hashed_password = $old->password;
        }
        
        
        $photo = $this->request->getFile('photo');
        $photoName = $old->photo;
        
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            
            if ($old->photo && file_exists('uploads/residents/' . $old->photo)) {
                unlink('uploads/residents/' . $old->photo);
            }
            $photoName = $photo->getRandomName();
            $photo->move('uploads/residents', $photoName);
        }
        
        
        $db->query("UPDATE residents SET username=?, password=?, fname=?, middle_name=?, lname=?, birthdate=?, gender=?, civil_status=?, religion=?, is_solo_parent=?, is_registered_voter=?, is_pwd=?, is_4ps=?, contact_no=?, purok_no=?, nationality=?, photo=? WHERE id=?", [
            $username,
            $hashed_password,
            $fname,
            $this->request->getPost('middle_name'),
            $lname,
            $this->request->getPost('birthdate'),
            $this->request->getPost('gender'),
            $this->request->getPost('civil_status'),
            $this->request->getPost('religion'),
            $this->request->getPost('is_solo_parent'),
            $this->request->getPost('is_registered_voter'),
            $this->request->getPost('is_pwd'),
            $this->request->getPost('is_4ps'),
            $this->request->getPost('contact_no'),
            $this->request->getPost('purok_no'),
            $this->request->getPost('nationality'),
            $photoName,
            $id
        ]);
        
        
        $db->query("UPDATE users SET username=?, fname=?, lname=? WHERE username=?", [
            $username,
            $fname,
            $lname,
            $old->username
        ]);
        
        if ($password) {
            $db->query("UPDATE users SET password=? WHERE username=?", [
                $hashed_password,
                $username
            ]);
        }
        
        return redirect()->to('admin/residents');
    }

    public function delete($id)
    {
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }
        $db = db_connect();
        
        $resident = $db->query("SELECT * FROM residents WHERE id = ?", [$id])->getRow();
        
        
        if ($resident->photo && file_exists('uploads/residents/' . $resident->photo)) {
            unlink('uploads/residents/' . $resident->photo);
        }
        
        $db->query("DELETE FROM residents WHERE id = ?", [$id]);
        $db->query("DELETE FROM users WHERE username = ?", [$resident->username]);
        
        return redirect()->to('admin/residents');
    }

    

    
    public function request()
    {
        
        if (!session()->has('user')) {
            return redirect()->to('login');
        }

        $db = db_connect();
        $user = session()->get('user');

        
        $residentid = $user['resident_id'] ?? null;

        if (!$residentid) {
            return redirect()->to('login');
        }

        
        $requests = $db->query("
            SELECT 
                cr.id,
                cr.cert_type,
                cr.purpose,
                cr.status,
                cr.created_at,
                cr.remarks,
                cr.community_tax_no,
                r.fname,
                r.lname
            FROM certificate_requests cr
            JOIN residents r ON cr.resident_id = r.id
            WHERE cr.resident_id = ?
            ORDER BY cr.created_at DESC
        ", [$residentid])->getResultArray();

        $data = [
            'user' => $user,
            'requests' => $requests
        ];

        return view('modules/resident_request', $data);
    }

    public function submitRequest()
    {
        
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }

        $db = db_connect();
        $user = session()->get('user');
        
        
        $resident_id = $user['resident_id'] ?? null;
        
        if (!$resident_id) {
            return redirect()->to('/login');
        }

        $certificates = $this->request->getPost('certificates');
        $purposes = $this->request->getPost('purpose');

        
        if (empty($certificates)) {
            return redirect()->back()->with('error', 'Please select at least one certificate');
        }

        
        foreach ($certificates as $cert) {
            $purpose = isset($purposes[$cert]) ? $purposes[$cert] : '';

            $db->query("INSERT INTO certificate_requests (resident_id, cert_type, purpose, status) 
                       VALUES (?, ?, ?, ?)", [
                $resident_id,
                $cert,
                $purpose,
                'Pending'
            ]);
        }

        return redirect()->to('resident/request')->with('success', 'Request submitted successfully!');
    }

    
    public function dashboard()
    {
        
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }

        $user = session()->get('user');

        $data = [
            'user' => $user
        ];

        return view('modules/resident_dashboard', $data);
    }

    public function profile()
    {
        
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }

        $db = db_connect();
        $user = session()->get('user');
        
        
        $resident = $db->query("SELECT * FROM residents WHERE username = ?", [$user['username']])->getRowArray();
        
        if (!$resident) {
            return redirect()->to('/login');
        }

        $data = [
            'user' => $user,
            'resident' => $resident
        ];

        return view('modules/resident_profile', $data);
    }

    public function updateProfile()
    {
        
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }

        $db = db_connect();
        $user = session()->get('user');
        
        
        $resident = $db->query("SELECT * FROM residents WHERE username = ?", [$user['username']])->getRowArray();
        
        if (!$resident) {
            return redirect()->to('/login');
        }

        
        $photo = $this->request->getFile('photo');
        $photoName = $resident['photo'];
        
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $photoName = $photo->getRandomName();
            $photo->move('uploads/residents', $photoName);
        }

        
        $db->query("UPDATE residents SET photo = ?, contact_no = ?, purok_no = ?, nationality = ? WHERE id = ?", [
            $photoName,
            $this->request->getPost('contact_no'),
            $this->request->getPost('purok_no'),
            $this->request->getPost('nationality'),
            $resident['id']
        ]);

        return redirect()->to('resident/profile')->with('success', 'Profile updated successfully!');
    }
}
