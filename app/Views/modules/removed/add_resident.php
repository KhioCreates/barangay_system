<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Resident - Barangay System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e0e0e0;
        }

        .button-row {
            text-align: center;
            margin-top: 30px;
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .btn-cancel {
            background-color: #999;
            color: white;
            border: none;
            padding: 12px 40px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
        }

        .btn-cancel:hover {
            background-color: #777;
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

        .main-content {
            margin-left: 250px;
            background-color: #e0e0e0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-box {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            width: 100%;
            max-width: 900px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }

        .modal-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
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
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .button-row {
            text-align: center;
            margin-top: 30px;
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
        }

        .top-bar {
            background-color: transparent;
            padding: 20px 30px;
            position: fixed;
            top: 0;
            right: 0;
            z-index: 100;
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
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="https://via.placeholder.com/40" alt="Logo">
            <span style="font-size: 18px; font-weight: bold;">Barangay Capas</span>
        </div>
        <ul class="sidebar-menu">
            <li><i class="fas fa-home"></i> Dashboard</li>
            <li><i class="fas fa-clipboard-list"></i> Barangay Officials</li>
            <li class="active"><i class="fas fa-users"></i> Residents</li>
            <li><i class="fas fa-certificate"></i> Certification</li>
        </ul>
    </div>

    <div class="top-bar">
        <a href="<?php echo base_url('logout'); ?>" class="logout-btn">Logout</a>
    </div>

    <div class="main-content">
        <div class="modal-box">
            <div class="modal-title">ADD RESIDENT</div>

            <form action="<?php echo base_url('admin/residents/store'); ?>" method="POST" enctype="multipart/form-data">
                
                <!-- Row 1 -->
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

                <!-- Row 2 -->
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

                <!-- Row 3 -->
                <div class="form-row">
                    <div class="form-col">
                        <label>Date of Birth</label>
                        <input type="date" name="birthdate" required>
                    </div>
                    <div class="form-col">
                        <label>Gender</label>
                        <select name="gender">
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-col">
                        <label>Civil Status</label>
                        <select name="civil_status">
                            <option value="">Select</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Separated">Separated</option>
                        </select>
                    </div>
                </div>

                <!-- Row 4 -->
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

                <!-- Row 5 -->
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

                <!-- Row 6 -->
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
                    <a href="<?php echo base_url('admin/residents'); ?>" class="btn-cancel">CANCEL</a>
                    <button type="submit" class="btn-ok">OK</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
