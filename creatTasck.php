<?php 

function saveTask()
{
    $title = $_POST["title"];
    $id = $_POST["task-type"];
    $date =$_POST["Date"];
    $description =$_POST["Description"];
    $priority = $_POST[""];
    $type =$_POST[""];
    $status =$_POST[""];

    echo  $_POST["title"];

    //CODE HERE
    //SQL INSERT
    $_SESSION['message'] = "Task has been added successfully !";
    header('location: index.php');
}
?>