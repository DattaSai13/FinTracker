<?php
$con=mysqli_connect("localhost","root","","expense_tracker");
if($con){
    $name=$_GET["name"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to FinTracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #f8f9fa;
            background-image: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            padding-top: 70px;
        }
        
        .navbar {
            width: 100vw;
            box-shadow: 0 5px 10px rgba(38, 32, 32, 0.482);
            background: linear-gradient(to right, #f8f9fa, #e9ecef) !important;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
        }
        
        .welcome-section {
            padding: 70px 0 50px;
            text-align: center;
            background-color: #333;
            color: white;
            margin-bottom: 50px;
        }
        .pricing-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.44);
            transition: transform 0.3s;
            height: 100%;
        }
        
        .pricing-card:hover {
            transform: translateY(-10px);
        }
        
        .popular-card {
            border-top: 4px solid rgba(34, 37, 40, 0.46);
        }
        
        .popular-badge {
            position: absolute;
            top: -10px;
            right: 20px;
            background:rgba(35, 38, 40, 0.9);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
        }
        
        .btn-custom {
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            font-weight: 500;
            transition: all 0.3s;
            margin: 10px 0;
        }
        .features-section {
            padding: 80px 0;
            background-color: white;
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color:rgb(48, 50, 52);
            margin-bottom: 20px;
        }
        
        .nav-link {
            color: #2c3e50 !important;
            font-weight: 500;
            font-size: 20px;
            padding: 8px 15px !important;
            border-radius: 5px;
            transition: all 0.3s;
        }
        
        .nav-link:hover {
            background-color: rgba(52, 152, 219, 0.1);
            color: #3498db !important;
        }
        
        .navbar-brand {
            font-weight: 600;
            color: #2c3e50 !important;
        }
        
        .user-greeting {
            color: #3498db;
            font-weight: 600;
        }
        
        .fa-user {
            margin-right: 8px;
        }
        footer {
            background-color: #2c3e50;
            color: white;
            padding: 50px 0 20px;
        }
        
        .footer-links a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .social-icons a {
            color: white;
            font-size: 1.2rem;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="logo.svg" alt="FinTracker Logo" width="40" height="40" class="d-inline-block align-text-top me-2">
                <span class="fs-4"><b>FinTracker</b></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="home.php?name=<?php echo $name; ?>"><i class="fas fa-home me-1"></i> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="money.php?name=<?php echo $name; ?>"><i class="fa-solid fa-plus"></i> Add</a></li>
                    <li class="nav-item"><a class="nav-link" href="inctable.php?name=<?php echo $name; ?>"><i class="fas fa-money-bill-wave me-1"></i> Income</a></li>
                    <li class="nav-item"><a class="nav-link" href="exptable.php?name=<?php echo $name; ?>"><i class="fas fa-receipt me-1"></i> Expenses</a></li>
                    <li class="nav-item"><a class="nav-link" href="ana.php?name=<?php echo $name; ?>"><i class="fas fa-chart-pie me-1"></i> Analysis</a></li>
                    <li class="nav-item"><a class="btn btn-secondary ms-2 mt-2" href="login.html"><i class="fas fa-sign-in-alt me-1"></i> Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Welcome Container -->

    <section class="welcome-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <i class="fas fa-check-circle fa-5x mb-4"></i>
                    <h1 class="display-4 fw-bold mb-4">Welcome back, <span class="text-warning"><?php echo $name; ?></span>!</h1>
                    <p class="lead mb-5">You've successfully logged in to your FinTracker account. We're glad to have you back!</p>
                    <a href="ana.php?name=<?php echo $name; ?>" class="btn btn-light btn-lg me-2"><i class="fas fa-chart-line me-2"></i>View Analysis</a>
                    <a href="money.php?name=<?php echo $name; ?>" class="btn btn-outline-light btn-lg"><i class="fa-solid fa-plus"></i> Add income/expense</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Plans -->
    <section class="container mb-5" id="pricing">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Choose Your Perfect Plan</h2>
            <p class="lead text-muted">Upgrade to unlock more powerful features</p>
        </div>
        
        <div class="row g-4">
            <!-- Basic Plan -->
            <div class="col-md-4">
                <div class="pricing-card p-4">
                    <h3 class="mb-3">Basic</h3>
                    <div class="price mb-4">
                        <span class="display-4 fw-bold">$0</span>
                        <span class="text-muted">/month</span>
                    </div>
                    <p class="mb-4">Perfect for getting started with personal finance</p>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>10 expense categories</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Basic budgeting</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Monthly reports</li>
                        <li class="mb-2"><i class="fas fa-times text-muted me-2"></i>No bank sync</li>
                    </ul>
                    <button class="btn btn-outline-primary w-100" onclick="confirmAction()">Your Plan</button>

                </div>
            </div>
            
            <!-- Premium Plan -->
            <div class="col-md-4">
                <div class="pricing-card popular-card p-4 position-relative">
                    <div class="popular-badge">Recommended</div>
                    <h3 class="mb-3">Premium</h3>
                    <div class="price mb-4">
                        <span class="display-4 fw-bold">$9.99</span>
                        <span class="text-muted">/month</span>
                    </div>
                    <p class="mb-4">Ideal for serious personal finance</p>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Unlimited categories</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Bank connections</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Advanced reports</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Investment tracking</li>
                    </ul>
                    <button class="btn btn-primary w-100" onclick="confirmAction()">Upgrade Now</button>
                </div>
            </div>
            
            <!-- Enterprise Plan -->
            <div class="col-md-4">
                <div class="pricing-card p-4">
                    <h3 class="mb-3">Enterprise</h3>
                    <div class="price mb-4">
                        <span class="display-4 fw-bold">$19.99</span>
                        <span class="text-muted">/month</span>
                    </div>
                    <p class="mb-4">For businesses and teams</p>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Multi-user access</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Team reporting</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Custom API</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>24/7 support</li>
                    </ul>
                    <button class="btn btn-outline-primary w-100" onclick="confirmAction()">Upgrade Now</button>
                </div>
            </div>
        </div>
    </section>
     <!-- features -->
    <section class="features-section" id="features">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Powerful Features</h2>
                <p class="lead text-muted">Everything you need to manage your finances</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4 text-center">
                    <div class="feature-icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <h4 class="mb-3">Smart Analytics</h4>
                    <p>Visualize your spending patterns with beautiful charts and actionable insights.</p>
                </div>
                
                <div class="col-md-4 text-center">
                    <div class="feature-icon">
                        <i class="fas fa-piggy-bank"></i>
                    </div>
                    <h4 class="mb-3">Savings Goals</h4>
                    <p>Set and track financial goals with personalized recommendations to help you save.</p>
                </div>
                
                <div class="col-md-4 text-center">
                    <div class="feature-icon">
                        <i class="fas fa-bell"></i>
                    </div>
                    <h4 class="mb-3">Smart Alerts</h4>
                    <p>Get notified about unusual spending, bills due, and opportunities to save.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h3 class="mb-3">FinTracker</h3>
                    <p>Smart finance tracking for individuals and businesses. Take control of your financial future.</p>
                    <div class="mt-3">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="mb-3">Product</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="fea.html" class="text-white">Features</a></li>
                        <li class="mb-2"><a href="pricing.html" class="text-white">Pricing</a></li>
                        <li class="mb-2"><a href="#" class="text-white">Integrations</a></li>
                        <li><a href="#" class="text-white">Updates</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="mb-3">Company</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="about.html" class="text-white">About</a></li>
                        <li class="mb-2"><a href="#" class="text-white">Careers</a></li>
                        <li class="mb-2"><a href="#" class="text-white">Blog</a></li>
                        <li><a href="contact.html" class="text-white">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5 class="mb-3">Stay Updated</h5>
                    <p>Subscribe to our newsletter for the latest tips and updates.</p>
                    <form class="mt-3">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Your email">
                            <button class="btn btn-secondary" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p>&copy; 2025 FinTracker. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="text-white me-3">Terms</a>
                    <a href="#" class="text-white me-3">Privacy</a>
                    <a href="#" class="text-white">Security</a>
                </div>
            </div>
        </div>
    </footer>


    <script>
    function confirmAction() {
        let confirmDelete = confirm("Are you sure you want to Add this Plan?");
        if (confirmDelete) {
            alert("Hooray! You have successfully added the plan.");
            window.location.href = "home.php?name=<?php echo $name; ?>";
            // Add actual delete functionality here (e.g., redirect or API call)
        } else {
            alert("Action canceled.");
            window.location.href = "home.php?name=<?php echo $name; ?>";
        }
    }
</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>