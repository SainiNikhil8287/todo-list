<?php   include_once("../header_con.php");

if(isset($_POST['submit'])){
    $task_name = $_POST["task"];

    $result = mysqli_query($con,"SELECT * FROM tasks WHERE task = '".$task_name."'");
    $row = mysqli_fetch_array($result);

    if(is_array($row))
    {
        if( $task_name = $row["task"]){

        die ("This Task is already Exitst<br><a href='../index.php'>Enter Task Again</a>");
    }}
    else{
    $sql = mysqli_query($con,"INSERT INTO tasks (task)VALUES('".$task_name."')");
    // echo "Data Insert Successfully<br><a href='../index.php'>Enter Task Again</a>"; 
    header("Location:../index.php");
    }
  }
  else{
    // echo "blank data<br><a href='../index.php'>Enter Task Again</a>";
    header("Location:../index.php");
  }