<?php include_once("../header_con.php");
$id = $_GET['id'];
if(!empty($id)){

    mysqli_query($con,"DELETE FROM tasks WHERE id='$id'");
    header("location:../index.php");
}else{
    header("Location:../index.php");
}