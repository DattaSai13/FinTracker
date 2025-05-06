<?php
$con = mysqli_connect("localhost", "root", "", "expense_tracker");
if ($con) {
    $sno=$_GET["sno"];
    $src=$_GET["src"];
    $amt=$_GET["amt"]; 
    $dt=$_GET["dt"];
    $des=$_GET["des"];
    $name=$_GET["name"];
    if($src!="" && $amt!="" && $dt!="" && $des!=""){
     
    $sql="UPDATE `expenses` SET `Category`='$src',`Amount`='$amt',`Date`='$dt',Description='$des' WHERE `Sno`='$sno'";

    $que=$con->query($sql);
    if($que){
        // echo "Data updated";
        echo "<script> alert('Updated Successfully');
        window.location.href='exptable.php?name=$name'</script>";
    }
    else{
        echo "Data not updated";
    }
} 
else{
    echo "details are empty";
}
}
else {
    echo "Connection not successful: ";
}
?>
