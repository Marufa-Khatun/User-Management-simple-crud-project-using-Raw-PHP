<?php
session_start();
require "inc/db.php";

$error=[];
if(isset($_POST['submit']))
{
   $name = trim(htmlentities($_POST['name']));
   $email = trim(htmlentities($_POST['email']));
   $password = trim(htmlentities($_POST['password']));
   $encpass = md5($password);
   $photo = $_FILES['photo'];
  

   if(empty($name))
   {
    $error['nameerror']="Enter Your Name!";
   }
 
   if(empty($email))
   {
    $error['emailerror']="Enter Your Email!";
   }
   elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
   
   
    {
        $error['emailerror']="Enter Your valid Email!"; 
    }
    if(empty( $password))
    {
     $error['passerror']="Enter Your Password!";
    }

 
    if($photo['name'])
    {
        $type = ['png', 'jpg', 'jpeg', 'gif'];
        $fileextension = explode ('.', $photo['name']);
        if(!in_array(end($fileextension),$type))
        {
            $error['fileError'] = "upload png, jpg, jpeg or gif image only!";

        }
        elseif($photo['size'] > 1000000)
        {
            $error['fileError'] = "upload 1 megabyte image only!";
        }
        else
        {
            $imageName = uniqid().'.'. end($fileextension);
            move_uploaded_file($photo['tmp_name'], 'uploads/profile/'.$imageName);
        }
    }
        else
        {
            $imageName = null;
        }
    

   
   if(empty($error))
   {
    $query = "INSERT INTO `user_info`( `name`, `email`, `password`,  `photo`) VALUES ('$name','$email','$encpass','$imageName')";
    $result = mysqli_query($conn, $query);

    if($result){
        $successMessage = "User Inserted Successfully";
    }else{
        $errorMessage = "User Insert Error";
    }
   }
}

include "view/signup.view.php";

