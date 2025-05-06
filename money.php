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
            padding-top: 80px;
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
        
        .welcome-container {
            max-width: 500px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.15);
            border-top: 5px solid #454648;
            transition: transform 0.3s;
            text-align: center;
        }
        
        .welcome-container:hover {
            transform: translateY(-5px);
        }
        
        .welcome-header {
            margin-bottom: 30px;
        }
        
        .welcome-header h2 {
            color: #2c3e50;
            font-weight: 600;
        }
        
        .welcome-header p {
            color: #7f8c8d;
            margin-top: 10px;
        }
        
        .btn-custom {
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            font-weight: 500;
            transition: all 0.3s;
            margin: 10px 0;
        }
        
        .btn-success {
            background-color: #2ecc71;
            border-color: #2ecc71;
        }
        
        .btn-success:hover {
            background-color: #27ae60;
            border-color: #27ae60;
            transform: translateY(-2px);
        }
        
        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }
        
        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
            transform: translateY(-2px);
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
    <div class="container">
        <div class="welcome-container">
            <div class="welcome-header">
                <i class="fas fa-user-circle fa-4x mb-3" ></i>
                <h2 class="fs-5">Empower your financial future—log your income and expenses like a pro and stay ahead!, <span class="user-greeting"><?php echo $name; ?></span></h2>
                <p>Manage your finances efficiently with FinTracker</p>
            </div>
            
            <button class="btn btn-success btn-custom" onclick="window.location.href='in.php?name=<?php echo $name; ?>'">
                <i class="fas fa-money-bill-wave me-2"></i>Add Income
            </button>
            
            <button class="btn btn-danger btn-custom" onclick="window.location.href='exp.php?name=<?php echo $name; ?>'">
                <i class="fas fa-receipt me-2"></i>Add Expense
            </button>
            
            <div class="mt-4">
                <p class="text-muted">Quickly add transactions or explore your financial dashboard</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>