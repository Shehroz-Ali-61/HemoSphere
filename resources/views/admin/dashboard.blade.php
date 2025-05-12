{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hemosphere - Admin Modern Blood Bank</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Custom Variables */
        :root {
            --neon-red: #ff2e63;
            --cyber-purple: #6b46c1;
            --dark-space: #0a0a12;
            --star-dust: #e2e8f0;
            --holographic: linear-gradient(45deg, #ff6b6b, #ff2e63, #6b46c1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: var(--dark-space);
            color: var(--star-dust);
            overflow-x: hidden;
        }

        /* Glowing Preloader */
        .preloader {
            position: fixed;
            width: 100%;
            height: 100vh;
            background: var(--dark-space);
            display: grid;
            place-items: center;
            z-index: 1000;
        }

        .pulse {
            width: 80px;
            height: 80px;
            background: var(--neon-red);
            border-radius: 50%;
            animation: pulse 1.2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 46, 99, 0.7);
            }

            70% {
                box-shadow: 0 0 0 25px rgba(255, 46, 99, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(255, 46, 99, 0);
            }
        }

        /* Cyberpunk Navigation */
        .nav-container {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 1.5rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(10, 10, 18, 0.95);
            backdrop-filter: blur(10px);
            z-index: 999;
            border-bottom: 1px solid rgba(255, 46, 99, 0.2);
        }

        .logo {
            font-size: 2rem;
            font-weight: 800;

            /* Gradient Text */
            background: var(--holographic);
            -webkit-background-clip: text;
            background-clip: text;
            /* Standard property */
            -webkit-text-fill-color: transparent;
            color: transparent;
            /* Standard property */

            /* Fallback for unsupported browsers */
            @supports not (background-clip: text) {
                color: var(--neon-red);
            }

            /* Optional: Improve text rendering */
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-link {
            color: var(--star-dust);
            text-decoration: none;
            font-weight: 500;
            position: relative;
            padding: 0.5rem 1rem;
            transition: 0.3s;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background: var(--neon-red);
            transition: 0.3s;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Holographic Hero Section */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            padding: 0 5%;
            /*margin-top: -80px;*/
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: var(--holographic);
            border-radius: 50%;
            filter: blur(150px);
            opacity: 0.3;
            animation: float 6s infinite;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
        }

        .hero-title {
            font-size: 4.5rem;
            line-height: 1.1;
            margin-bottom: 2rem;

            /* Gradient Text */
            background: linear-gradient(45deg, #fff, var(--neon-red));
            -webkit-background-clip: text;
            background-clip: text;
            /* Standard property */
            -webkit-text-fill-color: transparent;
            color: transparent;
            /* Standard property */

            /* Fallback for older browsers */
            @supports not (background-clip: text) {
                color: var(--neon-red);
            }
        }

        .cta-container {
            display: flex;
            gap: 1.5rem;
            margin-top: 3rem;
        }

        .cta-btn {
            padding: 1.2rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            position: relative;
            overflow: hidden;
        }

        .primary-cta {
            background: var(--holographic);
            color: white;
            border: 2px solid transparent;
        }

        .secondary-cta {
            border: 2px solid var(--neon-red);
            color: var(--neon-red);
        }

        .cta-btn::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            left: -100%;
            top: 0;
            transition: 0.3s;
        }

        .cta-btn:hover::after {
            left: 0;
        }

        /* Blood Type Grid */
        .blood-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            padding: 5rem 5%;
        }

        .blood-card {
            background: rgba(255, 255, 255, 0.05);
            padding: 2rem;
            border-radius: 20px;
            text-align: center;
            transition: 0.3s;
            border: 1px solid rgba(255, 46, 99, 0.1);
        }

        .blood-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 46, 99, 0.1);
        }

        .blood-type {
            font-size: 3rem;
            font-weight: 800;
            color: var(--neon-red);
            margin-bottom: 1rem;
        }

        /* Animated Stats */
        .stats-section {
            padding: 5rem 5%;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            background: rgba(255, 255, 255, 0.02);
        }

        .stat-card {
            padding: 2rem;
            border-radius: 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            width: 150%;
            height: 150%;
            background: conic-gradient(var(--neon-red) 20%, transparent 120%);
            animation: rotate 3s linear infinite;
        }

        .stat-content {
            position: relative;
            z-index: 1;
            background: var(--dark-space);
            padding: 2rem;
            border-radius: 15px;
        }

        /* Floating Emergency Button */
        .emergency-float {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: var(--neon-red);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            box-shadow: 0 0 25px rgba(255, 46, 99, 0.5);
            animation: pulse 1.5s infinite;
            cursor: pointer;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 3rem;
            }

            .blood-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .nav-links {
                display: none;
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }



        /* Donation Process Section */
        .process-section {
            padding: 5rem 5%;
            background: rgba(255, 255, 255, 0.02);
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;

            /* Gradient text with fallback */
            background: linear-gradient(45deg, var(--neon-red), var(--cyber-purple));
            -webkit-background-clip: text;
            background-clip: text;
            /* Standard property */
            -webkit-text-fill-color: transparent;
            color: transparent;
            /* Standard property */

            /* Fallback for unsupported browsers */
            @supports not (background-clip: text) {
                color: var(--neon-red);
            }

            /* Optional enhancements */
            font-weight: 700;
            letter-spacing: -0.5px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .process-steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .process-card {
            background: rgba(255, 255, 255, 0.05);
            padding: 2rem;
            border-radius: 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: 0.3s;
        }

        .process-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 46, 99, 0.1);
        }

        .process-number {
            position: absolute;
            top: -20px;
            right: -20px;
            font-size: 4rem;
            font-weight: 800;
            color: rgba(255, 255, 255, 0.05);
        }

        .process-icon {
            font-size: 2.5rem;
            color: var(--neon-red);
            margin: 1rem 0;
        }

        /* Cyber Footer */
        .cyber-footer {
            background: rgba(10, 10, 18, 0.95);
            border-top: 2px solid var(--neon-red);
            margin-top: 5rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 5%;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
        }

        .footer-section {
            padding: 1rem;
        }

        .footer-heading {
            color: var(--neon-red);
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .footer-heading::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--neon-red);
        }

        .footer-links li {
            margin: 1rem 0;
        }

        .footer-links a {
            color: var(--star-dust);
            text-decoration: none;
            transition: 0.3s;
        }

        .footer-links a:hover {
            color: var(--neon-red);
            padding-left: 0.5rem;
        }

        .contact-info li {
            margin: 1rem 0;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border: 1px solid var(--neon-red);
            border-radius: 50%;
            display: grid;
            place-items: center;
            color: var(--neon-red);
            transition: 0.3s;
        }

        .social-icon:hover {
            background: var(--neon-red);
            color: var(--dark-space);
        }

        .newsletter-form {
            margin-top: 1.5rem;
            display: flex;
            gap: 0.5rem;
        }

        .newsletter-form input {
            flex: 1;
            padding: 0.8rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--neon-red);
            color: var(--star-dust);
            border-radius: 30px;
        }

        .newsletter-form button {
            padding: 0.8rem 1.5rem;
            background: var(--neon-red);
            border: none;
            border-radius: 30px;
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }

        .newsletter-form button:hover {
            transform: translateY(-2px);
        }

        .footer-bottom {
            text-align: center;
            padding: 2rem 5%;
            border-top: 1px solid rgba(255, 46, 99, 0.2);
        }

        .legal-links {
            margin-top: 1rem;
            display: flex;
            justify-content: center;
            gap: 2rem;
        }

        .legal-links a {
            color: var(--star-dust);
            text-decoration: none;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .footer-content {
                grid-template-columns: 1fr;
            }

            .legal-links {
                flex-direction: column;
                gap: 0.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="pulse"></div>
    </div>

    <!-- Navigation -->
    <nav class="nav-container">
        <div class="logo">HEMOSPHERE Admin</div>
        <div class="nav-links">
            <a href="#" class="nav-link">Hi {{Auth::guard('admin')->user()->name}}</a>
            <a href="{{ route('admin.logout') }}" class="nav-link">LogOut</a>
            <a href="#" class="nav-link">Home</a>
            <a href="#" class="nav-link">Donate</a>
            <a href="#" class="nav-link">Find Blood</a>
            <a href="#" class="nav-link">About</a>
            <a href="{{route('admin.panel')}}" class="nav-link">Admin Panel</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content" data-aos="fade-up">
            <h1 class="hero-title">Revolutionizing<br>Blood Donation</h1>
            <p class="hero-subtitle">Join the digital blood revolution. Save lives with a single click.</p>
            <div class="cta-container">
                <a href="#" class="cta-btn primary-cta">Find Donor</a>
                <a href="#" class="cta-btn secondary-cta">Become Donor</a>
            </div>
        </div>
    </section>

    <!-- Blood Type Grid -->
    <section class="blood-grid">
        <div class="blood-card" data-aos="zoom-in">
            <div class="blood-type">A+</div>
            <p>127 Available Donors</p>
        </div>
        <!-- Repeat for other blood types -->
    </section>

    <!-- Statistics Section -->
    <section class="stats-section">
        <div class="stat-card" data-aos="fade-up">
            <div class="stat-content">
                <h3>15K+</h3>
                <p>Lives Saved</p>
            </div>
        </div>
        <!-- Additional stat cards -->
    </section>

    <!-- Add this after the Statistics Section -->
    <!-- Donation Process Section -->
    <section class="process-section">
        <h2 class="section-title" data-aos="fade-up">Donation Process</h2>
        <div class="process-steps">
            <div class="process-card" data-aos="zoom-in">
                <div class="process-number">1</div>
                <i class="fas fa-user-edit process-icon"></i>
                <h3>Registration</h3>
                <p>Quick digital sign-up with health questionnaire</p>
            </div>
            <!-- Add similar cards for other steps -->
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="cyber-footer">
        <div class="footer-content">
            <div class="footer-section" data-aos="fade-up">
                <h3 class="footer-heading">Blood Connect</h3>
                <p>Join our mission to save lives through blood donation</p>
                <div class="social-links">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="footer-section" data-aos="fade-up" data-aos-delay="100">
                <h3 class="footer-heading">Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="#">Eligibility Criteria</a></li>
                    <li><a href="#">Find Blood Bank</a></li>
                    <li><a href="#">Donor Rewards</a></li>
                    <li><a href="#">Emergency Request</a></li>
                </ul>
            </div>

            <div class="footer-section" data-aos="fade-up" data-aos-delay="200">
                <h3 class="footer-heading">Contact Us</h3>
                <ul class="contact-info">
                    <li><i class="fas fa-phone-alt"></i> 1-800-BLOOD-HELP</li>
                    <li><i class="fas fa-envelope"></i> help@hemosphere.com</li>
                    <li><i class="fas fa-map-marker-alt"></i> Neon District, Cyber City</li>
                </ul>
            </div>

            <div class="footer-section" data-aos="fade-up" data-aos-delay="300">
                <h3 class="footer-heading">Newsletter</h3>
                <form class="newsletter-form">
                    <input type="email" placeholder="Enter your email" required>
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2024 Hemosphere. All rights reserved</p>
            <div class="legal-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Safety Guidelines</a>
            </div>
        </div>
    </footer>



    <!-- Emergency Float -->
    <div class="emergency-float">
        <i class="fas fa-bolt"></i>
    </div>
</body>


<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

// For admin dashboard
@if(request()->is('admin/*') && !auth()->guard('admin')->check())
<script> window.location = "{{ route('admin.login') }}";</script>
@endif

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Initialize animations
    AOS.init({
        duration: 1000,
        once: true
    });

    // Remove preloader
    window.addEventListener('load', () => {
        document.querySelector('.preloader').style.display = 'none';
    });

    // Parallax effect
    document.addEventListener('mousemove', (e) => {
        const hero = document.querySelector('.hero');
        const x = (window.innerWidth - e.pageX * 2) / 50;
        const y = (window.innerHeight - e.pageY * 2) / 50;
        hero.style.transform = `translate(${x}px, ${y}px)`;
    });



    // Newsletter form submission
    document.querySelector('.newsletter-form').addEventListener('submit', (e) => {
        e.preventDefault();
        const email = e.target.querySelector('input').value;
        // Add your newsletter logic here
        alert('Thank you for subscribing!');
        e.target.reset();
    });

    // Initialize tooltips
    tippy('.social-icon', {
        content: (reference) => reference.querySelector('i').className.replace('fab fa-', ''),
        placement: 'bottom'
    });
</script>

</html> --}}























