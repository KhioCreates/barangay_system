<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Certificates - Barangay System</title>
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
            background-color: #b30000;
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

        .btn-view {
            background-color: #dc0000;
            color: white;
            border: none;
            padding: 5px 15px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 12px;
        }

        .btn-view:hover {
            background-color: #b30000;
            text-decoration: none;
            color: white;
        }

        .alert {
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
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

        .btn-approve {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }

        .btn-approve:hover {
            background-color: #218838;
            text-decoration: none;
            color: white;
        }

        .btn-disapprove {
            background-color: #dc0000;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            display: inline-block;
        }

        .btn-disapprove:hover {
            background-color: #b30000;
            text-decoration: none;
            color: white;
        }

        .btn-print {
            background-color: #0066cc;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
            margin-right: 10px;
        }

        .btn-print:hover {
            background-color: #004499;
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

            table {
                font-size: 12px;
            }

            table th, table td {
                padding: 8px;
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
                font-size: 16px;
            }

            table {
                font-size: 11px;
            }

            table th, table td {
                padding: 6px;
            }

            .btn-view {
                padding: 4px 10px;
                font-size: 10px;
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

            .alert {
                display: none;
            }

            .content-box {
                display: none;
            }

            .modal-header {
                display: none;
            }

            .modal-footer {
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
            <li>
                <a href="<?php echo base_url('admin/residents'); ?>">
                    <i class="fas fa-users"></i> Residents
                </a>
            </li>
            <li class="active">
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

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?php echo session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-error">
                <strong>Failed!</strong> <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <div class="content-section">
            <div class="page-title">
                <i class="fas fa-certificate"></i> Manage Certificates
            </div>

            <div style="overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Purpose</th>
                            <th>Date</th>
                            <th>Qty</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($requests): ?>
                            <?php foreach ($requests as $request): ?>
                                <tr>
                                    <td><?php echo $request['fname'] . ' ' . $request['lname']; ?></td>
                                    <td><?php echo $request['cert_type']; ?></td>
                                    <td><?php echo $request['purpose']; ?></td>
                                    <td><?php echo date('Y-m-d', strtotime($request['created_at'])); ?></td>
                                    <td>1</td>
                                    <td>
                                        <button class="btn-view" data-bs-toggle="modal" data-bs-target="#detailsModal" 
                                            onclick="showDetails('<?php echo $request['fname']; ?>', 
                                                                 '<?php echo $request['lname']; ?>', 
                                                                 '<?php echo $request['middle_name']; ?>', 
                                                                 '<?php echo $request['contact_no']; ?>', 
                                                                 '<?php echo $request['cert_type']; ?>', 
                                                                 '<?php echo $request['purpose']; ?>', 
                                                                 '<?php echo $request['id']; ?>')">
                                            View
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" style="text-align: center; padding: 20px;">No certificate requests found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailsModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Manage Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div style="display: flex; gap: 20px; margin-bottom: 15px;">
                        <div style="flex: 1;">
                            <label style="font-weight: bold; display: block; margin-bottom: 5px;">Last Name</label>
                            <p id="detail-lname" style="color: #666; padding: 10px; background-color: #f9f9f9; margin: 0; border-radius: 5px;"></p>
                        </div>
                        <div style="flex: 1;">
                            <label style="font-weight: bold; display: block; margin-bottom: 5px;">First Name</label>
                            <p id="detail-fname" style="color: #666; padding: 10px; background-color: #f9f9f9; margin: 0; border-radius: 5px;"></p>
                        </div>
                    </div>

                    <div style="display: flex; gap: 20px; margin-bottom: 15px;">
                        <div style="flex: 1;">
                            <label style="font-weight: bold; display: block; margin-bottom: 5px;">Middle Name</label>
                            <p id="detail-mname" style="color: #666; padding: 10px; background-color: #f9f9f9; margin: 0; border-radius: 5px;"></p>
                        </div>
                        <div style="flex: 1;">
                            <label style="font-weight: bold; display: block; margin-bottom: 5px;">Contact Number</label>
                            <p id="detail-contact" style="color: #666; padding: 10px; background-color: #f9f9f9; margin: 0; border-radius: 5px;"></p>
                        </div>
                    </div>

                    <div style="display: flex; gap: 20px; margin-bottom: 15px;">
                        <div style="flex: 1;">
                            <label style="font-weight: bold; display: block; margin-bottom: 5px;">Type of Certificate</label>
                            <p id="detail-type" style="color: #666; padding: 10px; background-color: #f9f9f9; margin: 0; border-radius: 5px;"></p>
                        </div>
                        <div style="flex: 1;">
                            <label style="font-weight: bold; display: block; margin-bottom: 5px;">Purpose</label>
                            <p id="detail-purpose" style="color: #666; padding: 10px; background-color: #f9f9f9; margin: 0; border-radius: 5px;"></p>
                        </div>
                    </div>

                    <div style="display: flex; gap: 20px; margin-bottom: 15px;">
                        <div style="flex: 1;">
                            <label style="font-weight: bold; display: block; margin-bottom: 5px;">Quantity</label>
                            <p style="color: #666; padding: 10px; background-color: #f9f9f9; margin: 0; border-radius: 5px;">1</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="justify-content: center;">
                    <button type="button" class="btn-approve" onclick="approveCertificate()">Approve</button>
                    <button type="button" class="btn-disapprove" data-bs-toggle="modal" data-bs-target="#disapproveModal" data-bs-dismiss="modal">Disapprove</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="certificateModal" tabindex="-1">
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

                        <div class="cert-title">
                            <span id="cert-title-text">BARANGAY CLEARANCE</span>
                        </div>

                        <div class="cert-content">
                            <p>To Whom It May Concern:</p>
                            
                            <p>
                                This is to certify that <strong><span id="cert-name">RESIDENT NAME</span></strong>, 
                                of legal age, is a resident of Barangay Santiago, Concepcion, Tarlac.
                            </p>

                            <p>
                                This further certifies that he/she is a person of good moral character, law-abiding citizen 
                                and has never been convicted of any crime involving moral turpitude nor been a member of any 
                                subversive organization which seeks to overthrow our government.
                            </p>

                            <p style="margin: 20px 0;">
                                <strong>Purpose:</strong> <span id="cert-purpose">Employment</span><br>
                                <strong>Date Requested:</strong> <span id="cert-date">October 31, 2025</span>
                            </p>

                            <p>
                                Issued this <strong id="cert-day">15</strong> day of <strong id="cert-month">November 2025</strong> upon request of the above named for whatever 
                                legal purpose it may serve.
                            </p>
                        </div>

                        <div class="cert-signature">
                            <div class="cert-signature-block">
                                <div class="sig-line"></div>
                                <p class="sig-name">Barangay Chairman</p>
                            </div>
                            <div class="cert-signature-block">
                                <p class="sig-name">Not Valid w/o dry sealed</p>
                            </div>
                        </div>

                        <div class="cert-footer">
                            <p>Community Tax Cert. No.: <strong id="cert-tax-no">CTC-5432</strong></p>
                            <p>Date of Issue: <strong id="cert-issue-date">15/11/2025</strong></p>
                            <p>Place of Issue: <strong id="cert-place">Barangay Santiago</strong></p>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn-print" onclick="window.print()">Print Certificate</button>
                    <button type="button" class="btn-approve" onclick="approveAndSave()">Approve & Save</button>
                    <button type="button" class="btn-disapprove" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="disapproveModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Disapprove Certificate</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label style="font-weight: bold;">Reason for Disapproval:</label>
                    <textarea id="reason" placeholder="Enter reason..." style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; height: 100px; margin-top: 10px;"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-approve" onclick="submitDisapprove()">Submit Disapproval</button>
                    <button type="button" class="btn-disapprove" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
        var currentRequestId = null;

        function showDetails(fname, lname, mname, contact, cert_type, purpose, id) {
            currentRequestId = id;
            
            document.getElementById('detail-fname').textContent = fname;
            document.getElementById('detail-lname').textContent = lname;
            document.getElementById('detail-mname').textContent = mname;
            document.getElementById('detail-contact').textContent = contact;
            document.getElementById('detail-type').textContent = cert_type;
            document.getElementById('detail-purpose').textContent = purpose;
        }

        function approveCertificate() {
            var fname = document.getElementById('detail-fname').textContent;
            var lname = document.getElementById('detail-lname').textContent;
            var cert_type = document.getElementById('detail-type').textContent;
            var purpose = document.getElementById('detail-purpose').textContent;

            document.getElementById('cert-name').textContent = fname + ' ' + lname;
            document.getElementById('cert-title-text').textContent = cert_type;
            document.getElementById('cert-purpose').textContent = purpose;
            
            var today = new Date();
            var date_str = today.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
            document.getElementById('cert-date').textContent = date_str;

            var today_day = today.getDate();
            var today_month = today.getMonth() + 1;
            var today_year = today.getFullYear();
            
            var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            var currentMonth = months[today.getMonth()];
            var currentYear = today.getFullYear();
            
            document.getElementById('cert-day').textContent = today_day;
            document.getElementById('cert-month').textContent = currentMonth + ' ' + currentYear;
            
            var randomTax = Math.floor(Math.random() * 9000) + 1000;
            document.getElementById('cert-tax-no').textContent = 'CTC-' + randomTax;
            
            var formattedDate = today_day + '/' + today_month + '/' + today_year;
            document.getElementById('cert-issue-date').textContent = formattedDate;

            var detailsModal = bootstrap.Modal.getInstance(document.getElementById('detailsModal'));
            detailsModal.hide();

            var certificateModal = new bootstrap.Modal(document.getElementById('certificateModal'));
            certificateModal.show();
        }

        function submitDisapprove() {
            var reason = document.getElementById('reason').value;
            
            if (reason.trim() === '') {
                alert('Please enter a reason for disapproval!');
                return;
            }
            
            var disapproveUrl = "<?php echo base_url('/admin/certification/reject/'); ?>" + currentRequestId + "?reason=" + encodeURIComponent(reason);
            window.location.href = disapproveUrl;
        }

        function approveAndSave() {
            var taxNo = document.getElementById('cert-tax-no').textContent.replace('CTC-', '');
            var approveUrl = "<?php echo base_url('/admin/certification/approve/'); ?>" + currentRequestId + "?taxNo=" + taxNo;
            window.location.href = approveUrl;
        }
    </script>
</body>
</html>
