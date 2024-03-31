<?php
include "inc/header.php";
?>

<body class="text-bg-dark p-3">
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
                    <div class="card">
                        <div class="card-header"><h2>Change Password</h2> </div>
                        <div class="card-body">
                            <form action="" method="POST">
                               <div class="my-2">
                                <input type="password" name="password" placeholder="Enter Your Old Password" class="form-control">
                                <?php
                                      if(isset($error['passerror']))
                                      {
                                       printf("<p class='text-danger'> %s </p>", $error['passerror']) ;                              
                                      }
                                ?>
                               </div>
                               <div class="my-2">
                                <input type="password" name="newpassword" placeholder="Enter Your New Password" class="form-control">
                                <?php
                                      if(isset($error['newpasserror']))
                                      {
                                       printf("<p class='text-danger'> %s </p>", $error['newpasserror']) ;                               
                                      }
                                ?>
                               </div>
                                
                               <div class="my-2">
                                <input type="submit" name="submit" value="Update Password"  class="btn btn-sm btn-primary form-control">
                               </div>
                            
                            </form>
                        </div>

                       
                    </div>
                </div>
            </div>
        </div>

    </section>

    
</body>

<?php
include "inc/footer.php";

?>