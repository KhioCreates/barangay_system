<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Basic Styling */
        body {
            font-family: Arial, sans-serif;
        }

        /* Navigation Bar */
        .navbar {
            background-color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-weight: bold;
            color: black;
        }

        .nav-link {
            color: #333;
            margin: 0 15px;
        }

        .nav-link:hover {
            color: #dc0000;
        }

        .btn-login {
            background-color: #dc0000;
            color: white;
            padding: 10px 30px;
            border-radius: 50px;
            border: none;
        }

        .btn-login:hover {
            background-color: #b30000;
        }

        /* Hero Section */
        .hero-section {
            height: 100vh;
            background-image: url('https://static.wixstatic.com/media/6285af_583626cb4f9f4d179462e65799a3699e~mv2.jpg/v1/fill/w_1920,h_1080,al_c,q_85,enc_auto/6285af_583626cb4f9f4d179462e65799a3699e~mv2.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            display: flex;
            align-items: center;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-content h1 {
            font-size: 70px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .hero-content p {
            font-size: 20px;
            margin-bottom: 30px;
        }

        html{
            scroll-behavior: smooth;
        }

        .btn-get-started {
            background-color: #dc0000;
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-get-started:hover {
            background-color: #b30000;
            color: white;
        }

        /* Officials Section */
        .section-label {
            color: #dc0000;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 20px;
            margin-top: 10px;
            margin-bottom: 50px;
        }

        .section-title {
            font-size: 40px;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 50px;
        }

        .official-card {
            text-align: center;
            padding: 20px;
        }

        .official-img {
            width: 200px;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .official-position {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .official-name {
            color: #666;
        }

        /* Total Officials Section */
        .total-officials {
            background-color: black;
            color: white;
            padding: 60px 0;
        }

        .total-officials h2 {
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 50px;
        }

        .official-count {
            text-align: center;
        }

        .official-count .number {
            font-size: 80px;
            font-weight: bold;
        }

        .official-count .label {
            font-size: 16px;
            color: #ccc;
        }

        .dots {
            font-size: 50px;
            color: #666;
        }

        /* About Section */
        #about {
            background-color: #f8f9fa;
            padding: 80px 0;
        }

        .about-content h2 {
            font-size: 40px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .about-content p {
            font-size: 18px;
            line-height: 1.8;
            color: #555;
        }

        .mission-section h3,
        .vision-section h3 {
            font-size: 40px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .mission-section p,
        .vision-section p {
            font-size: 18px;
            line-height: 1.8;
            color: #555;
        }

        /* Chat Button */
        .chat-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background-color: black;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .chat-button i {
            color: white;
            font-size: 25px;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home">BARANGAY SYSTEM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#officials">Officials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                </ul>
                <a href="<?php echo base_url('login'); ?>" class="btn btn-login">Login</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>Barangay<br>Management<br>System</h1>
                <p>Bringing barangay services closer to you.<br>Access documents, stay updated, and<br>connect with your community—all in one place.</p>
                <a href="<?php echo base_url('login'); ?>" class="btn-get-started">Get Started</a>
            </div>
        </div>
    </section>

    <!-- Officials Section -->
 <!-- Officials Section -->
<section id="officials" class="py-5">
    <div class="container">
        <div class="text-center">
            <div class="section-label">BARANGAY OFFICIALS</div>
        </div>

        <!-- Carousel -->
        <div id="officialsCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php 
                $totalOfficials = count($officials);
                
                // If 4 or less = Show all in slide 1
                if ($totalOfficials <= 4):
                ?>
                    <!-- Slide 1 - All Officials (4 or less) -->
                    <div class="carousel-item active">
                        <div class="row">
                            <?php foreach($officials as $official): ?>
                                <div class="col-md-3">
                                    <div class="official-card">
                                        <?php if (!empty($official['photo'])): ?>
                                            <img src="<?php echo base_url('uploads/officials/' . $official['photo']); ?>" class="official-img">
                                        <?php else: ?>
                                            <div style="width: 200px; height: 250px; background-color: #ddd; border-radius: 10px; margin-bottom: 20px; display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-user" style="font-size: 80px; color: #999;"></i>
                                            </div>
                                        <?php endif; ?>
                                        <div class="official-position"><?php echo $official['position']; ?></div>
                                        <div class="official-name"><?php echo $official['first_name'] . ' ' . $official['last_name']; ?></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                
                <?php 
                // If 5+ officials = Show 4 per slide
                else:
                    $count = 0;
                    $slideNum = 0;
                    foreach($officials as $official):
                        if ($count == 0):
                ?>
                    <!-- Slide - 4 Officials -->
                    <div class="carousel-item <?php echo $slideNum == 0 ? 'active' : ''; ?>">
                        <div class="row">
                <?php
                        endif;
                        $slideNum++;
                ?>
                        <div class="col-md-3">
                            <div class="official-card">
                                <?php if (!empty($official['photo'])): ?>
                                    <img src="<?php echo base_url('uploads/officials/' . $official['photo']); ?>" class="official-img">
                                <?php else: ?>
                                    <div style="width: 200px; height: 250px; background-color: #ddd; border-radius: 10px; margin-bottom: 20px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-user" style="font-size: 80px; color: #999;"></i>
                                    </div>
                                <?php endif; ?>
                                <div class="official-position"><?php echo $official['position']; ?></div>
                                <div class="official-name"><?php echo $official['first_name'] . ' ' . $official['last_name']; ?></div>
                            </div>
                        </div>
                        
                        <?php
                        $count++;
                        
                        // Close slide after 4 officials OR at the end
                        if ($count == 4 || $official === end($officials)):
                        ?>
                        </div>
                    </div>
                        <?php
                            $count = 0;
                        endif;
                    endforeach;
                endif;
                ?>
            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#officialsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#officialsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</section>


    <!-- Total Officials Section -->
    <section class="total-officials">
        <div class="container">
            <h2>Total Officials</h2>
            <div class="row justify-content-center align-items-center">
                <div class="col-auto">
                    <div class="official-count">
                        <div class="number"><?php echo $captain; ?></div>
                        <div class="label">Barangay Captain</div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="dots">·</div>
                </div>
                <div class="col-auto">
                    <div class="official-count">
                        <div class="number"><?php echo $secretary; ?></div>
                        <div class="label">Barangay Secretary</div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="dots">·</div>
                </div>
                <div class="col-auto">
                    <div class="official-count">
                        <div class="number"><?php echo $treasurer; ?></div>
                        <div class="label">Barangay Treasurer</div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="dots">·</div>
                </div>
                <div class="col-auto">
                    <div class="official-count">
                        <div class="number"><?php echo $kagawad; ?></div>
                        <div class="label">Barangay Kagawad</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="text-center mb-5">
                <div class="section-label">ABOUT</div>
            </div>

            <div class="row mb-5">
                <div class="col-lg-6">
                    <div class="about-content">
                        <h2>Barangay<br>Management<br>System</h2>
                        <p>Our goal is to serve our residents with transparency, efficiency, and dedication. This website was created to bring our services closer to you, allowing for easier access to documents, announcements, and other barangay-related transactions. We are committed to building a safe, progressive, and united community for everyone.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mission-section">
                        <h3>Mission</h3>
                        <p>To deliver transparent, accessible, and efficient public services that promote a peaceful, orderly, and healthy environment for all our constituents.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="vision-section">
                        <h3>Vision</h3>
                        <p>We envision Barangay Capas as a progressive, resilient, and God-fearing community where every resident is empowered to achieve their full potential in a safe and sustainable environment.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Chat Button -->
    <div class="chat-button">
        <i class="fas fa-comments"></i>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
