<?php
session_start();
if( !isset($_SESSION['auth'])){
    header('Location:login.php');
}

require "inc/db.php";

$id= $_GET ['id'];
if($id && (int) $id){

    
$selectQuery = " SELECT id,name,email,status,created_at,photo FROM `user_info` WHERE id = $id";
$selectResult = mysqli_query($conn, $selectQuery);

if(mysqli_num_rows($selectResult) > 0)
{
    $data = mysqli_fetch_assoc($selectResult);
}

$path="uploads/profile/".$data['photo'];

if(file_exists($path) && $data['photo'])
{
    unlink($path);
}


//Delete Query
 $query = "DELETE FROM   `user_info` WHERE id = $id";
$result = mysqli_query($conn, $query);

if(($result) )
{
    header('Location:all_users.php');
}

}
else
{
    header('Location:404.php');
}
