<?php 
  include "inc/header.php";
?>

  <body  class="text-bg-dark p-3">
   <section class="mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
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
                    <div class="card-header"><h2>Login</h2> </div>
                        <div class="card-body">
                           <?php
                           // foreach($error as $erro)
                            //{
                                //printf("<li class='text-danger'>%s</li>", $erro);
                            //}
                            ?>
                            <form action="" method="POST" >
                                
                                <div class="my-3">
                                    <input type="text" name="email" placeholder="Enter Your Email" class="form-control">
                                    <?php
                                        if(isset($error['emailerror']))
                                        {
                                         printf("<p class='text-danger'> %s </p>", $error['emailerror']) ;                              
                                        }
                                    ?>
                                </div>
                                <div class="my-3">
                                    <input type="Password" name="password" placeholder="Enter Your Password" class="form-control">
                                    <?php
                                        if(isset($error['passerror']))
                                        {
                                         printf("<p class='text-danger'> %s </p>", $error['passerror']) ;                              
                                        }
                                    ?>
                                </div>
                              
                                <div class="my-3">
                                   <input type="submit" name="submit" value="login" class="btn btn-sm btn-primary form-control">
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