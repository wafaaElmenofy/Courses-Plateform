<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emerge Academy</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            padding-top: 70px;
        }

        /* Navbar Styling */
        .navbar {
            background-image: radial-gradient(circle, #b083c5ff 0%, #0f0317ff 100%);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1030;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
        }

        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }

        .navbar-brand span {
            color: #ffffff !important;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .navbar-nav .nav-link {
            color: #ffffff !important;
            font-weight: 600;
            margin-left: 15px;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #7D4F97 !important;
            transform: translateY(-2px);
        }

        .navbar-actions .btn {
            border-radius: 50px;
            font-weight: 600;
            padding: 8px 20px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .navbar-actions .btn-register {
            background-color: #7D4F97;
            color: #ffffff;
            border: 1px solid #7D4F97;
            animation: bounceIn 0.8s ease-out;
        }

        .navbar-actions .btn-register:hover {
            background-color: #6A4582;
            color: #ffffff;
            transform: scale(1.05);
        }

        .navbar-actions .btn-login {
            background-color: transparent;
            color: #ffffff !important;
            border: 1px solid #ffffff;
        }

        .navbar-actions .btn-login:hover {
            background-color: #6A4582;
            color: #ffffff;
            transform: scale(1.05);
        }

        /* Updated Hero Section styles */
        .hero-section {
            padding: 100px 0;
            text-align: center;
            background-image: radial-gradient(circle, #b083c5ff 0%, #0f0317ff 100%);
            color: #ffffff;
            flex-grow: 1;
            display: flex; /* Added for alignment */
            align-items: center; /* Added for vertical alignment */
        }

        /* Hero image styling */
        .hero-image {
            max-width: 100%;
            height: auto;
            border-radius: 15px; /* Added for a softer look */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Added for depth */
            transition: transform 0.3s ease;
        }
        .hero-image:hover {
            transform: translateY(-5px); /* Added a subtle hover effect */
        }

        .hero-section h1, .hero-section p {
            color: #ffffff;
        }

        .hero-section h1 {
            animation: fadeInDown 1s ease-out;
        }

        .hero-section p, .hero-section a {
            animation: fadeInUp 1s ease-out;
        }

        .hero-section .btn {
            border: 1px solid #7D4F97;
            background-color: #7D4F97;
        }
        .hero-section .btn:hover {
            background-color: #6A4582;
            border: 1px solid #6A4582;
        }

        #contact {
            background-color: #ffffff;
            padding: 60px 0;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.05);
        }

        .footer {
            background-image: radial-gradient(circle, #9083c5ff 0%, #0f0317ff 100%);
            color: #ecf0f1;
            padding: 50px 0 20px;
        }

        .footer .footer-title {
            color: #7D4F97;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 25px;
            position: relative;
        }

        .footer .footer-title::after {
            content: '';
            display: block;
            width: 50px;
            height: 3px;
            background: #7D4F97;
            margin-top: 10px;
        }

        .footer .footer-links li a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer .footer-links li a:hover {
            color: #ecf0f1;
        }

        .footer-social-links a {
            color: #ecf0f1;
            font-size: 20px;
            margin-left: 15px;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .footer-social-links a:hover {
            color: #7D4F97;
            transform: scale(1.2);
        }

        .footer-bottom {
            background-image: radial-gradient(circle, #9083c5ff 0%, #0f0317ff 100%);
            padding: 15px 0;
            margin-top: 30px;
            font-size: 14px;
        }

        /* Keyframes for the moving gradient background */
        @keyframes moveGradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounceIn {
            0% {
                transform: scale(0.3);
                opacity: 0;
            }
            50% {
                transform: scale(1.05);
                opacity: 1;
            }
            70% {
                transform: scale(0.9);
            }
            100% {
                transform: scale(1);
            }
        }

        @media (max-width: 991px) {
            .navbar-nav .nav-link {
                color: #ffffff !important;
            }

            .navbar-nav .nav-link:hover {
                color: #7D4F97 !important;
                transform: scale(1.01);
            }
            .hero-section .container {
                flex-direction: column; /* Stack columns on small screens */
            }
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <span class="fw-bold text-dark">Emerge Academy</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('courses.index') }}">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#instructor">Instructor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>

                <div class="d-flex navbar-actions">
                    <a href="{{ route('login') }}" class="btn btn-login btn-sm d-flex align-items-center me-2">
                        <i class="fas fa-sign-in-alt me-1"></i>
                        Login
                    </a>
                    <a href="/register" class="btn btn-register btn-sm d-flex align-items-center">
                        <i class="fas fa-user-plus me-1"></i>
                        Register
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- <div class="hero-section" id="home"> -->
        <!-- <div class="container d-flex flex-column flex-lg-row align-items-center justify-content-center text-center text-lg-start">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="display-4 fw-bold">Start your educational journey now!</h1>
                <p class="lead mt-3">Discover hundreds of training courses in various fields.</p>
                <a href="{{ route('courses.index') }}" class="btn btn-primary btn-lg mt-4">Browse courses</a>
            </div>

            <div class="col-lg-6">
                <img src="/public/images/WhatsApp Image 2025-09-17 at 5.05.16 AM.jpeg" alt="Emerge Academy Hero Image" class="img-fluid hero-image">
            </div>
        </div>
    </div> -->

    <div id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-center mb-4 fw-bold text-primary">Contact Us</h2>
                    <p class="text-center text-secondary mb-5">Have a question or a message? We'd love to hear from you!</p>
                    <form action="mailto:your-email@example.com" method="post" enctype="text/plain">
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Your Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label fw-bold">Your Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h5 class="footer-title">About Emerge Academy</h5>
                    <p>Emerge Academy is your go-to destination for acquiring new skills and knowledge online. We offer high-quality courses presented by top experts.</p>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 class="footer-title">Quick Links</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#home">Home</a></li>
                        <li><a href="{{ route('courses.index') }}">Courses</a></li>
                        <li><a href="#instructor">Instructors</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 class="footer-title">Follow Us</h5>
                    <p>Stay up to date with our latest news by following us on social media.</p>
                    <div class="footer-social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <div class="container">
                &copy; 2025 All rights reserved to Emerge Academy platform.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
