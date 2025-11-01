<?php

namespace App\Models;

use CodeIgniter\Model;

class ResidentModel extends Model
{
    protected $table = 'residents';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'username', 'password', 'fname', 'middle_name', 'lname', 'birthdate',
        'gender', 'religion', 'civil_status',
        'contact_no', 'purok_no', 'nationality',
        'photo', 'is_solo_parent', 'is_registered_voter', 'is_pwd', 'is_4ps'
    ];
}
