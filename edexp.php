<?php
  $con=mysqli_connect("localhost","root","","expense_tracker");
  if($con){
    $sno=$_GET["sno"];
    $name=$_GET["name"];
    $sql="SELECT * from expenses WHERE sno='$sno'";
    $que=$con->query($sql);
    if($que->num_rows>0){
        while($row=$que->fetch_assoc()){
            $src=$row["Category"];
            $amt=$row["Amount"];
            $dt=$row["Date"];
            $des=$row["Description"];
        }
    }
  }

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
      .main{
          width: 500px;
          font-size: 20px;
            margin: 20px auto;
            padding: 40px 20px;
            background: rgb(206, 208, 212);
            border-radius: 10px;
            box-shadow: 0px 10px 10px gray;
        }
        .btn-success {
            width: 100%;
            margin-top: 10px;
        }

      </style>
</head>
<body>
    <div class="container d-flex flex-column justify-content-center align-items-center mt-4">
        <h2 class="text-success"> Expenses Tracker</h2>

        <div class="main">
        <form action="upexp.php" method="get">
        <input type="number" name="sno" id="sno" value="<?php echo $sno; ?>" hidden>
        <input type="hidden" name="name" id="name" value="<?php echo $name; ?>">
            <label class="form-label">Category:</label>
            <input type="text" name="src" id="src" class="form-control" value="<?php echo $src; ?>" required>

            <label class="form-label">Amount:</label>
            <input type="number" name="amt" id="amt" class="form-control" value="<?php echo $amt; ?>" required>

            <label class="form-label">Date:</label>
            <input type="date" name="dt" id="dt" class="form-control" value="<?php echo $dt; ?>" required>

            <label class="form-label">Short Description :</label>
            <textarea name="des" id="des" class="form-control" value="<?php echo $des; ?>" ></textarea>


            <button type="submit" class="btn btn-success mt-3">Update Expenses</button>
        </form>
        </div>

        <a href="index.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
    </div>


    

    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"
  ></script>
</body>
</html>