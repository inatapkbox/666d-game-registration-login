<?php
// Start session for user management
session_start();

// Define constants for URLs
define('SITE_URL', 'https://666dgame.com.pk/');
define('LOGO_URL', 'https://666dgame.com.pk/wp-content/uploads/2025/10/cropped-666d-game.webp');
define('CANONICAL_URL', 'https://666dgame.com.pk/registration-login-guide');

// Process form submissions
$error_message = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        // Registration logic
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $username = htmlspecialchars($_POST['username']);
        $password = $_POST['password'];
        
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($password) >= 6) {
            $success_message = "Registration successful! Please check your email to verify your account.";
            // In a real application, you would save to database here
        } else {
            $error_message = "Please provide valid email and password (min 6 characters).";
        }
    } elseif (isset($_POST['login'])) {
        // Login logic
        $email = filter_var($_POST['login_email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['login_password'];
        
        if (!empty($email) && !empty($password)) {
            $_SESSION['user_email'] = $email;
            $success_message = "Login successful! Redirecting to game...";
            // In real app, verify credentials against database
        } else {
            $error_message = "Please enter both email and password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO Meta Tags -->
    <title>666D Game: Easy Sign Up & Login Guide for Beginners</title>
    <meta name="description" content="New to 666D? Our simple guide shows you how to register and log in to start playing. Get your step-by-step instructions here.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://game-666d-registration-login-2c689ac2019a.herokuapp.com/">
    
    <!-- Open Graph Tags -->
    <meta property="og:title" content="666D Game Registration and Login Process: Step-by-Step Beginner Guide">
    <meta property="og:description" content="Complete guide to register and login to 666D game. Start your gaming journey today.">
    <meta property="og:image" content="<?php echo LOGO_URL; ?>">
    <meta property="og:url" content="<?php echo CANONICAL_URL; ?>">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #6a11cb;
            --secondary: #2575fc;
            --accent: #ff4da6;
            --dark: #121826;
            --light: #f8f9ff;
            --success: #00ff88;
            --warning: #ffcc00;
            --text: #333333;
            --text-light: #666666;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: var(--text);
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
            min-height: 100vh;
            padding: 20px;
            animation: gradientBG 15s ease infinite;
            background-size: 400% 400%;
        }
        
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            animation: fadeIn 1s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Header Styles */
        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            margin-bottom: 30px;
            animation: slideDown 0.8s ease-out;
        }
        
        @keyframes slideDown {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .logo-container {
            text-align: center;
        }
        
        .logo {
            height: 80px;
            margin-bottom: 15px;
            transition: transform 0.5s ease;
        }
        
        .logo:hover {
            transform: scale(1.05);
        }
        
        .game-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.8rem;
            font-weight: 700;
            background: linear-gradient(90deg, var(--accent), var(--success));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-align: center;
            margin-bottom: 5px;
            letter-spacing: 2px;
        }
        
        .tagline {
            color: var(--light);
            text-align: center;
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        /* Main Content */
        .main-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 50px;
        }
        
        @media (max-width: 900px) {
            .main-content {
                grid-template-columns: 1fr;
            }
        }
        
        /* Form Cards */
        .form-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            animation: floatIn 0.8s ease-out;
        }
        
        .form-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
        }
        
        @keyframes floatIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .card-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.8rem;
            color: var(--light);
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--accent);
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .card-title i {
            color: var(--accent);
            font-size: 1.6rem;
        }
        
        /* Form Styles */
        .form-group {
            margin-bottom: 25px;
        }
        
        label {
            display: block;
            color: var(--light);
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        .input-with-icon {
            position: relative;
        }
        
        .form-input {
            width: 100%;
            padding: 16px 20px 16px 50px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.07);
            color: var(--light);
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(255, 77, 166, 0.2);
        }
        
        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--accent);
            font-size: 1.2rem;
        }
        
        .btn {
            display: block;
            width: 100%;
            padding: 18px;
            border: none;
            border-radius: 12px;
            font-family: 'Orbitron', sans-serif;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 10px;
        }
        
        .btn-primary {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
        }
        
        .btn-primary:hover {
            background: linear-gradient(90deg, var(--secondary), var(--primary));
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(106, 17, 203, 0.3);
        }
        
        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: var(--light);
            border: 2px solid rgba(255, 255, 255, 0.2);
        }
        
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
        }
        
        /* Message Styles */
        .message {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
            animation: slideIn 0.5s ease-out;
        }
        
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        .error {
            background: rgba(255, 50, 50, 0.15);
            border-left: 4px solid #ff3232;
            color: #ff9a9a;
        }
        
        .success {
            background: rgba(0, 255, 136, 0.15);
            border-left: 4px solid var(--success);
            color: #aaffdd;
        }
        
        /* Guide Section */
        .guide-section {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 40px;
            margin-top: 40px;
            animation: fadeIn 1.2s ease-out;
        }
        
        .section-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 2rem;
            color: var(--light);
            margin-bottom: 25px;
            text-align: center;
        }
        
        .content-box {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 25px;
            border-left: 4px solid var(--accent);
            transition: transform 0.3s ease;
        }
        
        .content-box:hover {
            transform: translateX(10px);
        }
        
        .content-title {
            color: var(--accent);
            font-size: 1.4rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .content-text {
            color: #cccccc;
            line-height: 1.8;
        }
        
        .highlight {
            color: var(--success);
            font-weight: 600;
        }
        
        .keyword {
            background: rgba(255, 77, 166, 0.2);
            padding: 2px 8px;
            border-radius: 4px;
            color: var(--accent);
            font-weight: 500;
        }
        
        /* Footer */
        .footer {
            text-align: center;
            padding: 30px;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 50px;
        }
        
        .footer-link {
            color: var(--accent);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-link:hover {
            color: var(--success);
            text-decoration: underline;
        }
        
        /* Stats Section */
        .stats-box {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
            margin: 40px 0;
        }
        
        .stat-item {
            text-align: center;
            padding: 25px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            flex: 1;
            min-width: 200px;
            transition: transform 0.3s ease;
        }
        
        .stat-item:hover {
            transform: translateY(-10px);
        }
        
        .stat-number {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.5rem;
            color: var(--success);
            margin-bottom: 10px;
        }
        
        .stat-text {
            color: #cccccc;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            <div class="logo-container">
                <img src="https://666dgame.com.pk/wp-content/uploads/2025/10/cropped-666d-game.webp" class="logo">
                <h1 class="game-title">666D Game: Easy Sign Up & Login Guide for Beginners</h1>
            </div>
        </header>
        
        <!-- Messages -->
        <?php if ($error_message): ?>
            <div class="message error">
                <i class="fas fa-exclamation-circle"></i> <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        
        <?php if ($success_message): ?>
            <div class="message success">
                <i class="fas fa-check-circle"></i> <?php echo $success_message; ?>
            </div>
        <?php endif; ?>
        
        <!-- Registration and Login Forms -->
        <div class="main-content">
            <!-- Registration Form -->
            <div class="form-card">
                <h2 class="card-title">
                    <i class="fas fa-user-plus"></i> Create New Account
                </h2>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-with-icon">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" id="email" name="email" class="form-input" placeholder="Enter your email" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="username">Game Username</label>
                        <div class="input-with-icon">
                            <i class="fas fa-gamepad input-icon"></i>
                            <input type="text" id="username" name="username" class="form-input" placeholder="Choose your game name" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" id="password" name="password" class="form-input" placeholder="Create strong password" minlength="6" required>
                        </div>
                    </div>
                    
                    <button type="submit" name="register" class="btn btn-primary">
                        <i class="fas fa-rocket"></i> Start Your Adventure
                    </button>
                </form>
            </div>
            
            <!-- Login Form -->
            <div class="form-card">
                <h2 class="card-title">
                    <i class="fas fa-sign-in-alt"></i> Existing Players
                </h2>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="login_email">Email Address</label>
                        <div class="input-with-icon">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" id="login_email" name="login_email" class="form-input" placeholder="Your registered email" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="login_password">Password</label>
                        <div class="input-withigin-icon">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" id="login_password" name="login_password" class="form-input" placeholder="Enter your password" required>
                        </div>
                    </div>
                    
                    <div class="form-group" style="text-align: right; margin-top: -15px;">
                        <a href="#" style="color: var(--accent); text-decoration: none; font-size: 0.9rem;">
                            Forgot Password?
                        </a>
                    </div>
                    
                    <button type="submit" name="login" class="btn btn-primary">
                        <i class="fas fa-play-circle"></i> Enter Game World
                    </button>
                    
                    <p style="text-align: center; color: #cccccc; margin-top: 20px;">
                        Demo: Use any email/password to test
                    </p>
                </form>
            </div>
        </div>
        
        <!-- Stats Section -->
        <div class="stats-box">
            <div class="stat-item">
                <div class="stat-number">3B+</div>
                <div class="stat-text">Gamers Worldwide</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">99%</div>
                <div class="stat-text">Player Satisfaction</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">24/7</div>
                <div class="stat-text">Support Available</div>
            </div>
        </div>
        
        <!-- Guide Content -->
        <section class="guide-section">
            <h2 class="section-title">Complete Guide to 666D Game Registration & Login</h2>
            
            <div class="content-box">
                <h3 class="content-title">
                    <i class="fas fa-info-circle"></i> Welcome to 666D Game
                </h3>
                <p class="content-text">
                    Starting a new online game can feel a bit confusing. But don't worry. This guide will make it very easy for you. We will show you how to join the <span class="keyword">666D</span> game world. We will cover the <span class="keyword">666D registration</span> and <span class="keyword">666D login</span> process step-by-step. By the end, you will be ready to play.
                </p>
                <p class="content-text">
                    First, what is <span class="keyword">666D</span>? It is a popular online game where players build, explore, and compete. Many people enjoy it every day. In fact, a report by <span class="highlight">Newzoo</span> shows that over 3 billion people worldwide play online games. Games like <span class="keyword">666D</span> are a big part of this fun. You can visit the official website at <a href="https://666dgame.com.pk/" class="footer-link" target="_blank">https://666dgame.com.pk/</a> for more information.
                </p>
            </div>
            
            <div class="content-box">
                <h3 class="content-title">
                    <i class="fas fa-check-circle"></i> What You Need Before You Start
                </h3>
                <p class="content-text">
                    Before the <span class="keyword">666D sign up</span> process, you need two things:
                </p>
                <ol style="color: #cccccc; margin-left: 20px; margin-top: 10px;">
                    <li>A working email address.</li>
                    <li>A strong password. Make it a mix of letters, numbers, and symbols. This keeps your <span class="keyword">666D game account</span> safe.</li>
                </ol>
                <p class="content-text">
                    It is that simple. Now, let us move to the first big step.
                </p>
            </div>
            
            <div class="content-box">
                <h3 class="content-title">
                    <i class="fas fa-compass"></i> Step 1: Find the Official 666D Game Website
                </h3>
                <p class="content-text">
                    You must start at the right place. To avoid fake sites, always look for the official <span class="keyword">666D game website</span>. You can search for "666D official game" on Google. The correct site will often be the first result. Look for a secure web address. It should start with "https://". This keeps your information safe.
                </p>
            </div>
            
            <div class="content-box">
                <h3 class="content-title">
                    <i class="fas fa-user-plus"></i> Step 2: The Registration Process
                </h3>
                <p class="content-text">
                    This is where you create your new identity in the game. Follow these points:
                </p>
                <ul style="color: #cccccc; margin-left: 20px; margin-top: 10px;">
                    <li><span class="highlight">Find the Sign-Up Button:</span> On the <span class="keyword">666D game website</span>, look for words like "Sign Up", "Register", or "Create Account".</li>
                    <li><span class="highlight">Fill Out the Form:</span> Enter your email, create a strong password, and choose your game name.</li>
                    <li><span class="highlight">Verify Your Email:</span> Check your inbox for a verification email from the <span class="keyword">666D</span> team and click the link.</li>
                </ul>
            </div>
            
            <div class="content-box">
                <h3 class="content-title">
                    <i class="fas fa-sign-in-alt"></i> Step 3: The Login Process
                </h3>
                <p class="content-text">
                    Now that your account is ready, you can log in anytime:
                </p>
                <ol style="color: #cccccc; margin-left: 20px; margin-top: 10px;">
                    <li>Go back to the official <span class="keyword">666D game website</span>.</li>
                    <li>Find and click the "Login" button.</li>
                    <li>Enter your <span class="keyword">666D account details</span> (email and password).</li>
                    <li>Click "Submit" to enter your game dashboard.</li>
                </ol>
                <p class="content-text">
                    Congratulations! You are now ready to start playing.
                </p>
            </div>
            
            <div class="content-box">
                <h3 class="content-title">
                    <i class="fas fa-shield-alt"></i> Account Security Tips
                </h3>
                <p class="content-text">
                    Your <span class="keyword">666D account security</span> is very important. Here are simple safety tips:
                </p>
                <ul style="color: #cccccc; margin-left: 20px; margin-top: 10px;">
                    <li>Never share your password with anyone.</li>
                    <li>Use different passwords for different sites.</li>
                    <li>Always log out on shared computers.</li>
                    <li>Enable two-factor authentication if available.</li>
                </ul>
            </div>
            
            <div class="content-box">
                <h3 class="content-title">
                    <i class="fas fa-gamepad"></i> Ready to Play?
                </h3>
                <p class="content-text">
                    You have done it. You know how to complete the <span class="keyword">666D registration</span> and <span class="keyword">666D login</span> process. The world of <span class="keyword">666D</span> is now open to you. Remember, every expert player was once a beginner. Take your time. Learn the game. Most of all, have fun.
                </p>
                <p class="content-text">
                    The first step into any new game is the most important. You have taken that step. Your journey in the <span class="keyword">666D game</span> begins now. Explore, play, and enjoy your new adventure. Welcome to the community!
                </p>
            </div>
        </section>
        
        <!-- Footer -->
        <footer class="footer">
            <p>© <?php echo date('Y'); ?> 666D Game. All rights reserved.</p>
            <p style="margin-top: 15px; font-size: 0.8rem; opacity: 0.7;">
                This is a demonstration interface. Actual game functionality may vary.
            </p>
        </footer>
    </div>
    
    <!-- JavaScript for animations -->
    <script>
        // Add animation to form inputs on focus
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
        
        // Add loading animation to buttons
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function() {
                if(this.innerHTML.indexOf('fa-spinner') === -1) {
                    const originalHTML = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
                    
                    // Reset after 2 seconds for demo purposes
                    setTimeout(() => {
                        this.innerHTML = originalHTML;
                    }, 2000);
                }
            });
        });
        
        // Animate stats on scroll
        const observerOptions = {
            threshold: 0.5
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if(entry.isIntersecting) {
                    entry.target.style.animation = 'floatIn 0.8s ease-out';
                }
            });
        }, observerOptions);
        
        // Observe all content boxes for animation
        document.querySelectorAll('.content-box').forEach(box => {
            observer.observe(box);
        });
    </script>
</body>
</html>
