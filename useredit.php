<?php
session_start();
if( !isset($_SESSION['auth'])){
    header('Location:login.php');
}

require "inc/db.php";

$id= $_GET ['id'];
if($id && (int) $id){


//select user
$query = " SELECT id,name,email,status,created_at,photo FROM `user_info` WHERE id = $id";
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

//update user

$error=[];
if(isset($_POST['submit']))
{
   $name = trim(htmlentities($_POST['name']));
   $email = trim(htmlentities($_POST['email']));
  
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
            $path="uploads/profile/".$data['photo'];

        if(file_exists($path) && $data['photo'])
        {
         unlink($path);
        }

            $imageName = uniqid().'.'. end($fileextension);
            move_uploaded_file($photo['tmp_name'], 'uploads/profile/'.$imageName);
        }
    }
        else
        {
            $imageName = $data['photo'];
        }
    

   
   if(empty($error))
   {
    $query = "UPDATE `user_info` SET name='$name', email='$email', photo='$imageName' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if($result){
        $_SESSION['successMessage'] = "User Update Successfully";
        header('Location:all_users.php');
    }else{
        $errorMessage = "User Update Error";
    }
   }
}

   

include "view/useredit.view.php";