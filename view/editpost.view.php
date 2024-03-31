<?php 
  include "inc/header.php";
?>

  <body  class="text-bg-dark p-3">
   <section class="mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <?php
                if(isset($successMessage)){
                 ?>
              <div class="alert alert-seccess">
               <p> <?=$successMessage?></p>
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
                
                <div class="card mt-2">
                    <div class="card-header"><h2>Update User</h2> </div>
                        <div class="card-body">
                           <?php
                           // foreach($error as $erro)
                            //{
                                //printf("<li class='text-danger'>%s</li>", $erro);
                            //}
                            ?>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="my-3">
                                    <input type="text" name="title" value="<?=$data['title']?>" placeholder="Enter Your Title" class="form-control">
                                    <?php
                                        if(isset( $error['titleError']))
                                        {
                                         printf("<p class='text-danger'> %s </p>",  $error['titleError']) ;                              
                                        }
                                    ?>
                                </div>
                                <div class="my-3">
                                    <input type="file" name="photo"  class="form-control">
                                    <?php
                                        if(isset($error['fileError']))
                                        {
                                         printf("<p class='text-danger'> %s </p>", $error['fileError']) ;                              
                                        }
                                    ?>
                                    <div class="my-3">
                                    <?php if($data['photo']){?>
                                   <img src="uploads/profile/<?=$data['photo']?>" alt="<?=$data['photo']?>" width="60">
                                  <?php
                                   }else{
                                    echo "--";
                                   }
                                  ?>
                                    </div>
                                </div>
                                <div class="my-3">
                                    <input type="text" name="description" value = "<?=$data['description']?>" placeholder="Enter Your Description" class="form-control">
                                    <?php
                                        if(isset($error['desError']))
                                        {
                                         printf("<p class='text-danger'> %s </p>", $error['desError']) ;                              
                                        }
                                    ?>
                                </div>
                                
                               
                                <div class="my-3">
                                   <button type="submit" name="submit" value="Update" class="btn btn-sm btn-primary form-control">update</button>
                                </div>

                            </form>
                        </div>
                       
                   
                </div>


            </div>
        </div>
    </div>

   </section>

<?php 
  include "inc/footer.php";
?>