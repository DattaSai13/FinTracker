<?php
$con=mysqli_connect("localhost","root","","expense_tracker");
if($con){
    $name=$_GET["name"];
    // echo $name;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income</title>
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
        .btn1 {
            width: 100%;
            margin-top: 10px;
        }
        .btn2{
          align: center;
        }
        

      </style>
</head>
<body>
    <div class="container d-flex flex-column justify-content-center align-items-center mt-4">
        <h2 class="text-success text-center"> Income Tracker</h2>

        <div class="main">
        <form action="income.php" method="get">
          <input type="hidden" name="name" id="name" value="<?php echo $name; ?>">

            <label class="form-label">Source:</label>
            <input type="text" name="src" id="src" class="form-control mb-2" required>

            <label class="form-label">Amount:</label>
            <input type="number" name="amt" id="amt" class="form-control mb-2" required>

            <label class="form-label">Date:</label>
            <input type="date" name="dt" id="dt" class="form-control mb-2" required>

            <label class="form-label">Short Description :</label>
            <textarea name="des" id="des" class="form-control mb-2"></textarea>


            <button type="submit" class="btn btn1 btn-success mt-3">Add Income</button>
        </form>
        </div>

        <a href="money.php?name=<?php echo $name; ?>" class="btn  btn-secondary mt-3 btn2">Back to Home</a>
    </div>


    

    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"
  ></script>
</body>
</html>