<?php

namespace App\Controllers;

class LandingController extends BaseController
{
    public function index()
    {
        $db = db_connect();
        
        $officials = $db->query("SELECT first_name, last_name, photo, position FROM officials ORDER BY position DESC")->getResultArray();
        
        $captain = count(array_filter($officials, fn($o) => $o['position'] == 'Barangay Captain'));
        $secretary = count(array_filter($officials, fn($o) => $o['position'] == 'Barangay Secretary'));
        $treasurer = count(array_filter($officials, fn($o) => $o['position'] == 'Barangay Treasurer'));
        $kagawad = count(array_filter($officials, fn($o) => $o['position'] == 'Barangay Kagawad'));
        
        $data = [
            'officials' => $officials,
            'captain' => $captain,
            'secretary' => $secretary,
            'treasurer' => $treasurer,
            'kagawad' => $kagawad
        ];
        
        return view('landing', $data);
    }
}
