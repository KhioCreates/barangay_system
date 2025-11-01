<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Officials - Barangay System</title>
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
            transition: all 0.3s;
        }

        .sidebar-menu li:hover {
            background-color: #999;
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

        .content-section {
            background-color: white;
            margin: 30px;
            padding: 40px;
            border-radius: 10px;
        }




        .page-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .btn-add {
            background-color: #dc0000;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
        }

        .btn-add:hover {
            background-color: #b30000;
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
        }

        .logout-btn:hover {
            background-color: #b30000;
        }

        table {
            width: 100%;
            margin-top: 20px;
        }

        table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .btn-delete {
            background-color: #dc0000;
            color: white;
            border: none;
            padding: 6px 15px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 12px;
            text-decoration: none;
        }

        .btn-delete:hover {
            background-color: #b30000;
        }

        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-overlay.show {
            display: flex;
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
    </style>
</head>
<body>
     <!-- SIDEBAR -->
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
            <li class="active">
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


    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="top-bar">
            <a href="<?php echo base_url('logout'); ?>" class="logout-btn">Logout</a>
        </div>

        <div class="content-section">

            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <div class="page-title">Officials List</div>
                <button class="btn-add" onclick="openAddModal()">
                    <i class="fas fa-plus"></i> Add Official
                </button>
            </div>

            <!-- OFFICIALS TABLE -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Position</th>
                        <th>Gender</th>
                        <th>Civil Status</th>
                        <th>Contact No.</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($officials)): ?>
                        <?php foreach ($officials as $official): ?>
                            <tr>
                                <td><?php echo $official['first_name']; ?></td>
                                <td><?php echo $official['last_name']; ?></td>
                                <td><?php echo $official['position']; ?></td>
                                <td><?php echo $official['gender']; ?></td>
                                <td><?php echo $official['civil_status']; ?></td>
                                <td><?php echo $official['contact_no']; ?></td>
                                <td>
                                    <a href="<?php echo base_url('admin/officials/delete/' . $official['id']); ?>" class="btn-delete" onclick="return confirm('Delete this official?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 30px;">No officials found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- ADD MODAL OVERLAY -->
    <div class="modal-overlay" id="addModal">
        <div class="modal-box">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                <div class="modal-title" style="flex: 1; margin: 0; text-align: center;">ADD OFFICIALS</div>
                <button style="background: none; border: none; font-size: 24px; cursor: pointer; color: #999;" onclick="closeAddModal()">×</button>
            </div>

<form method="POST" action="<?php echo base_url('admin/officials/save'); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    
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

    <!-- Row 4: Photo Upload -->
    <div class="form-row">
        <div class="form-group">
            <label>Photo</label>
            <input type="file" name="photo" accept="image/*" required>
        </div>
    </div>

    <!-- Submit Button -->
    <div style="text-align: center; margin-top: 20px;">
        <button type="submit" class="btn btn-success">Add Official</button>
    </div>
</form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function openAddModal() {
            document.getElementById('addModal').classList.add('show');
        }

        function closeAddModal() {
            document.getElementById('addModal').classList.remove('show');
        }

        // Close modal when clicking outside
        document.getElementById('addModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeAddModal();
            }
        });
    </script>
</body>
</html>
