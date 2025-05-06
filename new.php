<?php
$con = new mysqli("localhost", "root", "", "expense_tracker");
$name = $_GET["name"];

// Handle form submission for quick transaction entry
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST["type"];
    $source_category = $_POST["source_category"];
    $amount = $_POST["amount"];
    $date = $_POST["date"];

    if ($type == "income") {
        $sql = "INSERT INTO income (Names, Source, Amount, Date) VALUES ('$name', '$source_category', '$amount', '$date')";
    } else {
        $sql = "INSERT INTO expenses (Names, Category, Amount, Date) VALUES ('$name', '$source_category', '$amount', '$date')";
    }

    $con->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Tracker Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .container { padding-top: 50px; }
        .summary { background: #17a2b8; padding: 20px; color: white; text-align: center; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); }
        .alert-box { background: #dc3545; padding: 10px; color: white; text-align: center; border-radius: 10px; }
        .transaction-form { background: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center text-primary">📊 Finance Tracker Dashboard</h1>

    <!-- Navigation Menu -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item"><a class="nav-link" href="money.php?name=<?php echo $name; ?>">💰 Home</a></li>
            <li class="nav-item"><a class="nav-link" href="inctable.php?name=<?php echo $name; ?>">📈 Income</a></li>
            <li class="nav-item"><a class="nav-link" href="exptable.php?name=<?php echo $name; ?>">📉 Expenses</a></li>
            <li class="nav-item"><a class="nav-link" href="ana.php?name=<?php echo $name; ?>">📊 Analysis</a></li>
        </ul>
    </nav>

    <!-- Financial Summary -->
    <?php
    $sql_income = "SELECT SUM(Amount) AS total_income FROM income WHERE Names='$name'";
    $sql_expense = "SELECT SUM(Amount) AS total_expense FROM expenses WHERE Names='$name'";

    $total_income = $con->query($sql_income)->fetch_assoc()["total_income"] ?? 0;
    $total_expense = $con->query($sql_expense)->fetch_assoc()["total_expense"] ?? 0;
    $net_savings = $total_income - $total_expense;
    ?>

    <div class="summary mb-3">
        <h2>💰 Financial Overview</h2>
        <p><strong>Total Income:</strong> ₹<?php echo number_format($total_income, 2); ?></p>
        <p><strong>Total Expenses:</strong> ₹<?php echo number_format($total_expense, 2); ?></p>
        <p><strong>Net Savings:</strong> ₹<?php echo number_format($net_savings, 2); ?></p>
    </div>

    <!-- Budget Alert (if negative savings) -->
    <?php if ($net_savings < 0): ?>
        <div class="alert-box">
            <strong>⚠ Warning!</strong> Your expenses exceed your income. You are in loss! 😟
        </div>
    <?php endif; ?>

    <!-- Quick Transaction Entry -->
    <div class="transaction-form mt-4">
        <h3 class="text-center text-success">Add a New Transaction</h3>
        <form method="POST">
            <label class="form-label">Transaction Type:</label>
            <select name="type" class="form-select" required>
                <option value="income">Income</option>
                <option value="expense">Expense</option>
            </select>

            <label class="form-label mt-2">Source/Category:</label>
            <input type="text" name="source_category" class="form-control" placeholder="Salary, Rent, Grocery, etc." required>

            <label class="form-label mt-2">Amount (₹):</label>
            <input type="number" name="amount" class="form-control" required>

            <label class="form-label mt-2">Date:</label>
            <input type="date" name="date" class="form-control" required>

            <button type="submit" class="btn btn-success mt-3">Add Transaction</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>