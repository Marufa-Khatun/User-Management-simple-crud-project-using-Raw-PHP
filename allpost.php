<?php
require "inc/db.php";

session_start();
if( !isset($_SESSION['auth'])){
    header('Location:login.php');
}



$query = " SELECT id,title,photo,description,status,created_at FROM `post`";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0)
{
    $datas = mysqli_fetch_all($result, true);
}

if(isset($_GET['search'])){
    $search = $_GET['search'];
    $query="SELECT * FROM post WHERE  id='$search' or title='$search'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0)
    {
    foreach($result as $items)
    {
        ?>
        <tr>
            <td><?=$items['id'];?></td>
            <td><?=$items['title'];?></td>
            <td><?=$items['photo'];?></td>
            <td><?=$items['description'];?></td>
            <td><?=$items['status'];?></td>
            <td><?=$items['created_at'];?></td>
          

        </tr>
        <?php
    }

    }
    else
    {
        ?>
        <tr>
            <td colspan="4">No record found</td>
        </tr>
        <?php
    }
}




include "view/allpost.view.php";

?>