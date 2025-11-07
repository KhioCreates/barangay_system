<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Certificates - Barangay System</title>
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

        .sidebar-header a {
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
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

        .content-section {
            background-color: white;
            margin: 30px;
            padding: 40px;
            border-radius: 10px;
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

        .page-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 30px;
        }

        .certificates-box {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .certificates-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #333;
        }

        .certificate-item {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .certificate-header {
            display: flex;
            align-items: center;
        }

        .certificate-item input[type="checkbox"] {
            width: 20px;
            height: 20px;
            margin-right: 15px;
            cursor: pointer;
        }

        .certificate-info {
            flex: 1;
        }

        .certificate-name {
            font-weight: bold;
            font-size: 14px;
            display: flex;
            align-items: center;
            margin: 0;
        }

        .certificate-name label {
            margin: 0;
            cursor: pointer;
        }

        .certificate-price {
            color: #666;
            font-size: 12px;
            margin-left: 10px;
        }

        .certificate-purpose {
            display: none;
            margin-top: 10px;
        }

        .certificate-purpose textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 12px;
            resize: none;
            height: 60px;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-submit {
            background-color: #dc0000;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
        }

        .btn-submit:hover {
            background-color: #a01830;
        }

        .btn-back {
            background-color: #666;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }

        .btn-back:hover {
            background-color: #555;
            text-decoration: none;
            color: white;
        }

        .requests-box {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .requests-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #333;
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

        .status-badge {
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
            display: inline-block;
        }

        .status-pending {
            background-color: #ffc107;
            color: #000;
        }

        .status-approved {
            background-color: #28a745;
            color: white;
        }

        .status-rejected {
            background-color: #dc0000;
            color: white;
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

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .no-requests {
            text-align: center;
            padding: 20px;
            color: #999;
        }

        .btn-print {
            background-color: #0066cc;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
        }

        .btn-print:hover {
            background-color: #004499;
        }

        .btn-reason {
            background-color: #ff9800;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
        }

        .btn-reason:hover {
            background-color: #e68900;
        }

        .certificate-box {
            background-color: white;
            padding: 40px;
            text-align: center;
            border: 2px solid #333;
            margin: 20px 0;
        }

        .cert-header {
            border-bottom: 3px solid #dc0000;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .cert-header h3 {
            font-size: 14px;
            margin: 5px 0;
            font-weight: normal;
        }

        .cert-header h2 {
            font-size: 18px;
            margin: 10px 0;
            font-weight: bold;
        }

        .cert-title {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin: 30px 0;
            text-decoration: underline;
        }

        .cert-content {
            text-align: justify;
            margin: 30px 0;
            line-height: 1.8;
            font-size: 13px;
        }

        .cert-content p {
            margin: 10px 0;
        }

        .cert-signature {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .cert-signature-block {
            text-align: center;
            width: 45%;
        }

        .sig-line {
            border-bottom: 1px solid #333;
            margin: 30px 0;
            min-height: 60px;
        }

        .sig-name {
            font-size: 12px;
            margin: 0;
            font-weight: bold;
        }

        .cert-footer {
            margin-top: 40px;
            text-align: center;
            font-size: 11px;
            color: #666;
        }

        /* Mobile responsive */
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

            .page-title {
                font-size: 20px;
            }

            .certificates-box, .requests-box {
                padding: 15px;
            }

            .certificate-item {
                padding: 10px;
            }

            table {
                font-size: 12px;
            }

            table th, table td {
                padding: 8px;
            }

            .btn-print, .btn-reason {
                padding: 4px 8px;
                font-size: 10px;
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

            .page-title {
                font-size: 18px;
            }

            .certificates-box, .requests-box {
                padding: 10px;
            }

            .button-group {
                flex-direction: column;
            }

            .btn-submit, .btn-back {
                width: 100%;
            }

            table {
                font-size: 11px;
            }

            table th, table td {
                padding: 6px;
            }

            .certificate-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .certificate-item input[type="checkbox"] {
                margin-bottom: 10px;
            }
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
                background: white;
            }
            .sidebar {
                display: none;
            }
            .main-content {
                margin-left: 0;
                padding: 0;
                background: white;
            }
            .top-bar {
                display: none;
            }
            .content-section {
                display: none;
            }
            .requests-box {
                display: none;
            }
            .certificates-box {
                display: none;
            }
            .modal-header, .modal-footer {
                display: none;
            }
            .modal-dialog {
                max-width: 100%;
                margin: 0;
                padding: 0;
            }
            .modal-content {
                border: none;
                box-shadow: none;
            }
            .modal-body {
                max-height: none;
                overflow: visible;
                padding: 0;
            }
            .certificate-box {
                border: none;
                margin: 0;
                padding: 40px;
                box-shadow: none;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <a href="<?php echo base_url('resident/dashboard'); ?>">
                <img src="https://imgs.search.brave.com/_9_S3mRt93p8h2AfZyT_hS5e-yaRfmIW6yufo2z08L8/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly91cGxv/YWQud2lraW1lZGlh/Lm9yZy93aWtpcGVk/aWEvY29tbW9ucy84/LzhlL0JhcmFuZ2F5/LnN2Zw" alt="Logo">
                <span style="font-size: 18px; font-weight: bold;">Barangay System</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="<?php echo base_url('resident/dashboard'); ?>">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>
            <li class="active">
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

            <div class="page-title">Request Certificates</div>
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <strong>Success!</strong> <?php echo session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-error">
                    <strong>Error!</strong> <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <div class="certificates-box">
                <div class="certificates-title">Select Certificates</div>

                <form method="POST" action="<?php echo base_url('resident/request/submit'); ?>" onsubmit="return validateForm(event)">
                    <?php echo csrf_field(); ?>

                    <div class="certificate-item">
                        <div class="certificate-header">
                            <input type="checkbox" name="certificates[]" value="Barangay Clearance" id="cert1" onchange="togglePurpose(this, 'purpose-1')">
                            <div class="certificate-info">
                                <label for="cert1" class="certificate-name">
                                    Barangay Clearance
                                    <span class="certificate-price">- ₱ 0.00</span>
                                </label>
                            </div>
                        </div>
                        <div class="certificate-purpose" id="purpose-1">
                            <textarea name="purpose[Barangay Clearance]" placeholder="Enter purpose..."></textarea>
                        </div>
                    </div>

                    <div class="certificate-item">
                        <div class="certificate-header">
                            <input type="checkbox" name="certificates[]" value="Business Clearance" id="cert2" onchange="togglePurpose(this, 'purpose-2')">
                            <div class="certificate-info">
                                <label for="cert2" class="certificate-name">
                                    Business Clearance
                                    <span class="certificate-price">- ₱ 0.00</span>
                                </label>
                            </div>
                        </div>
                        <div class="certificate-purpose" id="purpose-2">
                            <textarea name="purpose[Business Clearance]" placeholder="Enter purpose..."></textarea>
                        </div>
                    </div>

                    <div class="certificate-item">
                        <div class="certificate-header">
                            <input type="checkbox" name="certificates[]" value="Barangay Certificate" id="cert3" onchange="togglePurpose(this, 'purpose-3')">
                            <div class="certificate-info">
                                <label for="cert3" class="certificate-name">
                                    Barangay Certificate
                                    <span class="certificate-price">- ₱ 0.00</span>
                                </label>
                            </div>
                        </div>
                        <div class="certificate-purpose" id="purpose-3">
                            <textarea name="purpose[Barangay Certificate]" placeholder="Enter purpose..."></textarea>
                        </div>
                    </div>

                    <div class="certificate-item">
                        <div class="certificate-header">
                            <input type="checkbox" name="certificates[]" value="Certificate of Indigency" id="cert4" onchange="togglePurpose(this, 'purpose-4')">
                            <div class="certificate-info">
                                <label for="cert4" class="certificate-name">
                                    Certificate of Indigency
                                    <span class="certificate-price">- ₱ 0.00</span>
                                </label>
                            </div>
                        </div>
                        <div class="certificate-purpose" id="purpose-4">
                            <textarea name="purpose[Certificate of Indigency]" placeholder="Enter purpose..."></textarea>
                        </div>
                    </div>

                    <div class="certificate-item">
                        <div class="certificate-header">
                            <input type="checkbox" name="certificates[]" value="Medical Assistance" id="cert5" onchange="togglePurpose(this, 'purpose-5')">
                            <div class="certificate-info">
                                <label for="cert5" class="certificate-name">
                                    Medical Assistance
                                    <span class="certificate-price">- ₱ 0.00</span>
                                </label>
                            </div>
                        </div>
                        <div class="certificate-purpose" id="purpose-5">
                            <textarea name="purpose[Medical Assistance]" placeholder="Enter purpose..."></textarea>
                        </div>
                    </div>

                    <div class="button-group">
                        <button type="submit" class="btn-submit">Submit Request</button>
                    </div>
                </form>
            </div>

            <div class="requests-box">
                <div class="requests-title">Certificate Requests</div>

                <?php if (!empty($requests)): ?>
                    <div style="overflow-x: auto;">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Certificate Name</th>
                                    <th>Price</th>
                                    <th>Request Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($requests as $req): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($req['id']); ?></td>
                                        <td><?php echo htmlspecialchars($req['cert_type']); ?></td>
                                        <td>₱ 0.00</td>
                                        <td><?php echo date('Y-m-d', strtotime($req['created_at'])); ?></td>
                                        <td>
                                            <span class="status-badge status-<?php echo strtolower($req['status']); ?>">
                                                <?php echo htmlspecialchars($req['status']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php if ($req['status'] === 'Approved'): ?>
                                                <button class="btn-print" type="button" onclick="openPrintModal('<?php echo addslashes($req['fname']); ?>', '<?php echo addslashes($req['lname']); ?>', '<?php echo addslashes($req['cert_type']); ?>', '<?php echo addslashes($req['purpose']); ?>', '<?php echo htmlspecialchars($req['community_tax_no']); ?>')">Print</button>
                                            <?php endif; ?>
                                            
                                            <?php if ($req['status'] === 'Rejected'): ?>
                                                <button class="btn-reason" type="button" onclick="showReason('<?php echo addslashes(htmlspecialchars($req['remarks'])); ?>')">View Reason</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="no-requests">
                        No certificate requests yet. Submit one above!
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="printCertificateModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Official Certificate</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="certificate-box">
                        <div class="cert-header">
                            <img src="https://imgs.search.brave.com/_9_S3mRt93p8h2AfZyT_hS5e-yaRfmIW6yufo2z08L8/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly91cGxv/YWQud2lraW1lZGlh/Lm9yZy93aWtpcGVk/aWEvY29tbW9ucy84/LzhlL0JhcmFuZ2F5/LnN2Zw" alt="Logo" style="width: 60px; height: auto; margin-bottom: 10px;">
                            <h3>Republic of the Philippines</h3>
                            <h3>Province of Tarlac</h3>
                            <h2>CITY OF CONCEPCION</h2>
                            <p style="font-size: 12px; margin: 5px 0;">Barangay Santiago</p>
                        </div>

                        <div class="cert-title"><span id="cert-title-text">BARANGAY CLEARANCE</span></div>

                        <div class="cert-content">
                            <p>To Whom It May Concern</p>
                            <p>This is to certify that <strong><span id="cert-name">RESIDENT NAME</span></strong>, of legal age, is a resident of Barangay Santiago, Concepcion, Tarlac.</p>
                            <p>This further certifies that he/she is a person of good moral character, law-abiding citizen and has never been convicted of any crime involving moral turpitude nor been a member of any subversive organization which seeks to overthrow our government.</p>
                            <p style="margin: 20px 0;">
                                <strong>Purpose</strong> <span id="cert-purpose">Employment</span><br>
                                <strong>Date Requested</strong> <span id="cert-date">October 31, 2025</span>
                            </p>
                            <p>Issued this <strong><span id="cert-day">15</span></strong> day of <strong><span id="cert-month">November 2025</span></strong> upon request of the above named for whatever legal purpose it may serve.</p>
                        </div>

                        <div class="cert-signature">
                            <div class="cert-signature-block">
                                <div class="sig-line"></div>
                                <p class="sig-name">Barangay Chairman</p>
                            </div>
                            <div class="cert-signature-block">
                                <p class="sig-name">Not Valid w/o dry seal</p>
                            </div>
                        </div>

                        <div class="cert-footer">
                            <p>Community Tax Cert. No. <strong id="cert-tax-no">CTC-5432</strong></p>
                            <p>Date of Issue <strong id="cert-issue-date">15112025</strong></p>
                            <p>Place of Issue <strong id="cert-place">Barangay Santiago</strong></p>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn-print" onclick="window.print()">Print Certificate</button>
                    <button type="button" class="btn-back" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function togglePurpose(checkbox, purposeId) {
            var purposeDiv = document.getElementById(purposeId);
            if (checkbox.checked) {
                purposeDiv.style.display = 'block';
            } else {
                purposeDiv.style.display = 'none';
                purposeDiv.querySelector('textarea').value = '';
            }
        }

        function validateForm(event) {
            var checkboxes = document.querySelectorAll('input[name="certificates[]"]:checked');
            
            if (checkboxes.length === 0) {
                event.preventDefault();
                alert('Please select at least one certificate!');
                return false;
            }

            for (var i = 0; i < checkboxes.length; i++) {
                var cert = checkboxes[i];
                var certValue = cert.value;
                var purposeTextarea = document.querySelector('textarea[name="purpose[' + certValue + ']"]');
                
                if (purposeTextarea && purposeTextarea.value.trim() === '') {
                    event.preventDefault();
                    alert('Please enter purpose for ' + certValue);
                    return false;
                }
            }
            
            return true;
        }

        function openPrintModal(fname, lname, certtype, purpose, taxNo) {
            document.getElementById('cert-name').textContent = fname + ' ' + lname;
            document.getElementById('cert-title-text').textContent = certtype;
            document.getElementById('cert-purpose').textContent = purpose;
            
            var today = new Date();
            var todayDay = today.getDate();
            var todayMonth = today.getMonth() + 1;
            var todayYear = today.getFullYear();
            var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            var currentMonth = months[today.getMonth()];
            var currentYear = today.getFullYear();
            
            document.getElementById('cert-day').textContent = todayDay;
            document.getElementById('cert-month').textContent = currentMonth + ' ' + currentYear;

            if (taxNo && taxNo.trim() !== '') {
                document.getElementById('cert-tax-no').textContent = 'CTC-' + taxNo;
            } else {
                var randomTax = Math.floor(Math.random() * 9000) + 1000;
                document.getElementById('cert-tax-no').textContent = 'CTC-' + randomTax;
            }
            
            var formattedDate = todayDay + '/' + todayMonth + '/' + todayYear;
            document.getElementById('cert-issue-date').textContent = formattedDate;
            
            var printModal = new bootstrap.Modal(document.getElementById('printCertificateModal'));
            printModal.show();
        }

        function showReason(reason) {
            if (reason && reason.trim() !== '') {
                alert('Reason for Rejection:\n\n' + reason);
            } else {
                alert('No reason provided for rejection.');
            }
        }
    </script>
</body>
</html>
