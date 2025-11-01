<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Official - Barangay System</title>
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
            color: white;
            padding-top: 20px;
        }

        .sidebar-header {
            padding: 15px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            padding: 15px 20px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .sidebar-menu li:hover {
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
            padding: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-box {
            background-color: white;
            padding: 50px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            max-width: 700px;
            width: 90%;
        }

        .modal-title {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        .form-row.full {
            grid-template-columns: 1fr;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            text-align: center;
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-group input,
        .form-group select {
            padding: 12px;
            border: 2px solid #333;
            border-radius: 25px;
            font-size: 14px;
            padding-left: 20px;
            padding-right: 20px;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #dc0000;
            box-shadow: 0 0 5px rgba(220, 0, 0, 0.3);
        }

        .button-group {
            display: flex;
            gap: 20px;
            margin-top: 40px;
            justify-content: center;
        }

        .btn-ok {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 50px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        .btn-ok:hover {
            background-color: #45a049;
        }

        .btn-cancel {
            background-color: #777;
            color: white;
            border: none;
            padding: 12px 50px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
        }

        .btn-cancel:hover {
            background-color: #555;
            color: white;
        }

        .logout-btn {
            background-color: #dc0000;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            position: fixed;
            top: 20px;
            right: 30px;
        }
    </style>
</head>
<body>
    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="sidebar-header">
            <i class="fas fa-users"></i> Barangay Capas
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
            <li>
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

    <a href="<?php echo base_url('logout'); ?>" class="logout-btn">Logout</a>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <!-- MODAL -->
        <div class="modal-overlay">
            <div class="modal-box">
                <div class="modal-title">ADD OFFICIALS</div>

                <form method="POST" action="<?php echo base_url('admin/officials/save'); ?>">
                    <!-- Row 1: First Name and Last Name -->
                    <div class="form-row">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="fname" required>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lname" required>
                        </div>
                    </div>

                    <!-- Row 2: Gender and Civil Status -->
                    <div class="form-row">
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" required>
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Civil Status</label>
                            <select name="civil_status" required>
                                <option value="">Select</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                            </select>
                        </div>
                    </div>

                    <!-- Row 3: Contact No. and Position -->
                    <div class="form-row">
                        <div class="form-group">
                            <label>Contact No.</label>
                            <input type="text" name="contact" required>
                        </div>
                        <div class="form-group">
                            <label>Position</label>
                            <select name="position" required>
                                <option value="">Select</option>
                                <option value="Barangay Captain">Barangay Captain</option>
                                <option value="Barangay Secretary">Barangay Secretary</option>
                                <option value="Barangay Treasurer">Barangay Treasurer</option>
                                <option value="Barangay Kagawad">Barangay Kagawad</option>
                            </select>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="button-group">
                        <button type="submit" class="btn-ok">OK</button>
                        <a href="<?php echo base_url('admin/officials'); ?>" class="btn-cancel">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
