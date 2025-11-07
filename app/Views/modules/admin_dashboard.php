<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Barangay System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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

        .logout-btn:hover {
            background-color: #a01830;
        }

        .content-section {
            background-color: white;
            margin: 30px;
            padding: 40px;
            border-radius: 10px;
        }

        .section-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .card-row {
            margin-bottom: 30px;
        }

        .dashboard-card {
            background-color: #f0f0f0;
            padding: 25px 20px;
            border-radius: 10px;
            margin-bottom: 15px;
            height: 120px;
            position: relative;
        }

        .card-btn {
            padding: 6px 20px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 12px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-red { background-color: #dc0000; }
        .btn-blue { background-color: #4169E1; }
        .btn-darkblue { background-color: #3a5c7d; }
        .btn-yellow { background-color: #FFA500; }
        .btn-orange { background-color: #FF6347; }
        .btn-gray { background-color: #777; }

        .card-number {
            font-size: 36px;
            font-weight: bold;
            position: absolute;
            right: 20px;
            top: 30px;
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

            .card-row {
                display: flex;
                flex-direction: column;
            }
        }

        @media (max-width: 576px) {
            .sidebar-header span {
                display: none;
            }

            .dashboard-card {
                height: 100px;
                padding: 15px 10px;
            }

            .card-number {
                font-size: 24px;
                right: 10px;
                top: 20px;
            }

            .content-section {
                margin: 10px;
                padding: 15px;
            }

            .top-bar {
                padding: 15px;
            }
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
            <li class="active">
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

    <div class="main-content">
        <div class="top-bar">
            <a href="<?php echo base_url('logout'); ?>" class="logout-btn">Logout</a>
        </div>

        <div class="content-section">
            <div class="section-title">
                <i class="fas fa-file-alt"></i> Document Requests
            </div>
            
            <div class="row g-3 card-row">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="dashboard-card">
                        <h6>Pending Request</h6>
                        <a href="<?php echo base_url('admin/certification'); ?>" class="card-btn btn-red">View</a>
                        <div class="card-number"><?php echo $pending_requests; ?></div>
                    </div>
                </div>
            </div>

            <div class="section-title">
                <i class="fas fa-users"></i> Residents Data
            </div>
            
            <div class="row g-3 card-row">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="dashboard-card">
                        <h6>Total Residents</h6>
                        <a href="<?php echo base_url('admin/residents'); ?>" class="card-btn btn-blue">View</a>
                        <div class="card-number"><?php echo $total_residents; ?></div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="dashboard-card">
                        <h6>Single Mother</h6>
                        <a href="<?php echo base_url('admin/residents?filter=solo_parent'); ?>" class="card-btn btn-darkblue">View</a>
                        <div class="card-number"><?php echo $single_mother; ?></div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="dashboard-card">
                        <h6>Registered Voter</h6>
                        <a href="<?php echo base_url('admin/residents?filter=voter'); ?>" class="card-btn btn-gray">View</a>
                        <div class="card-number"><?php echo $registered_voter; ?></div>
                    </div>
                </div>
            </div>

            <div class="row g-3 card-row">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="dashboard-card">
                        <h6>Minors</h6>
                        <a href="<?php echo base_url('admin/residents?filter=minors'); ?>" class="card-btn btn-red">View</a>
                        <div class="card-number"><?php echo $minors; ?></div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="dashboard-card">
                        <h6>4Ps Beneficiary</h6>
                        <a href="<?php echo base_url('admin/residents?filter=4ps'); ?>" class="card-btn btn-yellow">View</a>
                        <div class="card-number"><?php echo $beneficiary_4ps; ?></div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="dashboard-card">
                        <h6>PWD</h6>
                        <a href="<?php echo base_url('admin/residents?filter=pwd'); ?>" class="card-btn btn-orange">View</a>
                        <div class="card-number"><?php echo $pwd; ?></div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="dashboard-card">
                        <h6>Senior Citizens</h6>
                        <a href="<?php echo base_url('admin/residents?filter=seniors'); ?>" class="card-btn btn-blue">View</a>
                        <div class="card-number"><?php echo $senior_citizens; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
