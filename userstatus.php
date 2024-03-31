<?php
session_start();
if( !isset($_SESSION['auth'])){
    header('Location:login.php');
}

require "inc/db.php";

$id= $_GET ['id'];
if($id && (int) $id){

    
$selectQuery = " SELECT id,status FROM `user_info` WHERE id = $id";
$selectResult = mysqli_query($conn, $selectQuery);

if(mysqli_num_rows($selectResult) > 0)
{
    $data = mysqli_fetch_assoc($selectResult);
}

if($data['status']==1){
    $query = "UPDATE `user_info` SET status=2 WHERE id = $id";
    $result = mysqli_query($conn, $query);
    header('Location:all_users.php');
}else{
    $query = "UPDATE `user_info` SET status=1 WHERE id = $id";
    $result = mysqli_query($conn, $query);
    header('Location:all_users.php');
}



}
else
{
    header('Location:404.php');
}
