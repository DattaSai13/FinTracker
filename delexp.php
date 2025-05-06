<?php

$con=mysqli_connect("localhost","root","","expense_tracker");
if($con){
    $sno=$_GET["sno"];
    $name=$_GET["name"];
    $sql="DELETE FROM `expenses` WHERE `Sno`='$sno'";
    $que=$con->query($sql);
    if($que){
        // echo "Deleted successfully";
        echo "<script> alert('Deleted Successfully');
        window.location.href='exptable.php?name=$name'</script>";
    }
    else{
        echo "row not deleted";
    }
}
else{
    echo "Connection not Successful";
}