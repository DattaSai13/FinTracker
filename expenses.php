<?php

$con=mysqli_connect("localhost","root","","expense_tracker");
if($con){
    // echo "Connected";
    $name=$_GET["name"];
    $src = $_GET["src"];
    // echo "$src"
;    $amt = $_GET["amt"];
    $dt = $_GET["dt"];
    $des = $_GET["des"];
    // echo "$des";

    if ($src != "" && $amt != "" && $dt != "") {
        $sql = "INSERT INTO `expenses`(`Category`, `Amount`, `Date`, `Description`, `Names` ) VALUES ('$src','$amt','$dt','$des','$name')";
        $que = $con->query($sql);

      if ($que) {
        // echo "inserted";
        echo "<script> alert('Added Successfully');
        window.location.href='exptable.php?name=$name'</script>";
        } else {
           echo "Not inserted";
        }
} else {
echo "Details are empty";
}
}
else{
    echo "not connected";
}

?>