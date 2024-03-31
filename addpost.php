<?php
session_start();
if( !isset($_SESSION['auth'])){
    header('Location:login.php');
}

require "inc/db.php";


$errors=[];
if(isset($_POST['submit']))
{
   $title = trim(htmlentities($_POST['title']));
   $photo = $_FILES['photo'];
   $description = trim(htmlentities($_POST['description']));

  
 

   if( empty( $title ) )
   {
    $errors['titleError']="Enter Your Title!";
   }




   if($photo['name'])
   {
       $type = ['png', 'jpg', 'jpeg', 'gif'];
       $fileextension = explode ('.', $photo['name']);
       if(!in_array(end($fileextension),$type))
       {
           $errors['fileError'] = "upload png, jpg, jpeg or gif image only!";

       }
       elseif($photo['size'] > 1000000)
       {
           $errors['fileError'] = "upload 1 megabyte image only!";
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




   if( empty( $description ) )
   {
    $errors['desError']="Enter Your Description!";
   }
 
 

        if(empty($errors))
        {
         $query = "INSERT INTO post ( `title`, `photo`, `description`) VALUES ('$title','$imageName','$description')";
         $result = mysqli_query($conn, $query);
     
         if($result){
             $successMessage = "Post Inserted Successfully";
         }else{
             $errorMessage = "Post Insert Error";
         }
        }    
    

}


include "view/addpost.view.php";