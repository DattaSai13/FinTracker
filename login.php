<?php
$con=mysqli_connect("localhost","root","","expense_tracker");
if($con){
    // echo "Connected";
    $email = $_GET["email"];
    $pass = $_GET["pass"];
    $sql = "SELECT * FROM admin WHERE email='$email'";
    $que=$con->query($sql);
    if($que->num_rows>0){
        while($row=$que->fetch_assoc()){
            if($pass == $row["Password"]) {  
                // echo "$email";
                echo "<script> alert('Log in Successful');
                window.location.href='home.php?name=$email'</script>"; 
            } 
            else{
                echo "<script> alert('Username or Password is wrong');
                window.location.href='login.html?name=$email'</script>";
            }
        }
    }
   else{
    echo "<script> alert('Username or Email not found');
    window.location.href='login.html'</script>";
   }
}
else{
    echo "not connected";
}

?>