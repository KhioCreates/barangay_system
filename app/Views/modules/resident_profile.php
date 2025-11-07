<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resident Profile - Barangay System</title>
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
            padding: 0;
        }

        .sidebar-menu li a {
            display: block;
            color: white;
            padding: 15px 20px;
            text-decoration: none;
        }

        .sidebar-menu li a:hover {
            background-color: #999;
        }

        .sidebar-menu li.active a {
            background-color: #999;
        }

        .content-section {
            background-color: white;
            margin: 30px;
            padding: 40px;
            border-radius: 10px;
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
            display: inline-block;
        }

        .logout-btn:hover {
            background-color: #a01830;
            color: white;
            text-decoration: none;
        }

        .profile-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .page-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #333;
        }

        .profile-layout {
            display: flex;
            gap: 30px;
        }

        .photo-section {
            width: 300px;
            flex-shrink: 0;
        }

        .photo-box {
            border: 2px solid #333;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }

        .photo-box-title {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 20px;
            color: #999;
        }

        .photo-preview {
            width: 200px;
            height: 250px;
            background-color: #ddd;
            border-radius: 50% 50% 0 0;
            margin: 0 auto 20px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .photo-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .photo-placeholder {
            font-size: 100px;
            color: #999;
        }

        .browse-btn {
            background-color: #dc0000;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
        }

        .browse-btn:hover {
            background-color: #a01830;
        }

        .browse-btn i {
            margin-right: 8px;
        }

        .info-section {
            flex: 1;
        }

        .info-box {
            border: 2px solid #333;
            padding: 30px;
            border-radius: 5px;
        }

        .info-box-title {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 25px;
            color: #999;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px 15px;
            margin-bottom: 20px;
        }

        .info-field {
            display: flex;
            flex-direction: column;
        }

        .info-field label {
            font-weight: bold;
            font-size: 12px;
            margin-bottom: 5px;
            color: #333;
        }

        .info-field .value {
            font-size: 14px;
            color: #999;
        }

        .info-field input,
        .info-field select {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
            font-size: 14px;
        }

        .editable-fields {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 30px;
        }

        .save-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 12px 40px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
            display: block;
            text-transform: uppercase;
        }

        .save-btn:hover {
            background-color: #218838;
        }

        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        input[type="file"] {
            display: none;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                left: 0;
                top: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .content-section {
                margin: 15px;
                padding: 20px;
            }

            .top-bar {
                padding: 15px;
            }

            .profile-layout {
                flex-direction: column;
                gap: 20px;
            }

            .photo-section {
                width: 100%;
            }

            .page-title {
                font-size: 20px;
            }

            .info-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }

            .editable-fields {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        @media (max-width: 576px) {
            .sidebar-header span {
                display: none;
            }

            .content-section {
                margin: 10px;
                padding: 15px;
            }

            .profile-container {
                padding: 15px;
            }

            .page-title {
                font-size: 18px;
            }

            .photo-box, .info-box {
                padding: 15px;
            }

            .info-grid {
                grid-template-columns: repeat(1, 1fr);
                gap: 10px;
            }

            .photo-preview {
                width: 150px;
                height: 180px;
            }

            .photo-placeholder {
                font-size: 70px;
            }

            .editable-fields {
                gap: 10px;
            }

            .save-btn {
                padding: 10px 20px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-header">
            <a href="<?php echo base_url('resident/dashboard'); ?>" style="text-decoration: none; color: white; display: flex; align-items: center;">
                <img src="https://imgs.search.brave.com/_9_S3mRt93p8h2AfZyT_hS5e-yaRfmIW6yufo2z08L8/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly91cGxv/YWQud2lraW1lZGlh/Lm9yZy93aWtpcGVk/aWEvY29tbW9ucy84/LzhlL0JhcmFuZ2F5/LnN2Zw" alt="Logo" style="width: 40px; height: 40px; margin-right: 10px;">
                <span style="font-size: 18px; font-weight: bold;">Barangay System</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="<?php echo base_url('resident/dashboard'); ?>">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('resident/request'); ?>">
                    <i class="fas fa-file-alt"></i> Request
                </a>
            </li>
            <li class="active">
                <a href="<?php echo base_url('resident/profile'); ?>">
                    <i class="fas fa-user"></i> Profile
                </a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="top-bar">
            <a href="<?php echo base_url('logout'); ?>" class="logout-btn">Logout</a>
        </div>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?php echo session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <div class="content-section">
            <div class="profile-container">
                <div class="page-title">Manage Details</div>

                <form method="POST" action="<?php echo base_url('resident/profile/update'); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="profile-layout">
                        <div class="photo-section">
                            <div class="photo-box">
                                <div class="photo-box-title">Photo</div>
                                <div class="photo-preview">
                                    <?php if (!empty($resident['photo'])): ?>
                                        <img src="<?php echo base_url('uploads/residents/' . htmlspecialchars($resident['photo'])); ?>" alt="Profile Photo" id="photoDisplay">
                                    <?php else: ?>
                                        <i class="fas fa-user photo-placeholder"></i>
                                    <?php endif; ?>
                                </div>
                                <label for="photoInput" class="browse-btn">
                                    <i class="fas fa-folder-open"></i> Browse
                                </label>
                                <input type="file" name="photo" id="photoInput" accept="image/*" onchange="previewPhoto(this)">
                            </div>
                        </div>

                        <div class="info-section">
                            <div class="info-box">
                                <div class="info-box-title">Personal Information</div>
                                <div class="info-grid">
                                    <div class="info-field">
                                        <label>Last Name</label>
                                        <div class="value"><?php echo htmlspecialchars($resident['lname']); ?></div>
                                    </div>
                                    <div class="info-field">
                                        <label>First Name</label>
                                        <div class="value"><?php echo htmlspecialchars($resident['fname']); ?></div>
                                    </div>
                                    <div class="info-field">
                                        <label>Middle Name</label>
                                        <div class="value"><?php echo htmlspecialchars($resident['middle_name'] ?? ''); ?></div>
                                    </div>
                                    <div class="info-field">
                                    </div>

                                    <div class="info-field">
                                        <label>Date of Birth</label>
                                        <div class="value"><?php echo htmlspecialchars($resident['birthdate']); ?></div>
                                    </div>
                                    <div class="info-field">
                                        <label>Age</label>
                                        <div class="value">
                                            <?php 
                                                if (!empty($resident['birthdate']) && $resident['birthdate'] != '0000-00-00') {
                                                    $bday = $resident['birthdate'];
                                                    $birthYear = substr($bday, 0, 4);
                                                    $birthMonth = substr($bday, 5, 2);
                                                    $birthDay = substr($bday, 8, 2);
                                                    
                                                    $currentYear = date('Y');
                                                    $currentMonth = date('m');
                                                    $currentDay = date('d');
                                                    
                                                    $age = $currentYear - $birthYear;
                                                    
                                                    if ($currentMonth < $birthMonth || ($currentMonth == $birthMonth && $currentDay < $birthDay)) {
                                                        $age = $age - 1;
                                                    }
                                                    
                                                    echo $age;
                                                } else {
                                                    echo '-';
                                                }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="info-field">
                                        <label>Religion</label>
                                        <div class="value"><?php echo htmlspecialchars($resident['religion']); ?></div>
                                    </div>
                                    <div class="info-field">
                                        <label>Gender</label>
                                        <div class="value"><?php echo htmlspecialchars($resident['gender']); ?></div>
                                    </div>

                                    <div class="info-field">
                                        <label>Civil Status</label>
                                        <div class="value"><?php echo htmlspecialchars($resident['civil_status']); ?></div>
                                    </div>
                                    <div class="info-field">
                                        <label>Solo Parent</label>
                                        <div class="value"><?php echo $resident['is_solo_parent'] ? 'Yes' : 'No'; ?></div>
                                    </div>
                                    <div class="info-field">
                                        <label>Registered Voter</label>
                                        <div class="value"><?php echo $resident['is_registered_voter'] ? 'Yes' : 'No'; ?></div>
                                    </div>
                                    <div class="info-field">
                                        <label>PWD</label>
                                        <div class="value"><?php echo $resident['is_pwd'] ? 'Yes' : 'No'; ?></div>
                                    </div>

                                    <div class="info-field">
                                        <label>4PS Beneficiary</label>
                                        <div class="value"><?php echo $resident['is_4ps'] ? 'Yes' : 'No'; ?></div>
                                    </div>
                                </div>
                                <div class="editable-fields">
                                    <div class="info-field">
                                        <label>Contact No.</label>
                                        <input type="text" name="contact_no" value="<?php echo htmlspecialchars($resident['contact_no'] ?? ''); ?>" pattern="[0-9]{11}" maxlength="11" placeholder="09XXXXXXXXX" title="Please enter exactly 11 digits">
                                    </div>
                                    <div class="info-field">
                                        <label>Purok No.</label>
                                        <select name="purok_no">
                                            <option value="">Select Purok</option>
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                <option value="<?php echo $i; ?>" <?php echo ($resident['purok_no'] == $i) ? 'selected' : ''; ?>>
                                                    Purok <?php echo $i; ?>
                                                </option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div class="info-field">
                                        <label>Nationality</label>
                                        <input type="text" name="nationality" value="<?php echo htmlspecialchars($resident['nationality'] ?? ''); ?>">
                                    </div>
                                </div>
                                <button type="submit" class="save-btn">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewPhoto(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('.photo-preview').innerHTML = '<img src="' + e.target.result + '" alt="Profile Photo" id="photoDisplay">';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