{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hemosphere - Admin Dashboard</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --neon-red: #ff2e63;
            --cyber-purple: #6b46c1;
            --dark-space: #0a0a12;
            --star-dust: #e2e8f0;
            --holographic: linear-gradient(45deg, #ff6b6b, #ff2e63, #6b46c1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: var(--dark-space);
            color: var(--star-dust);
            margin-left: 280px;
            /* Offset for sidebar */
        }

        /* Admin Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            width: 300px;
            background: rgba(10, 10, 18, 0.95);
            border-right: 1px solid rgba(255, 46, 99, 0.2);
            padding: 2rem;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 3rem;
            background: var(--holographic);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .admin-menu {
            list-style: none;
        }

        .menu-item {
            margin: 1.5rem 0;
        }

        .menu-link {
            color: var(--star-dust);
            text-decoration: none;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            display: block;
            transition: 0.3s;
        }

        .menu-link:hover {
            background: rgba(255, 46, 99, 0.1);
        }

        .menu-link.active {
            background: var(--holographic);
            color: white;
        }

        /* Main Content Area */
        .main-content {
            padding: 3rem;
        }

        /* Admin Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            padding: 2rem;
            border-radius: 15px;
            border: 1px solid rgba(255, 46, 99, 0.1);
        }

        .stat-value {
            font-size: 2.5rem;
            color: var(--neon-red);
            margin-bottom: 0.5rem;
        }

        /* Data Tables */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 2rem 0;
            background: rgba(255, 255, 255, 0.02);
        }

        .data-table th,
        .data-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .data-table th {
            background: rgba(255, 46, 99, 0.1);
            color: var(--neon-red);
        }

        /* Form Elements */
        .admin-form {
            max-width: 600px;
            background: rgba(255, 255, 255, 0.02);
            padding: 2rem;
            border-radius: 15px;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
        }

        .form-input {
            width: 100%;
            padding: 0.8rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 46, 99, 0.2);
            color: var(--star-dust);
            border-radius: 8px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                margin-left: 0;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                padding: 2rem 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Admin Sidebar -->
    <nav class="sidebar">
        <div class="logo">HEMOSPHERE Admin</div>
        <ul class="admin-menu">
            <li class="menu-item">
                <a href="#" class="menu-link active">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="menu-item">
                <a href="{{route('admin.panel')}}" class="menu-link">
                    <i class="fas fa-users"></i> Manage Users
                </a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-tint"></i> Blood Inventory
                </a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-history"></i> Donation Records
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.logout') }}" class="menu-link">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Welcome Header -->
        <h1>Welcome, {{Auth::guard('admin')->user()->name}}</h1>
        <p class="subtitle">Last login: 2 hours ago</p>

        <!-- Quick Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-value">1,234</div>
                <div class="stat-label">Total Donors</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">567</div>
                <div class="stat-label">Active Requests</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">89%</div>
                <div class="stat-label">Inventory Level</div>
            </div>
        </div>

        <!-- Blood Inventory Table -->
        <h2>Blood Inventory</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Blood Type</th>
                    <th>Available Units</th>
                    <th>Last Update</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>A+</td>
                    <td>45 units</td>
                    <td>2 hours ago</td>
                    <td>Stable</td>
                </tr>
                <!-- Add more rows -->
            </tbody>
        </table>

        <!-- Recent Donations -->
        <h2>Recent Donations</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Donor</th>
                    <th>Blood Type</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>O+</td>
                    <td>2024-03-15</td>
                    <td>Completed</td>
                </tr>
                <!-- Add more rows -->
            </tbody>
        </table>
    </main>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });

        // Add active class to clicked menu items
        document.querySelectorAll('.menu-link').forEach(link => {
            link.addEventListener('click', function () {
                document.querySelectorAll('.menu-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>

</html> --}}






















<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        :root {
            --neon-red: #ff2e63;
            --cyber-purple: #6b46c1;
            --dark-space: #0a0a12;
            --star-dust: #e2e8f0;
            --holographic: linear-gradient(45deg, #ff6b6b, #ff2e63, #6b46c1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: var(--dark-space);
            color: var(--star-dust);
            margin-left: 280px;
            /* Offset for sidebar */
        }

        /* Admin Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            width: 300px;
            background: rgba(10, 10, 18, 0.95);
            border-right: 1px solid rgba(255, 46, 99, 0.2);
            padding: 2rem;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 3rem;
            background: var(--holographic);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .admin-menu {
            list-style: none;
        }

        .menu-item {
            margin: 1.5rem 0;
        }

        .menu-link {
            color: var(--star-dust);
            text-decoration: none;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            display: block;
            transition: 0.3s;
        }

        .menu-link:hover {
            background: rgba(255, 46, 99, 0.1);
        }

        .menu-link.active {
            background: var(--holographic);
            color: white;
        }

        /* Main Content Area */
        .main-content {
            padding: 3rem;
        }

        /* Admin Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            padding: 2rem;
            border-radius: 15px;
            border: 1px solid rgba(255, 46, 99, 0.1);
        }

        .stat-value {
            font-size: 2.5rem;
            color: var(--neon-red);
            margin-bottom: 0.5rem;
        }

        /* Data Tables */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 2rem 0;
            background: rgba(255, 255, 255, 0.02);
        }

        .data-table th,
        .data-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .data-table th {
            background: rgba(255, 46, 99, 0.1);
            color: var(--neon-red);
        }

        /* Form Elements */
        .admin-form {
            max-width: 600px;
            background: rgba(255, 255, 255, 0.02);
            padding: 2rem;
            border-radius: 15px;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
        }

        .form-input {
            width: 100%;
            padding: 0.8rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 46, 99, 0.2);
            color: var(--star-dust);
            border-radius: 8px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                margin-left: 0;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                padding: 2rem 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Admin Sidebar -->
    <nav class="sidebar">
        <div class="logo">HEMOSPHERE Admin</div>
        <ul class="admin-menu">
            <li class="menu-item">
                <a href="#" class="menu-link active">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="menu-item">
                <a href="{{route('admin.panel')}}" class="menu-link">
                    <i class="fas fa-users"></i> Manage Users
                </a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-history"></i> Donation Records
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.logout') }}" class="menu-link">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Welcome Header -->
        <h1>Welcome, {{Auth::guard('admin')->user()->name}}</h1>
        <p class="subtitle">Last login: 2 hours ago</p>

        <!-- Quick Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-value">1,234</div>
                <div class="stat-label">Total Donors</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">567</div>
                <div class="stat-label">Active Requests</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">89%</div>
                <div class="stat-label">Inventory Level</div>
            </div>
        </div>

        <!-- Recent Donations -->
        <h2>Recent Donations</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Donor</th>
                    <th>Blood Type</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>O+</td>
                    <td>2024-03-15</td>
                    <td>Completed</td>
                </tr>
                <!-- Add more rows -->
            </tbody>
        </table>
    </main>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });

        // Add active class to clicked menu items
        document.querySelectorAll('.menu-link').forEach(link => {
            link.addEventListener('click', function () {
                document.querySelectorAll('.menu-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>

</html>