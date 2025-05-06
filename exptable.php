<?php
    $con = new mysqli("localhost", "root", "", "expense_tracker");
    $name=$_GET["name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses</title>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous"
  />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
    />
    <style>
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      table{
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
            border: 2px solid blue;
            border-radius:10px;
            margin-top:20px;
            box-shadow: 0 10px 20px gray;
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
<div class="container ">
        <h2 class="text-danger text-center">Expenses</h2>

        <table class="table table-bordered table-striped">
            <thead class="table-danger">
                <tr align='center'>
                    <th>Sno</th>
                    <th>Category</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con = new mysqli("localhost", "root", "", "expense_tracker");
                $name=$_GET["name"];
                $sql = "SELECT * FROM expenses WHERE Names='$name' ORDER BY date DESC";
                $que = $con->query($sql);

                $sql_total_expense = "SELECT SUM(Amount) AS total_expense FROM expenses WHERE Names='$name'";
                    $total_expense = $con->query($sql_total_expense)->fetch_assoc()["total_expense"];
                
                if ($que->num_rows > 0) {
                    while ($row = $que->fetch_assoc()) {
                        echo "<tr align='center'>";
                        echo "<td>{$row['Sno']}</td>";
                        echo "<td>{$row['Category']}</td>";
                        echo "<td>₹{$row['Amount']}</td>";
                        echo "<td>{$row['Date']}</td>";
                        echo "<td>{$row['Description']}</td>";
                        echo "<td><a class='text-info' href='edexp.php?sno={$row['Sno']}&name={$row['Names']}'> <i class='fa-solid fa-pen-to-square'></i> </a></td>";
                        echo "<td><a class='text-danger' href='delexp.php?sno={$row['Sno']}&name={$row['Names']}' onclick='return dele()' ><i class='fa-solid fa-trash'></i></a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No income records found</td></tr>";
                }
                echo "<tr align='center'><td colspan='3'><b>Total Expenses: ₹$total_expense</b></td></tr>";
                ?>
            </tbody>
        </table>

        <a href="money.php?name=<?php echo $name; ?>" class="btn btn-secondary mt-3">Back to Home</a>
    </div>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"
  ></script>
</body>
</html>