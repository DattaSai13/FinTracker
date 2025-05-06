<?php
    $con = new mysqli("localhost", "root", "", "expense_tracker");
    $name=$_GET["name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analysis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-image: url(https://img.freepik.com/premium-vector/vector-gradient-pattern-white-abstract-texture-wallpaper_600161-293.jpg);
            background-size: cover;
        }
        .cont {
            width: 100vw;
            height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
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
        .content-box {
            width: 400px;
            padding: 40px 30px;
            background: rgb(206, 208, 212);
            border-radius: 10px;
            box-shadow: 0px 10px 10px gray;
            text-align: center;
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

    <div class="cont">
    <div class="content-box">
    <h2 class="text-center text-primary">Finance Analysis</h2>
    <form action="analysis.php" method="get">
        <input type="hidden" name="name" id="name" value="<?php echo $name; ?>">

        <label class="form-label">Select Analysis Type:</label>
        <select name="filter" id="filter" class="form-select">
            <option value="">Select</option>
            <option value="yearly">Yearly</option>
            <option value="monthly">Monthly</option>
            <option value="date">Specific Date</option>
        </select>

        <div id="inputFields" class="mt-3">
            <!-- Dynamic Input Fields -->
        </div>

        <button type="submit" class="btn btn-success btn-custom mt-2">Analyze</button>
    </form>
</div>

<script>
document.getElementById('filter').addEventListener('change', function () {
    let inputFields = document.getElementById('inputFields');
    inputFields.innerHTML = ""; // Clear previous inputs

    if (this.value === "yearly") {
        inputFields.innerHTML = `
            <label class="form-label">Enter Year:</label>
            <input type="number" name="year" class="form-control" required>`;
    } else if (this.value === "monthly") {
        inputFields.innerHTML = `
            <label class="form-label">Enter Year:</label>
            <input type="number" name="year" class="form-control" required>
            <label class="form-label">Enter Month:</label>
            <input type="number" name="month" class="form-control" required>`;
    } else if (this.value === "date") {
        inputFields.innerHTML = `
            <label class="form-label">Start Date:</label>
            <input type="date" name="fdate" class="form-control" required>
            <label class="form-label">End Date:</label>
            <input type="date" name="tdate" class="form-control" required>`;
    }
});
</script>
    </div>

    

</body>
</html>