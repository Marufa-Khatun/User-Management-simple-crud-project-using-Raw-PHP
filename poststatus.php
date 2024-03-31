<?php
session_start();
if( !isset($_SESSION['auth'])){
    header('Location:login.php');
}

require "inc/db.php";

$id= $_GET ['id'];
if($id && (int) $id){

    
$selectQuery = " SELECT id,status FROM `post` WHERE id = $id";
$selectResult = mysqli_query($conn, $selectQuery);

if(mysqli_num_rows($selectResult) > 0)
{
    $data = mysqli_fetch_assoc($selectResult);
}

if($data['status']==1){
    $query = "UPDATE `post` SET status=2 WHERE id = $id";
    $result = mysqli_query($conn, $query);
    header('Location:allpost.php');
}else{
    $query = "UPDATE `post` SET status=1 WHERE id = $id";
    $result = mysqli_query($conn, $query);
    header('Location:allpost.php');
}



}
else
{
    header('Location:404.php');
}
