<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resident Dashboard - Barangay System</title>
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

        .content-section {
            background-color: white;
            margin: 30px;
            padding: 40px;
            border-radius: 10px;
        }

        .welcome-text {
            font-size: 32px;
            font-weight: bold;
            color: #333;
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

            .welcome-text {
                font-size: 24px;
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

            .welcome-text {
                font-size: 20px;
            }

            .logout-btn {
                padding: 8px 15px;
                font-size: 14px;
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
            <li class="active">
                <a href="<?php echo base_url('resident/dashboard'); ?>">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('resident/request'); ?>">
                    <i class="fas fa-file-alt"></i> Request
                </a>
            </li>
            <li>
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

        <div class="content-section">
            <div class="welcome-text">Welcome, <?php echo htmlspecialchars($user['fname']); ?>!</div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
