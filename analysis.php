<?php
$con = new mysqli("localhost", "root", "", "expense_tracker");

$name = $_GET["name"];
$filter = $_GET["filter"]; 

$total_income = 0;
$total_expense = 0;

if ($filter === "yearly") {
    $year = $_GET["year"];
    $sql_income = "SELECT SUM(Amount) AS total_income FROM income WHERE Names='$name' AND YEAR(Date) = '$year'";
    $sql_expense = "SELECT SUM(Amount) AS total_expense FROM expenses WHERE Names='$name' AND YEAR(Date) = '$year'";
} elseif ($filter === "monthly") {
    $year = $_GET["year"];
    $month = $_GET["month"];
    $sql_income = "SELECT SUM(Amount) AS total_income FROM income WHERE Names='$name' AND YEAR(Date) = '$year' AND MONTH(Date) = '$month'";
    $sql_expense = "SELECT SUM(Amount) AS total_expense FROM expenses WHERE Names='$name' AND YEAR(Date) = '$year' AND MONTH(Date) = '$month'";
} elseif ($filter === "date") {
    $fdate = $_GET["fdate"];
    $tdate = $_GET["tdate"];
    $sql_income = "SELECT SUM(Amount) AS total_income FROM income WHERE Names='$name' AND Date BETWEEN '$fdate' AND '$tdate'";
    $sql_expense = "SELECT SUM(Amount) AS total_expense FROM expenses WHERE Names='$name' AND Date BETWEEN '$fdate' AND '$tdate'";
}

$total_income = $con->query($sql_income)->fetch_assoc()["total_income"] ?? 0;
$total_expense = $con->query($sql_expense)->fetch_assoc()["total_expense"] ?? 0;
$net_savings = $total_income - $total_expense;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Analysis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 10px 20px gray;
        }
        .net-savings {
            background:rgba(194, 185, 152, 0.79);
            padding: 10px;
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
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

        
        .btn-custom {
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            font-weight: 500;
            transition: all 0.3s;
            margin: 10px 0;
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
        
        
        
       

    </style>
</head>
<body>

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

<div class="container mt-5">
    <h2 class="text-center text-primary">📊 Financial Analysis</h2>
    <p class="text-center">Results for: <strong><?php echo ucfirst($filter); ?> Analysis</strong></p>

    <div class="row justify-content-center mt-4">
        <!-- Income Table -->
        <div class="col-md-6">
            <h3 class="text-success text-center">Income Records</h3>
            <table class="table table-bordered table-striped">
                <thead class="table-success">
                    <tr align='center'>
                        <!-- <th>Name</th> -->
                        <th>Source</th>
                        <th>Amount (₹)</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                   $sql_income = ($filter == "yearly") 
                   ? "SELECT * FROM income WHERE Names='$name' AND YEAR(Date) = '$year'" 
                   : (($filter == "monthly") 
                       ? "SELECT * FROM income WHERE Names='$name' AND YEAR(Date) = '$year' AND MONTH(Date) = '$month'" 
                       : "SELECT * FROM income WHERE Names='$name' AND Date BETWEEN '$fdate' AND '$tdate'");

                    $que1 = $con->query($sql_income);
                    while ($row = $que1->fetch_assoc()) {
                        echo "<tr align='center'>
                        <td>{$row['Source']}</td>
                        <td>₹" . number_format($row['Amount'], 2) . "</td>
                        <td>{$row['Date']}</td></tr>";
                    }
                    ?>
                    <tr align='center' class="table-warning">
                        <td colspan="3"><b>Total Income: ₹<?php echo number_format($total_income, 2); ?></b></td>
                        
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Expenses Table -->
        <div class="col-md-6">
            <h3 class="text-danger text-center">Expense Records</h3>
            <table class="table table-bordered table-striped">
                <thead class="table-danger">
                    <tr align='center'>
                        <!-- <th>Name</th> -->
                        <th>Category</th>
                        <th>Amount (₹)</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_expense = ($filter == "yearly") 
                    ? "SELECT * FROM expenses WHERE Names='$name' AND YEAR(Date) = '$year'" 
                    : (($filter == "monthly") 
                        ? "SELECT * FROM expenses WHERE Names='$name' AND YEAR(Date) = '$year' AND MONTH(Date) = '$month'" 
                        : "SELECT * FROM expenses WHERE Names='$name' AND Date BETWEEN '$fdate' AND '$tdate'");

                    $que1 = $con->query($sql_expense);
                    while ($row = $que1->fetch_assoc()) {
                        echo "<tr align='center'>
                        <td>{$row['Category']}</td>
                        <td>₹" . number_format($row['Amount'], 2) . "</td>
                        <td>{$row['Date']}</td></tr>";
                    }
                    ?>
                    <tr align='center' class="table-warning">
                        <td colspan="3"><b>Total Expenses: ₹<?php echo number_format($total_expense, 2); ?></b></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Net Savings Table -->
        
<div class="col-md-8 mt-4">
    <div class="net-savings" style="background: <?= ($net_savings < 0) ? '#ff4d4d' : '#ffcc00'; ?>; color: <?= ($net_savings < 0) ? 'white' : 'black'; ?>">
        <p>💰 Net Savings: ₹<?php echo number_format($net_savings, 2); ?></p>
        <?php if ($net_savings < 0): ?>
            <p><strong>You are in loss...</strong></p>
        <?php endif; ?>
    </div>
</div>



    </div>

    <button class="btn btn-secondary fs-5 px-4 mb-3" onclick="window.location.href='ana.php?name=<?php echo $name; ?>'">Back</button>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>