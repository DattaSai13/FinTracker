<?php
$con=mysqli_connect("localhost","root","","expense_tracker");
if($con){
    // echo "Connected";
    $name=$_GET["name"];
    // echo "$name";
    $dob=$_GET["dob"];
    // echo "$dob";
    $phone=$_GET["phone"];
    // echo "$phone";
    $email=$_GET["email"];
    // echo "$email";
    $pass=$_GET["pass"];
    // echo "$pass";

    if ($name != "" && $dob != "" && $phone != "" && $email != "" && $pass != "") {
        $sql = "INSERT INTO `admin`(`Name`, `DOB`, `Phone`, `Email`, `Password`) VALUES ('$name','$dob','$phone','$email','$pass')";
        $que = $con->query($sql);

      if ($que) {
        // echo "inserted";
        echo "<script> alert('Added Successfully');
        window.location.href='login.html'</script>";
        } else {
           echo "Not inserted";
        }
} else {
echo "Details are empty";
}
}
else{
    echo "Not connected";
}

?>