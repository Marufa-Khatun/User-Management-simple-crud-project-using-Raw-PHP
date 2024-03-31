<?php
session_start();
require "inc/db.php";
$id= $_SESSION['auth']['id'];
$error=[];
if(isset($_POST['submit'])){
    $password=trim(htmlentities($_POST['password']));
    $newpassword=trim(htmlentities($_POST['newpassword']));

    $encpass=md5($password);
    $newencpass=md5($newpassword);
  


if(empty($password)){
    $error['passerror']="Enter Your Old Password";
}
if(empty($newpassword)){
    $error['newpasserror']="Enter Your New Password";
}

if(empty($error)){
 $selectQuery=" SELECT password FROM `user_info` WHERE password='$encpass' ";
 $selectResult=mysqli_query($conn,$selectQuery);
 if(mysqli_num_rows( $selectResult)>0){
    $data=mysqli_fetch_assoc( $selectResult);
   
 }


 $updateQuery="UPDATE user_info set password='$newencpass' WHERE id=$id";
 $result=mysqli_query($conn,$updateQuery);
            if($result){
            $successMessage = "Password Update Successfully";
                
             }else{
                $errorMessage = "Password Update Error";
            }
             }

 }






include "view/password.view.php";
