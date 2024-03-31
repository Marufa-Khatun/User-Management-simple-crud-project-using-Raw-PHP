<?php
require "inc/db.php";

session_start();
if( !isset($_SESSION['auth'])){
    header('Location:login.php');
}




$query = " SELECT id,name,email,status,created_at,photo FROM `user_info` ";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0)
{
    $datas = mysqli_fetch_all($result, true);
}
?>

<?php
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $query="SELECT * FROM user_info WHERE  id='$search' or name='$search' ";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0)
    {
    foreach($result as $items)
    {
        ?>
       
       
        <tr>
            <td><?=$items['id'];?></td>
            <td><?=$items['name'];?></td>
            <td><?=$items['email'];?></td>
            <td><span class="badge bg-<?= $items['status'] == 1 ? "success": "warning" ?>"> <?= $items['status'] == 1 ? "Active": "Deactive" ?></span></td>
            <td><?=$items['created_at'];?></td>
            <td><?php if($items['photo']){?>
                <img src="uploads/profile/<?=$items['photo']?>" alt="<?=$items['photo']?>" width="60">
                <?php
                }else{
                echo "--";
                 }
            ?></td>

        </tr>
        <?php
    }

    }
    else
    {
        ?>
        <tr>
            <td >No record found</td>
        </tr>
        <?php
    }
}

include "view/all_users.view.php";

?>
