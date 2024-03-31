<?php 
 include "inc/header.php";
?>

  <body  class="text-bg-dark p-3">


   <section class="mt-5">
    <div class="container">
        <div class="row ">
            <div class="col-lg-8"> 
                         <h2>Id.<?=$data['id']?></h2>     
                        <h2><?=$data['title']?></h2>
                    
                               <p> <?php if($data['photo']){?>
                                <img src="uploads/profile/<?=$data['photo']?>" alt="<?=$data['photo']?>" width="1200">
                                <?php
                                }else{
                                    echo "--";
                                }
                                ?></p>
                   
                        <p> <?=$data['description']?></p>
                     
                        <p><?=$data['status'] == 1 ? "Active": "Deactive"?></p>
                   
                   
                        <p><?=$data['created_at']?></p>
                  
                     
                  
               
                <div>
                <a href="allpost.php" class="btn btn-primary ">Back</a>
                </div>
            </div> 
         </div>  
    </div>
   </section>

   <?php 
  include "inc/footer.php";
?>