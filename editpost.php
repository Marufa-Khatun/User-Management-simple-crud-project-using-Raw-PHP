<?php
session_start();
if( !isset($_SESSION['auth'])){
    header('Location:login.php');
}

require "inc/db.php";

$id= $_GET ['id'];
if($id && (int) $id){


//select user
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

//update user

$error=[];
if(isset($_POST['submit']))
{
   $title = trim(htmlentities($_POST['title']));
   $photo = $_FILES['photo'];
   $description = trim(htmlentities($_POST['description']));
  

   if(empty($title))
   {
    $error['titleError']="Enter Your Title!";
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
    

 
   if(empty($description))
   {
    $error['desError']="Enter Your Description!";
   }
  

 
    

   
   if(empty($error))
   {
    $query = "UPDATE `post` SET title='$title', photo='$imageName', description='$description' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if($result){
        $_SESSION['successMessage'] = "Post Update Successfully";
        header('Location:allpost.php');
    }else{
        $errorMessage = "Post Update Error";
    }
   }
}

   

include "view/editpost.view.php";