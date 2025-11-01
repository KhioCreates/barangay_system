<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }

        $db = db_connect();
        
        // COUNT pending requests from database
        $pending = $db->query("SELECT COUNT(*) as count FROM certificate_requests WHERE status = 'Pending'")->getRow();
        $pending_requests = $pending->count;
        
        $total_residents = $db->query("SELECT COUNT(*) as count FROM residents")->getRow()->count;
        $single_mother = $db->query("SELECT COUNT(*) as count FROM residents WHERE is_solo_parent = 1")->getRow()->count;
        $registered_voter = $db->query("SELECT COUNT(*) as count FROM residents WHERE is_registered_voter = 1")->getRow()->count;
        $minors = $db->query("SELECT COUNT(*) as count FROM residents WHERE YEAR(NOW()) - YEAR(birthdate) - (DATE_FORMAT(NOW(), '%m%d') < DATE_FORMAT(birthdate, '%m%d')) < 18")->getRow()->count;
        $senior_citizens = $db->query("SELECT COUNT(*) as count FROM residents WHERE YEAR(NOW()) - YEAR(birthdate) - (DATE_FORMAT(NOW(), '%m%d') < DATE_FORMAT(birthdate, '%m%d')) >= 60")->getRow()->count;
        $beneficiary_4ps = $db->query("SELECT COUNT(*) as count FROM residents WHERE is_4ps = 1")->getRow()->count;
        $pwd = $db->query("SELECT COUNT(*) as count FROM residents WHERE is_pwd = 1")->getRow()->count;
        
        $data = [
            'pending_requests' => $pending_requests,
            'total_residents' => $total_residents,
            'single_mother' => $single_mother,
            'registered_voter' => $registered_voter,
            'minors' => $minors,
            'senior_citizens' => $senior_citizens,
            'beneficiary_4ps' => $beneficiary_4ps,
            'pwd' => $pwd
        ];
        
        return view('modules/admin_dashboard', $data);
    }

    public function residents()
    {
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }
        $db = db_connect();
        $residents = $db->query("SELECT * FROM residents ORDER BY created_at DESC")->getResultArray();
        
        $data = ['residents' => $residents];
        return view('modules/manage_residents', $data);
    }

    public function officials()
    {
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }
        $db = db_connect();
        $officials = $db->query("SELECT * FROM officials")->getResultArray();
        
        $data = ['officials' => $officials];
        return view('modules/manage_officials', $data);
    }

    public function add_official()
    {
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }
        
        return view('modules/add_official');
    }

    public function save_official()
    {
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }
        $db = db_connect();
        
        $fname = $this->request->getPost('fname');
        $lname = $this->request->getPost('lname');
        $position = $this->request->getPost('position');
        $gender = $this->request->getPost('gender');
        $civil_status = $this->request->getPost('civil_status');
        $contact = $this->request->getPost('contact');
        
        // HANDLE PHOTO UPLOAD
        $photo = '';
        $file = $this->request->getFile('photo');
        
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $photo = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/officials', $photo);
        }
        
        $data = [
            'first_name' => $fname,
            'last_name' => $lname,
            'position' => $position,
            'gender' => $gender,
            'civil_status' => $civil_status,
            'contact_no' => $contact,
            'photo' => $photo  
        ];
        
        $db->table('officials')->insert($data);
        
        return redirect()->to('admin/officials')->with('success', 'Official added successfully!');
    }

    public function delete_official($id)
    {
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }
        $db = db_connect();
        $db->table('officials')->where('id', $id)->delete();
        
        return redirect()->to('admin/officials')->with('success', 'Official deleted successfully!');
    }

    public function certification()
    {
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }

        $db = db_connect();
        
        // ✅ GET FULL RESIDENT DATA (middle_name and contact_no)
        $cert_requests = $db->query("
            SELECT cr.*, 
                   r.fname, 
                   r.lname, 
                   r.middle_name,
                   r.contact_no
            FROM certificate_requests cr
            JOIN residents r ON cr.resident_id = r.id
            WHERE cr.status = 'Pending'
            ORDER BY cr.created_at DESC
        ")->getResultArray();

        $data['requests'] = $cert_requests;
        return view('modules/manage_certification', $data);
    }

public function approve_certificate($id)
{
    if (!session()->has('user')) {
        return redirect()->to('/login');
    }

    $db = db_connect();
    
    // Get tax number from URL parameter
    $tax_number = $this->request->getGet('taxNo');
    
    // If no tax number passed, generate one (fallback)
    if (empty($tax_number)) {
        $tax_number = rand(1000, 9999);
    }
    
    // Update certificate with Approved status and tax number
    $db->query("UPDATE certificate_requests SET status = 'Approved', community_tax_no = ? WHERE id = ?", [$tax_number, $id]);

    return redirect()->to('/admin/certification')->with('success', 'Certificate approved successfully!');
}



    // ✅ UPDATED: Save rejection reason
// ✅ UPDATE THIS FUNCTION ONLY
    public function reject_certificate($id)
    {
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }

        $db = db_connect();
        $reason = $this->request->getGet('reason');
        
        // ✅ Update with disapproval reason
        $db->query("UPDATE certificate_requests SET status = 'Rejected', remarks = ? WHERE id = ?", [$reason, $id]);

        return redirect()->to('/admin/certification')->with('error', 'Certificate rejected.');
    }


    public function get_resident($id)
    {
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }
        $db = db_connect();
        $resident = $db->query("SELECT * FROM residents WHERE id = ?", [$id])->getRowArray();
        
        header('Content-Type: application/json');
        echo json_encode($resident);
    }
}
