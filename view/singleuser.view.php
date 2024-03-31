<?php 
  include "inc/header.php";
?>

  <body  class="text-bg-dark p-3">


   <section class="mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8"> 
                <h2>Single User Page</h2>
                <table class="table">
                    <tr>
                        <td>ID</td>
                        <td>:</td>
                        <td><?=$data['id']?></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td><?=$data['name']?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?=$data['email']?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td><?=$data['status'] == 1 ? "Active": "Deactive"?></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>:</td>
                        <td><?=$data['created_at']?></td>
                    </tr>
                    <tr>
                        <td>Photo</td>
                        <td>:</td>
                        <td>
                                <?php if($data['photo']){?>
                                <img src="uploads/profile/<?=$data['photo']?>" alt="<?=$data['photo']?>" width="60">
                                <?php
                                }else{
                                    echo "--";
                                }
                                ?>
                            </td>
                    </tr>    
                    
                </table>
                <div>
                <a href="all_users.php" class="btn btn-primary ">Back</a>
                </div>
            </div> 
         </div>  
    </div>
   </section>

   <?php 
  include "inc/footer.php";
?>