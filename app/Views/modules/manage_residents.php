<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Residents - Barangay System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #dc0000;
            position: fixed;
            left: 0;
            top: 0;
        }

        .sidebar-header {
            padding: 15px;
            color: white;
        }

        .sidebar-header img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            padding: 15px 20px;
            color: white;
            cursor: pointer;
        }

        .sidebar-menu li.active {
            background-color: #999;
        }

        .sidebar-menu li a {
            color: white;
            text-decoration: none;
            display: block;
        }

        .main-content {
            margin-left: 250px;
            background-color: #e0e0e0;
            min-height: 100vh;
        }

        .top-bar {
            background-color: white;
            padding: 20px 30px;
            text-align: right;
        }

        .logout-btn {
            background-color: #dc0000;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .logout-btn:hover {
            background-color: #a01830;
            text-decoration: none;
            color: white;
        }

        .content-section {
            background-color: white;
            margin: 30px;
            padding: 40px;
            border-radius: 10px;
        }

        .page-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .btn-add {
            background-color: #dc0000;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .btn-add:hover {
            background-color: #a01830;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background-color: #f0f0f0;
        }

        table th {
            padding: 12px;
            text-align: left;
            font-weight: bold;
        }

        table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        table tr:hover {
            background-color: #f9f9f9;
        }

        .btn-edit {
            background-color: #4169E1;
            color: white;
            border: none;
            padding: 5px 15px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 12px;
        }

        .btn-edit:hover {
            background-color: #315ac1;
            text-decoration: none;
            color: white;
        }

        .btn-delete {
            background-color: #dc0000;
            color: white;
            border: none;
            padding: 5px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
            text-decoration: none;
        }

        .btn-delete:hover {
            background-color: #a01830;
            text-decoration: none;
            color: white;
        }

        .badge-male {
            background-color: #4169E1;
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
        }

        .badge-female {
            background-color: #dc0000;
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-col {
            flex: 1;
        }

        .form-col label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .form-col input,
        .form-col select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #333;
            border-radius: 25px;
            font-size: 14px;
        }


        .button-row {
            text-align: center;
            margin-top: 20px;
        }

        .btn-ok {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 12px 40px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        .btn-ok:hover {
            background-color: #218838;
            text-decoration: none;
            color: white;
        }

        .info-section {
            background-color: #f9f9f9;
            padding: 10px 15px;
            border-left: 3px solid #dc0000;
            margin-bottom: 20px;
            font-size: 12px;
            color: #666;
        }

        .photo-preview {
            text-align: center;
            margin-bottom: 15px;
        }

        .photo-preview img {
            max-width: 150px;
            max-height: 150px;
            border-radius: 10px;
            border: 2px solid #ddd;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <a href="<?php echo base_url('admin/dashboard'); ?>" style="text-decoration: none; color: white; display: flex; align-items: center;">
                <img src="https://imgs.search.brave.com/_9_S3mRt93p8h2AfZyT_hS5e-yaRfmIW6yufo2z08L8/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly91cGxv/YWQud2lraW1lZGlh/Lm9yZy93aWtpcGVk/aWEvY29tbW9ucy84/LzhlL0JhcmFuZ2F5/LnN2Zw" alt="Logo" style="width: 40px; height: 40px; margin-right: 10px;">
                <span style="font-size: 18px; font-weight: bold;">Barangay System</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="<?php echo base_url('admin/dashboard'); ?>">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('admin/officials'); ?>">
                    <i class="fas fa-clipboard-list"></i> Barangay Officials
                </a>
            </li>
            <li class="active">
                <a href="<?php echo base_url('admin/residents'); ?>">
                    <i class="fas fa-users"></i> Residents
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('admin/certification'); ?>">
                    <i class="fas fa-certificate"></i> Certification
                </a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="top-bar">
            <a href="<?php echo base_url('logout'); ?>" class="logout-btn">Logout</a>
        </div>

        <div class="content-section">
            <div class="page-title">
                <i class="fas fa-users"></i> Manage Residents
            </div>

            <button class="btn-add" data-bs-toggle="modal" data-bs-target="#addModal">+ Add Resident</button>

            <div style="overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Civil Status</th>
                            <th>Purok</th>
                            <th>Contact #</th>
                            <th>Date Registered</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($residents): ?>
                            <?php foreach ($residents as $resident): ?>
                                <tr>
                                    <td><?php echo $resident['fname'] . ' ' . $resident['lname']; ?></td>
                                    <td>
                                        <?php if ($resident['gender'] == 'Male'): ?>
                                            <span class="badge-male">Male</span>
                                        <?php else: ?>
                                            <span class="badge-female">Female</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $resident['civil_status']; ?></td>
                                    <td><?php echo $resident['purok_no']; ?></td>
                                    <td><?php echo $resident['contact_no']; ?></td>
                                    <td><?php echo date('Y-m-d', strtotime($resident['created_at'])); ?></td>
                                    <td>
                                        <button class="btn-edit" data-bs-toggle="modal" data-bs-target="#editModal" onclick="setEditId(<?php echo $resident['id']; ?>)">Edit</button>
                                        <a href="<?php echo base_url('admin/residents/delete/' . $resident['id']); ?>" class="btn-delete" onclick="return confirm('Delete this resident?')">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" style="text-align: center; padding: 20px;">No residents found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ADD MODAL -->
    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="text-align: center; width: 100%; margin-left: -16px;">ADD RESIDENT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="max-height: 600px; overflow-y: auto;">
                    <form action="<?php echo base_url('admin/residents/store'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-col">
                                <label>Username</label>
                                <input type="text" name="username" required>
                            </div>
                            <div class="form-col">
                                <label>Password</label>
                                <input type="password" name="password" required>
                            </div>
                            <div class="form-col">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_password" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label>First Name</label>
                                <input type="text" name="fname" required>
                            </div>
                            <div class="form-col">
                                <label>Middle Name</label>
                                <input type="text" name="middle_name">
                            </div>
                            <div class="form-col">
                                <label>Last Name</label>
                                <input type="text" name="lname" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label>Date of Birth</label>
                                <input type="date" name="birthdate" required>
                            </div>
                            <div class="form-col">
                                <label>Gender</label>
                                <select name="gender" required>
                                    <option value="">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-col">
                                <label>Civil Status</label>
                                <select name="civil_status" required>
                                    <option value="">Select</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Separated">Separated</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label>Religion</label>
                                <select name="religion">
                                    <option value="">Select</option>
                                    <option value="Roman Catholic">Roman Catholic</option>
                                    <option value="Protestant">Protestant</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="form-col">
                                <label>Solo Parent?</label>
                                <select name="is_solo_parent">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="form-col">
                                <label>Registered Voter?</label>
                                <select name="is_registered_voter">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label>PWD?</label>
                                <select name="is_pwd">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="form-col">
                                <label>4Ps Beneficiary?</label>
                                <select name="is_4ps">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="form-col">
                                <label>Contact No.</label>
                                <input type="text" name="contact_no">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label>Purok No.</label>
                                <input type="text" name="purok_no">
                            </div>
                            <div class="form-col">
                                <label>Nationality</label>
                                <input type="text" name="nationality">
                            </div>
                            <div class="form-col">
                                <label>Photo</label>
                                <input type="file" name="photo" accept="image/*">
                            </div>
                        </div>

                        <div class="button-row">
                            <button type="submit" class="btn-ok">OK</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- EDIT MODAL -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="text-align: center; width: 100%; margin-left: -16px;">EDIT RESIDENT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="max-height: 600px; overflow-y: auto;">
                    <div class="info-section">
                        <i class="fas fa-info-circle"></i> 
                        Editing resident: <strong id="residentName"></strong> 
                        (ID: <span id="residentId"></span>)
                    </div>

                    <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-col">
                                <label>Username</label>
                                <input type="text" name="username" id="editUsername" required>
                            </div>
                            <div class="form-col">
                                <label>Password (Leave blank to keep)</label>
                                <input type="password" name="password" id="editPassword">
                            </div>
                            <div class="form-col">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_password" id="editConfirmPassword">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label>First Name</label>
                                <input type="text" name="fname" id="editFname" required>
                            </div>
                            <div class="form-col">
                                <label>Middle Name</label>
                                <input type="text" name="middle_name" id="editMname">
                            </div>
                            <div class="form-col">
                                <label>Last Name</label>
                                <input type="text" name="lname" id="editLname" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label>Date of Birth</label>
                                <input type="date" name="birthdate" id="editBirthdate" required>
                            </div>
                            <div class="form-col">
                                <label>Gender</label>
                                <select name="gender" id="editGender">
                                    <option value="">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-col">
                                <label>Civil Status</label>
                                <select name="civil_status" id="editCivilStatus">
                                    <option value="">Select</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Separated">Separated</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label>Religion</label>
                                <select name="religion" id="editReligion">
                                    <option value="">Select</option>
                                    <option value="Roman Catholic">Roman Catholic</option>
                                    <option value="Protestant">Protestant</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="form-col">
                                <label>Solo Parent?</label>
                                <select name="is_solo_parent" id="editSoloParent">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="form-col">
                                <label>Registered Voter?</label>
                                <select name="is_registered_voter" id="editVoter">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label>PWD?</label>
                                <select name="is_pwd" id="editPwd">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="form-col">
                                <label>4Ps Beneficiary?</label>
                                <select name="is_4ps" id="edit4ps">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="form-col">
                                <label>Contact No.</label>
                                <input type="text" name="contact_no" id="editContact">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label>Purok No.</label>
                                <input type="text" name="purok_no" id="editPurok">
                            </div>
                            <div class="form-col">
                                <label>Nationality</label>
                                <input type="text" name="nationality" id="editNationality">
                            </div>
                            <div class="form-col">
                                <label>Photo</label>
                                <input type="file" name="photo" accept="image/*">
                            </div>
                        </div>

                        <div class="photo-preview" id="photoPreview">
                            <span style="font-size: 12px; color: #666;">No photo uploaded yet</span>
                        </div>

                        <input type="hidden" name="old_photo" id="oldPhoto">

                        <div class="button-row">
                            <button type="submit" class="btn-ok">UPDATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function setEditId(id) {
            var residents = <?php echo json_encode($residents); ?>;
            
            var i = 0;
            while (i < residents.length) {
                if (residents[i].id == id) {
                    var resident = residents[i];
                    
                    document.getElementById('editUsername').value = resident.username;
                    document.getElementById('editFname').value = resident.fname;
                    document.getElementById('editMname').value = resident.middle_name;
                    document.getElementById('editLname').value = resident.lname;
                    document.getElementById('editBirthdate').value = resident.birthdate;
                    document.getElementById('editGender').value = resident.gender;
                    document.getElementById('editCivilStatus').value = resident.civil_status;
                    document.getElementById('editReligion').value = resident.religion;
                    document.getElementById('editSoloParent').value = resident.is_solo_parent;
                    document.getElementById('editVoter').value = resident.is_registered_voter;
                    document.getElementById('editPwd').value = resident.is_pwd;
                    document.getElementById('edit4ps').value = resident.is_4ps;
                    document.getElementById('editContact').value = resident.contact_no;
                    document.getElementById('editPurok').value = resident.purok_no;
                    document.getElementById('editNationality').value = resident.nationality;
                    
                    document.getElementById('residentName').textContent = resident.fname + ' ' + resident.lname;
                    document.getElementById('residentId').textContent = resident.id;
                    
                    var photoDiv = document.getElementById('photoPreview');
                    if (resident.photo) {
                        photoDiv.innerHTML = '<span style="font-size: 12px; color: #666;">Current Photo:</span><img src="<?php echo base_url("uploads/residents/"); ?>' + resident.photo + '" alt="Photo"><br><small style="color: #999;">Upload new to replace</small>';
                    } else {
                        photoDiv.innerHTML = '<span style="font-size: 12px; color: #666;">No photo uploaded yet</span>';
                    }
                    
                    document.getElementById('oldPhoto').value = resident.photo;
                    document.getElementById('editForm').action = '<?php echo base_url("/admin/residents/update/"); ?>' + id;
                    
                    break;
                }
                i++;
            }
        }
        
        document.getElementById('editForm').addEventListener('submit', function(e) {
            var password = document.getElementById('editPassword').value;
            var confirmPassword = document.getElementById('editConfirmPassword').value;
            
            if (password && password !== confirmPassword) {
                e.preventDefault();
                alert('Passwords do not match!');
            }
        });
    </script>
</body>
</html>
