<!DOCTYPE html>
<html>
<head>
    <title>View Request</title>
    <style>
        body {
            font-family: Arial;
            margin: 0;
            padding: 0;
        }
        
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #dc0000;
            position: fixed;
            left: 0;
            top: 0;
            color: white;
            padding: 20px 0;
        }
        
        .sidebar h3 {
            text-align: center;
            margin: 0;
            padding: 20px;
        }
        
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 15px 20px;
        }
        
        .sidebar a:hover {
            background: #999;
        }
        
        .sidebar a.active {
            background: #999;
        }
        
        .content {
            margin-left: 250px;
            padding: 30px;
            background: #e0e0e0;
            min-height: 100vh;
        }
        
        .top-bar {
            background: white;
            padding: 20px 30px;
            margin-bottom: 30px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .card {
            background: white;
            padding: 30px;
            border-radius: 5px;
            max-width: 600px;
        }
        
        h3 {
            text-align: center;
            margin-top: 0;
        }
        
        .info-row {
            margin-bottom: 15px;
            display: flex;
            padding: 10px;
            border: 1px solid #ddd;
        }
        
        .info-label {
            font-weight: bold;
            width: 150px;
        }
        
        .buttons {
            text-align: center;
            margin-top: 30px;
        }
        
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin: 5px;
            text-decoration: none;
            display: inline-block;
            color: white;
        }
        
        .btn-approve {
            background: #4CAF50;
        }
        
        .btn-approve:hover {
            background: #3d8b40;
        }
        
        .btn-reject {
            background: #dc0000;
        }
        
        .btn-reject:hover {
            background: #b00;
        }
        
        .btn-back {
            background: #777;
        }
        
        .btn-back:hover {
            background: #555;
        }
        
        .logout-btn {
            background: #dc0000;
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
        <h3>Barangay Capas</h3>
        <a href="/admin/dashboard">Dashboard</a>
        <a href="/admin/officials">Barangay Officials</a>
        <a href="/admin/residents">Residents</a>
        <a href="/admin/certification" class="active">Certification</a>
    </div>

    <div class="content">
        <div class="top-bar">
            <h2>View Request</h2>
            <a href="/logout" class="logout-btn">Logout</a>
        </div>

        <div class="card">
            <h3>Request Details</h3>
            
            <div class="info-row">
                <div class="info-label">Resident Name:</div>
                <div><?= $request['fname'] ?> <?= $request['lname'] ?></div>
            </div>
            
            <div class="info-row">
                <div class="info-label">Certificate Type:</div>
                <div><?= $request['cert_type'] ?></div>
            </div>
            
            <div class="info-row">
                <div class="info-label">Purpose:</div>
                <div><?= $request['purpose'] ?></div>
            </div>
            
            <div class="info-row">
                <div class="info-label">Date Requested:</div>
                <div><?= date('Y-m-d', strtotime($request['created_at'])) ?></div>
            </div>

            <div class="buttons">
                <a href="/admin/approve/<?= $request['id'] ?>" class="btn btn-approve">Approve</a>
                <a href="/admin/reject/<?= $request['id'] ?>" class="btn btn-reject">Reject</a>
                <a href="/admin/certification" class="btn btn-back">Back</a>
            </div>
        </div>
    </div>
</body>
</html>
