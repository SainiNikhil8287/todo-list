<?php  include_once("../header_con.php");
$data = explode(",",$_GET['id']);
if(!empty($data)){

$id = $data[0];
$status = $data[1];


 $status = ($status == "Pending" ? "Complete" : "Pending");

mysqli_query($con,"UPDATE tasks SET status='$status' WHERE id='$id'");
 header("Location:../index.php");
}else{
    header("Location:../index.php");
}