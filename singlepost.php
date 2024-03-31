<?php
session_start();
if( !isset($_SESSION['auth'])){
    header('Location:login.php');
}



require "inc/db.php";

$id= $_GET ['id'];
if($id && (int) $id){



$query = " SELECT id,title,photo,description,status,created_at FROM `post` WHERE id = $id";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0)
{
    $data = mysqli_fetch_assoc($result);
}


}
else
{
    header('Location:404.php');
}



include "view/singlepost.view.php";