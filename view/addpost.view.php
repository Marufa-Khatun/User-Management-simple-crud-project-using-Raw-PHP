<?php
include "inc/header.php";
?>
<body class="text-bg-dark p-3">
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



                    <div class="card">
                        <div class="card-header"><h2>Add Post</h2></div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="my-2">
                                    <input type="text" name="title" placeholder="Enter Your Title" class="form-control">
                                   <?php
                                   if(isset( $errors['titleError']))
                                   {
                                    echo $errors['titleError'];
                                   }
                                   ?>
                                </div>
                                <div class="my-2">
                                    <input type="file" name="photo" class="form-control">
                                    <?php
                                        if(isset($errors['fileError']))
                                        {
                                        printf("<p class='text-danger'> %s </p>", $errors['fileError']) ;                              
                                        }
                                    ?>
                                </div>
                                <div class="my-2">
                                <textarea name="description" id=""  rows="10"  class="form-control"></textarea>
                                <?php
                                if(isset($errors['desError']))
                                   {
                                    printf("<p class='text-danger'> %s </p>",$errors['desError']);
                                   }
                                   ?>
                                </div>
                                <div class="my-2">
                                    <input type="submit"name="submit" value="submit"  class="btn btn-sm btn-primary form-control">
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