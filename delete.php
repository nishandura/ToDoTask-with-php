<?php 
require('config.php');
session_start();
require('secureuser.php');
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    // echo $id;
    $delete_query = "DELETE FROM tasks WHERE id=$id";
    $delete_result = mysqli_query($conn,$delete_query);
    if($delete_result)
    {
        echo header('Location: managetask.php?msg=deletesuccess');
    }else{
        echo header('Location: managetask.php?msg=deleteerror');
    }
}