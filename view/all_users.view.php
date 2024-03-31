<?php 
  include "inc/header.php";
?>


  <body  class="text-bg-dark p-3">
   <section class="mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <?php
                if(isset( $_SESSION['successMessage'])){
                 ?>
              <div class="alert alert-seccess">
               <p> <?= $_SESSION['successMessage']?></p>
               </div>
               <?php
                }
              
                if(isset($errorMessage)){
                 ?>
              <div class="alert alert-danger">
               <p> <?=$errorMessage?></p>
               </div>
               <?php
                }
                ?>
                </div>
                <div class="col-lg-12"> 
                <h2>All Users Page</h2>
                
                 <form action="" method="GET">
                    <div class="input-group mb-3">
                     <input type="text" name="search"  class="form-control" placeholder="Search Data" >
                       <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                    </form>

                
                
           
                <table class="table">
               
                   
             
                    <tr>
                   
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
               
                    <?php foreach($datas as $data): ?>
                        <tr>
                            <td><?=$data['id']?></td>
                            <td><?=$data['name']?></td>
                            <td><?=$data['email']?></td>
                            <td>
                                <span class="badge bg-<?= $data['status'] == 1 ? "success": "warning" ?>"> <?= $data['status'] == 1 ? "Active": "Deactive" ?></span>
                            </td>
                            <td><?=date('d M Y', strtotime($data['created_at']))?></td>
                            <td>
                                <?php if($data['photo']){?>
                                <img src="uploads/profile/<?=$data['photo']?>" alt="<?=$data['photo']?>" width="60">
                                <?php
                                }else{
                                    echo "--";
                                }
                                ?>
                            </td>
                            <td>
                                <a href="singleuser.php?id=<?=$data['id']?>" class="btn btn-sm btn-secondary">View</a>
                                <a href="useredit.php?id=<?=$data['id']?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="deleteuser.php?id=<?=$data['id']?>" class="btn btn-sm btn-danger">Delete</a>
                                <a href="userstatus.php?id=<?=$data['id']?>" class="btn btn-sm btn-<?=$data['status'] == 1 ? "warning": "success" ?>">
                                <?=$data['status'] == 1 ? "Deactive" : "Active"?>
                            </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                        
                </table>
            </div> 
         </div>  
    </div>
   </section>






<?php 
  include "inc/footer.php";
  unset( $_SESSION['successMessage']);
?>